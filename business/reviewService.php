<?php //business/gameService.php

if (isset($_POST['addReview'])) {
    require_once("../data/reviewDAO.php");
} else {
    require_once("data/reviewDAO.php");
}


class ReviewService
{

    public function getReviewOverview()
    {
        $gameDAO = new ReviewDAO();
        $list = $gameDAO->getAll();
        return $list;
    }

    public function getForGame($gameId)
    {
        $gameDAO = new ReviewDAO();
        $list = $gameDAO->getForGame($gameId);
        return $list;
    }

    public function checkUserReview($userId, $gameId)
    {
        $gameDAO = new ReviewDAO();
        $list = $gameDAO->checkUserReview($userId, $gameId);
        return $list;
    }

    public function addReview($gameId, $userId, $reviewDate, $review, $score)
    {
        $gameDAO = new ReviewDAO();
        $list = $gameDAO->addReview($gameId, $userId, $reviewDate, $review, $score);
        return $list;
    }
}
