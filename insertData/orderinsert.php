<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}
if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

$user = isset($_POST['user']) ? $_POST['user'] : '';
$orderDate = isset($_POST['orderdate']) ? $_POST['orderdate'] : '';
$gameIn = isset($_POST['game']) ? $_POST['game'] : '';
$game = str_replace("'", "''", "$gameIn");
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';

$userSelect = "SELECT * FROM siteuser WHERE username='$user'";
$userExists = mysqli_query($con, $userSelect);

if (!$userExists || mysqli_num_rows($userExists) == 0) {
    echo 'User does not exist';
    $userId = -1;
} else {
    $result = mysqli_query($con, "SELECT userId FROM siteuser WHERE username='$user'");
    while ($row = mysqli_fetch_array($result)) {
        $userId = $row['userId'];
    }
}

$gameSelect = "SELECT * FROM game WHERE gameTitle = '$game'";
$gameExists = mysqli_query($con, $gameSelect);

if (!$gameExists || mysqli_num_rows($gameExists) == 0) {
    echo 'Game does not exist';
    $gameId = -1;
} else {
    $result = mysqli_query($con, "SELECT gameId FROM game WHERE gameTitle='$game'");
    while ($row = mysqli_fetch_array($result)) {
        $gameId = $row['gameId'];
    }
}

if ($userId != -1 && $gameId != -1) {
    $userOrder = "INSERT INTO userorder (orderDate, userId) VALUES ('$orderDate','$userId')";
    mysqli_query($con, $userOrder);

    $orderId = mysqli_insert_id($con);

    $result = mysqli_query($con, "SELECT price FROM game WHERE gameId='$gameId'");
    while ($row = mysqli_fetch_array($result)) {
        $price = $row['price'];
    }

    $gameorder = "INSERT INTO gamesordered (amount, gameId, orderId, priceWhenOrdered) VALUES ('$amount','$gameId','$orderId','$price')";
    mysqli_query($con, $gameorder);
}

header("refresh:2;url=insert.html");
