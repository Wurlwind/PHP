<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}
if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

$gameIn = isset($_POST['game']) ? $_POST['game'] : '';
$game = str_replace("'", "''", "$gameIn");
$price = isset($_POST['user']) ? $_POST['user'] : '';

$gameSelect = "SELECT * FROM game WHERE gameTitle = '$game'";
$gameExists = mysqli_query($con, $gameSelect);

if (!$gameExists || mysqli_num_rows($gameExists) == 0) {
    echo 'Game does not exist';
    $gameId = -1;
} else {
    $updateSQL = mysqli_query($con, "UPDATE game SET price='$price' WHERE gameTitle = '$game'");
    mysqli_query($con, $updateSQL);
}


header("refresh:2;url=insert.html");
