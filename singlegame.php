<?php //singlegame.php
if (!session_id()) {
    session_start();
    //print_r($_SESSION);
}
require_once("business/gameService.php");
require_once("business/genreService.php");
require_once("business/reviewService.php");
require_once("business/characterService.php");

$genreSvc  = new GenreService();
$gameSvc = new GameService();

$gameId = isset($_GET['gameId']) ? $_GET['gameId'] : '';
$game = $gameSvc->getById($gameId);

function showGame($game)
{
    $curUrl = $_SERVER['REQUEST_URI'];
    $characterSvc = new CharacterService();
    $charList = $characterSvc->getFromGame($game->getId());

    $reviewSvc = new ReviewService();
    $reviewList = $reviewSvc->getForGame($game->getId());

    $userReviewed = 1;
    if (isset($_SESSION['loggedin'])) {
        $userReviewed = $reviewSvc->checkUserReview($_SESSION['userId'], $game->getId());
    }

    echo "<div class='listedGames container'>";
    echo ("<h1>" . $game->getGameTitle() . "</h1><br/>");

    echo ("<img src='./img/gameCover/" . $game->getId() . ".png' alt='GameCover' height='240' width='135'><br/>");

    if (isset($_SESSION['userId'])) {
        echo "<form action='./functions/addtocart.php' method='post'><input name='productId' value='" . $game->getId() . "' type='hidden'/>
        <input name='amount' type='number' value='1' min='1'/>
        <input name='addToCart' type='submit' value='Add To Cart'/>
        <input name='lastUrl' value='$curUrl' type='hidden'/>
        </form>";
    }
    echo ($game->getSynopsis() . "<br/>");

    echo ("Price: €" . $game->getPrice() . "<br/>");

    echo ("Released On: " . $game->getReleaseDate() . "<br/>");

    echo ('Developer: ' . $game->getDeveloper() . "<br/>");

    echo ('Publisher: ' . $game->getPublisher() . "<br/>");

    echo ("Genres: " . $game->getGenres() . "<br/><br/>");

    echo ("--Characters In This Game--<br/>");

    foreach ($charList as $char) {
        echo ($char[0] . " " . $char[1] . " as " . $char[2] . "<br/>");
    }

    echo "<br/>--Reviews--<br/>";

    foreach ($reviewList as $review) {
        echo ("From: " . $review[1] . " on " . $review[0]->getReviewDate() . "</br>");
        echo ($review[0]->getReview() . "</br>");
        echo ("Score: " . $review[0]->getScore() . "</br></br>");
    }

    if ($userReviewed === 0) {
        echo "Add a review: <br />";
        echo "<form action='./functions/addReview.php' method='post'><input name='productId' value='" . $game->getId() . "' type='hidden'/>
        <textarea name='review' rows='4' cols='50' wrap='hard' required>Review...</textarea>
        <input name='score' type='number' value='1' min='1' max='5'/>
        <input name='addReview' type='submit' value='Add Review'/>
        <input name='lastUrl' value='$curUrl' type='hidden'/>
        </form>";
    }

    echo "</div>";
}

include("presentation/gamelist.php");
