<?php
$servername = "localhost";
$username = "username";
$password = "1234";
$dbname = "games";

//create connection
$conn = new msqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//html pagina
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game insert</title>
</head>

<body>
    <div id="container">
        <label>Game naam:</label><input type="text"><br>
        <label>Releasedate</label><input type="date"><br>
        <label>Genre:</label><br>
        <input type="checkbox" name="genre" value="horror">Horror <br>
        <input type="checkbox" name="genre" value="fantasy">Fantasy<br>
        <input type="checkbox" name="genre" value="adventure">Adventure <br>
        <input type="checkbox" name="genre" value="fantasy">Fantasy<br>

    </div>
</body>

</html>

<?php

$sql = "INSERT INTO game (title, releasedate)
VALUES ('titlename', 'releasedate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

/*
Kain: Protagonist of Blood Omen and Blood Omen 2
Villain of Soul Reaver 1
Supporting character of Soul Reaver 2
Protagonist in Legacy of Kain : Defiance */
?>