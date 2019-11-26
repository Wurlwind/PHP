<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}
if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

$user = isset($_POST['user']) ? $_POST['user'] : '';
$gameIn = isset($_POST['game']) ? $_POST['game'] : '';
$game = str_replace("'", "''", "$gameIn");

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

$wishlistSelect = "SELECT * FROM wishlist WHERE userID='$userId' AND gameId='$gameId'";
$wishlistExists = mysqli_query($con, $wishlistSelect);

if (!$wishlistExists || mysqli_num_rows($wishlistExists) == 0) {
    $sql = "INSERT INTO wishlist (gameId, userId) VALUES ('$gameId','$userId')";
    mysqli_query($con, $sql);
} else {
    echo "Game is already in the wishlist!";
}

header("refresh:2;url=insert.html");
