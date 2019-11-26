<?php

/**
 * Database connection
 * ----------------------------------------------------------------
 */

$con = mysqli_connect('127.0.0.1', 'root', '', 'games', 3306);

if (!$con) {
    echo 'Not Connected To Server';
}

if (!mysqli_select_db($con, 'games')) {
    echo 'Database Not Connected';
}

/**
 * Handle action 'insert' (user pressed insert button)
 * ----------------------------------------------------------------
 */

/* exists? */
$role = isset($_POST['role']) ? $_POST['role'] : '';

$roleSelect = "SELECT * FROM game WHERE theRole = $role";
$existCheck = mysqli_query($con, $roleSelect);

/* insert into database */
if ($existCheck > 0) {
    $sql = "INSERT INTO characterrole (theRole) VALUES ('$role')";
    mysqli_query($con, $sql);
    //echo 'role added';
} else {
    //echo 'Role already exists.';
}


header("refresh:2;url=insert.html");
