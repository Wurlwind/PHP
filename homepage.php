<?php //showallcharacters.php
if (!session_id()) {
    session_start();
}
require_once("business/gameService.php");
require_once("business/roleService.php");

$gameSvc = new GameService();
$gameList = $gameSvc->getRand(6);

function showRandomGames($gameList)
{
    foreach ($gameList as $game) {
        echo "<div class='listedGames'>";

        echo "<h4><a href='./singlegame.php?gameId=" . $game->getId() . "' >" . $game->getGameTitle() . "</a></h4>";

        echo "<img src='./img/gameCover/" . $game->getId() . ".png' alt='GameCover' height='240' width='160'><br/>";

        //echo ($game->getSynopsis() . "<br/>");

        echo ("Price: €" . $game->getPrice() . "<br/>");

        //echo ("Released On: " . $game->getReleaseDate() . "<br/>");

        //echo ('Developer: ' . $game->getDeveloper() . "<br/>");

        //echo ('Publisher: ' . $game->getPublisher() . "<br/>");

        //echo ("Genres: " . $game->getGenres() . "<br/>");

        /* echo "<form action='./functions/addtocart.php' method='post'><input name='productId' value='" . $game->getId() . "' type='hidden'/>
        <input name='amount' type='number' value='1' min='1'/>
        <input name='addToCart' type='submit' value='Add To Cart'/>
        </form><br/>"; */
        echo "</div>";
    }
}

include("presentation/home.php");
