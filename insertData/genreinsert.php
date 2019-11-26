<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}
if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$gameIn = isset($_POST['game']) ? $_POST['game'] : '';
$game = str_replace("'", "''", "$gameIn");

$genreSelect = "SELECT * FROM genre WHERE genre = '$genre'";
$genreExists = mysqli_query($con, $genreSelect);

/* insert into database */
if (!$genreExists || mysqli_num_rows($genreExists) == 0) {
    $sql = "INSERT INTO genre (genre) VALUES ('$genre')";
    mysqli_query($con, $sql);
} else {
    echo 'Genre exists.';
}

$result = mysqli_query($con, "SELECT genreId FROM genre WHERE genre='$genre'");
while ($row = mysqli_fetch_array($result)) {
    $genreId = $row['genreId'];
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

$gameGenreSelect = "SELECT * FROM genrespergame WHERE gameId='$gameId' AND genreId='$genreId'";
$gameGenreExists = mysqli_query($con, $gameGenreSelect);

if (!$gameExists || mysqli_num_rows($gameGenreExists) == 0) {
    $sql = "INSERT INTO genrespergame (gameId, genreId) VALUES ('$gameId','$genreId')";
    mysqli_query($con, $sql);
} else {
    echo  "Game already has this genre";
}


header("refresh:2;url=insert.html");
