<!DOCTYPE html>
<html lang="en">
<?php
require_once("presentation/navigation.php");
if (!session_id()) {
    session_start();
}

$nav = new Nav();
?>

<head>
    <meta charset="UTF-8">
    <?php
    $nav->getViewport();
    $nav->getScriptsAndCSS();
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<?php
$nav->getNav();
?>
<?php
include_once("presentation/navigation.php");
?>

<body>
    <div class="container">

        <div id="container">
            <?php
            if (isset($_SESSION['userId'])) {
                echo "Welcome " . $_SESSION["username"] . "!";
            }

            showRandomGames($gameList);
            /* 
        require_once("business/gameService.php");
        $gameSvc = new GameService();
        $gameList = $gameSvc->getGameOverview();

        include_once("presentation/gamelist.php"); */ ?>
        </div>
    </div>
</body>

</html>