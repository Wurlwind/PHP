<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}
if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

$user = isset($_POST['user']) ? $_POST['user'] : '';
$reviewDate = isset($_POST['reviewdate']) ? $_POST['reviewdate'] : '';
$gameIn = isset($_POST['game']) ? $_POST['game'] : '';
$game = str_replace("'", "''", "$gameIn");
$score = isset($_POST['score']) ? $_POST['score'] : '';
$reviewIn = isset($_POST['review']) ? $_POST['review'] : '';
$review = str_replace("'", "''", "$reviewIn");

$userSelect = "SELECT * FROM siteuser WHERE username='$user'";
$userExists = mysqli_query($con, $userSelect);

if (!$userExists || mysqli_num_rows($userExists) == 0) {
    echo 'User does not exist';
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
} else {
    $result = mysqli_query($con, "SELECT gameId FROM game WHERE gameTitle='$game'");
    while ($row = mysqli_fetch_array($result)) {
        $gameId = $row['gameId'];
    }
}

$reviewSelect = "SELECT * FROM review WHERE userId='$userId' AND gameId='$gameId'";
$reviewExists = mysqli_query($con, $reviewSelect);

if (!$reviewExists || mysqli_num_rows($reviewExists) == 0) {
    $sql = "INSERT INTO review (gameId, review, reviewDate, score, userId ) VALUES ('$gameId','$review','$reviewDate','$score','$userId')";
    mysqli_query($con, $sql);
} else {
    echo 'You cannot review the same game twice!';
}

header("refresh:2;url=insert.html");
