<?php //addtocart.php
if (!session_id()) {
    session_start();
    /*print_r($_SESSION);*/
}
require_once("../data/DBConfig.php");

$addId = isset($_POST['addReview']) ? $_POST['addReview'] : '';
if ($addId) {
    $review = str_replace("'", "''", $_POST['review']);

    $sql = "INSERT INTO review (gameId, userId, reviewDate, review, score) 
        VALUES ('" . $_POST['productId'] . "', '" . $_SESSION['userId'] . "', CURDATE(), '" . $review . "', '" . $_POST['score'] . "')";
    echo $sql;
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
    $dbh->exec($sql);
}

header("Location:" . $_POST['lastUrl']);
