<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}

if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

$name = isset($_POST['username']) ? $_POST['username'] : '';
//echo 'naam is ' . $name;

$email = isset($_POST['email']) ? $_POST['email'] : '';
//echo " email is " . $email;

$password = isset($_POST['password']) ? $_POST['password'] : '';
//echo " password is " . $password;

$reviewer =  isset($_POST['reviewer']) ? 1 : 0;
//echo " " . $reviewer;

$sql = "INSERT INTO siteuser (username,email,userPassword,reviewer) VALUES ('$name','$email','$password','$reviewer')";

if (!mysqli_query($con, $sql)) {
    echo 'Not Inserted';
} else {
    echo 'Inserted';
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

header("refresh:2;url=insert.html");
