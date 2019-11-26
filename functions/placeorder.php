<?php //placeorder.php
if (!session_id()) {
    session_start();
    /*print_r($_SESSION);*/
}
require_once("../data/DBConfig.php");

$place = isset($_POST['placeOrder']) ? $_POST['placeOrder'] : '';
if ($place) {
    $orderSql = "INSERT INTO userorder (userId, orderDate) VALUES (" . $_SESSION["userId"] . ", CURDATE())";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
    $dbh->exec($orderSql);
    $orderId = $dbh->lastInsertId();
    echo "ORDERID:" . $orderId;

    foreach ($_SESSION['shoppingCart'] as $cartItem => $amount) {
        $price = $dbh->query("SELECT price FROM game WHERE gameId='$cartItem'")->fetch();
        echo "<br/>ID:" . $cartItem . "<br/>AMOUNT:" . $amount . "<br/>PRICE:" . $price['price'] . "";
        $itemSql = "INSERT INTO gamesordered(gameId, orderId, amount, priceWhenOrdered)
                    VALUES ('$cartItem', '$orderId', '$amount', '" . $price['price'] . "' )";
        $dbh->exec($itemSql);
    }

    /*if (isset($_SESSION['shoppingCart'][$_POST['productId']])) {
        $_SESSION['shoppingCart'][$_POST['productId']] += $_POST['amount'];
    } else {
        $_SESSION['shoppingCart'][$_POST['productId']] = $_POST['amount'];
    } */

    unset($_SESSION['shoppingCart']);
    $_SESSION['shoppingCart'] = array();
}

header("Location:../showshoppingcart.php");
