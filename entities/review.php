<?php
//entities/character.php

class Review
{

    private static $idMap = array();

    private $id;
    private $userId;
    private $reviewDate;
    private $review;
    private $score;

    private function __construct($id, $userId, $reviewDate, $review, $score)
    {
        $this->id = $id;
        $this->reviewDate = $reviewDate;
        $this->review = $review;
        $this->score = $score;
    }

    public static function create($id, $userId, $reviewDate, $review, $score)
    {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Review($id, $userId, $reviewDate, $review, $score);
        }
        return self::$idMap[$id];
    }

    public function getId()
    {
        return $this->id;
    }

    //userId
    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    //reviewdate
    public function getReviewDate()
    {
        return $this->reviewDate;
    }

    public function setReviewDate($reviewDate)
    {
        $this->reviewDate = $reviewDate;
    }

    //review
    public function getReview()
    {
        return $this->review;
    }

    public function setReview($review)
    {
        $this->review = $review;
    }

    //score
    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }
}
