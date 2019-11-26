<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}
if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';
$gameIn = isset($_POST['game']) ? $_POST['game'] : '';
$game = str_replace("'", "''", "$gameIn");


$charSelect = "SELECT * FROM gamecharacter WHERE firstName = '$firstname' AND lastName = '$lastname'";
$existCheck = mysqli_query($con, $charSelect);

/* insert into database */
if (!$existCheck || mysqli_num_rows($existCheck) == 0) {
    $sql = "INSERT INTO gamecharacter (firstname,lastname) VALUES ('$firstname','$lastname')";
    mysqli_query($con, $sql);
} else {
    echo 'Already exists.';
}

$result = mysqli_query($con, "SELECT characterId FROM gamecharacter WHERE firstName = '$firstname' AND lastName = '$lastname'");
while ($row = mysqli_fetch_array($result)) {
    $charId = $row['characterId'];
}

/*  fetch the role */
$roleSelect = "SELECT * FROM characterrole WHERE theRole = '$role'";
$roleExists = mysqli_query($con, $roleSelect);

if (!$roleExists || mysqli_num_rows($roleExists) == 0) {
    $sql = "INSERT INTO characterrole (theRole) VALUES ('$role')";
    mysqli_query($con, $sql);
}

$result = mysqli_query($con, "SELECT roleId FROM characterrole WHERE theRole='$role'");
while ($row = mysqli_fetch_array($result)) {
    $roleId = $row['roleId'];
}

$gameSelect = "SELECT * FROM game WHERE gameTitle = '$game'";
$gameExists = mysqli_query($con, $gameSelect);

/* insert into database */

if (!$gameExists || mysqli_num_rows($gameExists) == 0) {
    echo 'Game not found';
} else {
    $result = mysqli_query($con, "SELECT gameId FROM game WHERE gameTitle='$game'");
    while ($row = mysqli_fetch_array($result)) {
        $gameId = $row['gameId'];
    }
}

$combinedSelect = "SELECT * FROM characterroleingame WHERE characterId='$charId' AND roleId='$roleId' AND gameId='$gameId'";
$combinedExists = mysqli_query($con, $combinedSelect);

if (!$combinedExists || mysqli_num_rows($combinedExists) == 0) {
    $sql = "INSERT INTO characterroleingame (characterId, gameId, roleId) VALUES ('$charId','$gameId','$roleId')";
    mysqli_query($con, $sql);
} else {
    echo "Character already has this Role in this Game.";
}



header("refresh:2;url=insert.html");
