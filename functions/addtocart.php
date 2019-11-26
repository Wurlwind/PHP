<?php //addtocart.php
if (!session_id()) {
    session_start();
    /*print_r($_SESSION);*/
}

if (!(isset($_SESSION['shoppingCart']))) {
    $_SESSION['shoppingCart'] = array();
}

$addId = isset($_POST['addToCart']) ? $_POST['addToCart'] : '';
if ($addId) {
    if (isset($_SESSION['shoppingCart'][$_POST['productId']])) {
        $_SESSION['shoppingCart'][$_POST['productId']] += $_POST['amount'];
    } else {
        $_SESSION['shoppingCart'][$_POST['productId']] = $_POST['amount'];
    }
}

header("Location:" . $_POST['lastUrl']);
