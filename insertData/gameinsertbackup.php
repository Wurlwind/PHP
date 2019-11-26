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
$title = isset($_POST['title']) ? $_POST['title'] : '';

$releasedate = isset($_POST['releasedate']) ? $_POST['releasedate'] : '';

$developer = isset($_POST['developer']) ? $_POST['developer'] : '';
$publisher =  isset($_POST['publisher']) ? $_POST['publisher'] : '';

$gameSelect = "SELECT * FROM game WHERE title = $title";
$existCheck = mysqli_query($con, $gameSelect);

/* insert into database */
if ($existCheck > 0) {
    $sql = "INSERT INTO game (title,releasedate) VALUES ('$title','$releasedate')";
    mysqli_query($con, $sql);
}

/*if (!mysqli_query($con, $sql)) {
    echo 'Not Inserted';
} else {
    echo 'Inserted';
}*/

$gameId = "SELECT gameId FROM game WHERE title = $title";

/**
 * Check on developer/publisher (create if non-existent)
 * ----------------------------------------------------------------
 */

if ($developer == $publisher) {

    $sqlSelect = "SELECT * FROM gamecompany WHERE companyname = $developer";
    $checkSql = mysqli_query($con, $sqlSelect);

    /* check if exists */
    if ($checkSql > 0) {
        $sql = "INSERT INTO gamecompany (companyname) VALUES ('$developer')";
        mysqli_query($con, $sql);
    }

    /* collect Id's  */
    $gamecompanyId = "SELECT gamecompanyId FROM gamecompany WHERE companyname = $developer";
    echo $gamecompanyId;

    $sqlDevTable = "INSERT INTO developedBy (gamecompanyId, gameId) VALUES ('$gamecompanyId','$gameId')";
    mysqli_query($con, $sqlDevTable);

    $sqlPubTable = "INSERT INTO publishedBy (gamecompanyId, gameId) VALUES ('$gamecompanyId','$gameId')";
    mysqli_query($con, $sqlPubTable);
} else {

    $sqlSelectDev = "SELECT * FROM gamecompany WHERE companyname = $developer";
    $numDevs = mysqli_query($con, $sqlSelectDev);

    $sqlSelectPub = "SELECT * FROM gamecompany WHERE companyname = $publisher";
    $numPubs = mysqli_query($con, $sqlSelectPub);

    /* check if exists */
    if ($numDevs > 0) {
        $sql = "INSERT INTO gamecompany (companyname) VALUES ('$developer')";
        mysqli_query($con, $sql);
    }

    if ($numPubs > 0) {
        $sql = "INSERT INTO gamecompany (companyname) VALUES ('$publisher')";
        mysqli_query($con, $sql);
    }

    /* collect Id's */

    /*$pubIdSelect = "SELECT gamecompanyId FROM gamecompany WHERE companyname = $publisher";
    $pubId = mysqli_fetch_array($pubIdSelect, MYSQLI_NUM);*/

    $result = mysqli_query($con, "SELECT gamecompanyID FROM gamecompany WHERE companyname='$publisher'");
    while ($row = mysqli_fetch_array($result)) {
        $pubId = $row['gamecompanyID'];
    }

    /*$devId = "SELECT gamecompanyId FROM gamecompany WHERE companyname = $developer";
    echo $devId;*/


    $result = mysqli_query($con, "SELECT gamecompanyID FROM gamecompany WHERE companyname='$developer'");
    while ($row = mysqli_fetch_array($result)) {
        $devId = $row['gamecompanyID'];
    }

    $sqlDevTable = "INSERT INTO developedBy (gamecompanyId, gameId) VALUES ('$devId','$gameId')";
    //mysqli_query($con, $sqlDevTable);

    $sqlPubTable = "INSERT INTO publishedBy (gamecompanyId, gameId) VALUES ('$pubId','$gameId')";
    //mysqli_query($con, $sqlPubTable);
}

//header("refresh:2;url=insert.html");
