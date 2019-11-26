<?php //showallgames.php
if (!session_id()) {
    session_start();
    //print_r($_SESSION);
}
require_once("business/gameService.php");
require_once("business/genreService.php");

$genreSvc  = new GenreService();
$gameSvc = new GameService();
$genreList = $genreSvc->getGenresOverzicht();

if (!isset($_SESSION['nameFilter'])) {
    $_SESSION['nameFilter'] = '';
}
if (!isset($_SESSION['genreFilter'])) {
    $_SESSION['genreFilter'] = '';
}
$nameFilter = $_SESSION['nameFilter'];
$genreFilter = $_SESSION['genreFilter'];

$search = isset($_POST['search']) ? $_POST['search'] : '';
if ($search) {
    $nameFilterIn = isset($_POST['nameFilter']) ? $_POST['nameFilter'] : ' ';
    $nameFilter = str_replace("'", "''", "$nameFilterIn");
    $_SESSION['nameFilter'] = $nameFilter;

    $genreFilter = isset($_POST['genreFilter']) ? $_POST['genreFilter'] : ' ';
    $_SESSION['genreFilter'] = $genreFilter;
}

if ($_SESSION['nameFilter'] === ' ' && $_SESSION['genreFilter'] === ' ') {
    $gameList = $gameSvc->getGameOverview();
} else {
    $gameList = $gameSvc->filterList($nameFilter, $genreFilter);
}

function showGameList($gameList)
{
    $curUrl = $_SERVER['REQUEST_URI'];
    foreach ($gameList as $game) {
        echo "<div class='listedGames bg-secondary'>";

        echo "<h4><a href='./singlegame.php?gameId=" . $game->getId() . "' >" . $game->getGameTitle() . "</a></h4>";

        echo "<img src='./img/gameCover/" . $game->getId() . ".png' alt='GameCover' height='240' width='160'><br/>";

        //echo ($game->getSynopsis() . "<br/>");

        echo ("Price: €" . $game->getPrice() . "<br/>");

        //echo ("Released On: " . $game->getReleaseDate() . "<br/>");

        //echo ('Developer: ' . $game->getDeveloper() . "<br/>");

        //echo ('Publisher: ' . $game->getPublisher() . "<br/>");

        //echo ("Genres: " . $game->getGenres() . "<br/>");

        if (isset($_SESSION['userId'])) {
            echo "<form action='./functions/addtocart.php' method='post'><input name='productId' value='" . $game->getId() . "' type='hidden'/>
            <input name='amount' type='number' value='1' min='1'/>
            <input name='addToCart' type='submit' value='Add To Cart'/>
            <input name='lastUrl' value='$curUrl' type='hidden'/>
            </form>";
        }
    }
}

include("presentation/gamelist.php");
