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

/* variables */
$titleIn = isset($_POST['title']) ? $_POST['title'] : '';
$title = str_replace("'", "''", "$titleIn");

$releasedate = isset($_POST['releasedate']) ? $_POST['releasedate'] : '';

$developer = isset($_POST['developer']) ? $_POST['developer'] : '';
$publisher =  isset($_POST['publisher']) ? $_POST['publisher'] : '';

$synopsisIn = isset($_POST['synopsis']) ? $_POST['synopsis'] : '';
$synopsis = str_replace("'", "''", "$synopsisIn");

$price = isset($_POST['price']) ? $_POST['price'] : '';

$gameSelect = "SELECT * FROM game WHERE gameTitle = '$title'";
$existCheck = mysqli_query($con, $gameSelect);

/* insert into database */

if (!$existCheck || mysqli_num_rows($existCheck) == 0) {
    $sql = "INSERT INTO game (gameTitle, releasedate, synopsis, price) VALUES ('$title','$releasedate', '$synopsis', '$price')";
    mysqli_query($con, $sql);
} else {
    echo 'Already exists';
}

$result = mysqli_query($con, "SELECT gameId FROM game WHERE gameTitle='$title'");
while ($row = mysqli_fetch_array($result)) {
    $gameId = $row['gameId'];
}

echo $gameId;

/**
 * Check on developer/publisher (create if non-existent)
 * ----------------------------------------------------------------
 */

if ($developer == $publisher) {

    $sqlSelect = "SELECT * FROM gamecompany WHERE companyname = '$developer'";
    $checkSql = mysqli_query($con, $sqlSelect);

    /* check if exists */
    if (!$checkSql || mysqli_num_rows($checkSql) == 0) {
        $sql = "INSERT INTO gamecompany (companyname) VALUES ('$developer')";
        mysqli_query($con, $sql);
    }

    /* collect Id's  */

    $result = mysqli_query($con, "SELECT gamecompanyId FROM gamecompany WHERE companyname='$developer'");
    while ($row = mysqli_fetch_array($result)) {
        $gamecompanyId = $row['gamecompanyId'];
    }

    /* put them into the table */

    $sqlDevTable = "INSERT INTO developedBy (gamecompanyId, gameId) VALUES ('$gamecompanyId','$gameId')";
    mysqli_query($con, $sqlDevTable);

    $sqlPubTable = "INSERT INTO publishedBy (gamecompanyId, gameId) VALUES ('$gamecompanyId','$gameId')";
    mysqli_query($con, $sqlPubTable);
} else {

    $sqlSelectDev = "SELECT * FROM gamecompany WHERE companyname = '$developer'";
    $numDevs = mysqli_query($con, $sqlSelectDev);

    $sqlSelectPub = "SELECT * FROM gamecompany WHERE companyname = '$publisher'";
    $numPubs = mysqli_query($con, $sqlSelectPub);

    /* check if exists */

    /* insert gamecompany into database */
    if (!$numDevs || mysqli_num_rows($numDevs) == 0) {
        $sql = "INSERT INTO gamecompany (companyname) VALUES ('$developer')";
        mysqli_query($con, $sql);
    }

    if (!$numPubs || mysqli_num_rows($numPubs) == 0) {
        $sql = "INSERT INTO gamecompany (companyname) VALUES ('$publisher')";
        mysqli_query($con, $sql);
    }

    /* collect Id's */
    global $pubId;
    global $devId;

    $resultPub = mysqli_query($con, "SELECT gamecompanyId FROM gamecompany WHERE companyname='$publisher'");
    $resultDev = mysqli_query($con, "SELECT gamecompanyId FROM gamecompany WHERE companyname='$developer'");

    while ($row = mysqli_fetch_array($resultPub)) {
        $pubId = $row['gamecompanyId'];
    }
    while ($row = mysqli_fetch_array($resultDev)) {
        $devId = $row['gamecompanyId'];
    }

    /* put them into the table */
    $sqlPubTable = "INSERT INTO publishedBy (gamecompanyId, gameId) VALUES ('$pubId','$gameId')";
    mysqli_query($con, $sqlPubTable);


    $sqlDevTable = "INSERT INTO developedBy (gamecompanyId, gameId) VALUES ('$devId','$gameId')";
    mysqli_query($con, $sqlDevTable);
}

header("refresh:2;url=insert.html");
