<?php //data/gameDAO.php

require_once("entities/review.php");
require_once("entities/game.php");
require_once("entities/user.php");
require_once("DBConfig.php");

class ReviewDAO
{

    public function getAll()
    {
        $sql = "SELECT * FROM review";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $review = new Review($row["reviewId"], $row['userId'], $row["reviewDate"], $row["review"], $row["score"]);
            array_push($list, $review);
        }
        $dbh = null;
        return $list;
    }

    public function getForGame($id)
    {
        $sql = "SELECT r.reviewId as ReviewId, r.review as Review, r.reviewDate as ReviewDate, r.score as Score, u.userId as UserId, u.username as Username
                FROM review as r
                INNER JOIN game as g on g.gameId=r.gameId
                INNER JOIN siteuser as u on u.userId=r.userId
                WHERE g.gameId='$id'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $review = Review::create($row["ReviewId"], $row['UserId'], $row["ReviewDate"], $row["Review"], $row["Score"]);
            array_push($list, array($review, $row['Username']));
        }
        $dbh = null;
        return $list;
    }

    public function checkUserReview($userId, $gameId)
    {
        $sql = "SELECT userId FROM review
                WHERE gameId='$gameId'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        foreach ($resultSet as $row) {
            //echo $row['userId'] . " " . $userId . "<br/>";
            if ($row['userId'] == $userId) {
                return 1;
            }
        }
        return 0;
    }

    public function addReview($gameId, $userId, $reviewDate, $review, $score)
    {
        $sql = "INSERT INTO review (gameId, userId, reviewDate, review, score) 
        VALUES ($gameId, $userId, $reviewDate, $review, $score)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $dbh->exec($sql);
    }
}
