<?php //showallcharacters.php
if (!session_id()) {
    session_start();
}
require_once("business/characterService.php");
require_once("business/gameService.php");
require_once("business/roleService.php");

$characterSvc = new CharacterService();
$characterList = $characterSvc->getCharacterOverview();
$roleSvc = new RoleService();
$roleList = $roleSvc->getRoleOverview();
$gameSvc = new GameService();
$gameList = $gameSvc->getGameNames();

if (!isset($_SESSION['charNameFilter'])) {
    $_SESSION['charNameFilter'] = "";
}
if (!isset($_SESSION['charRoleFilter'])) {
    $_SESSION['charRoleFilter'] = "";
}
if (!isset($_SESSION['charGameFilter'])) {
    $_SESSION['charGameFilter'] = "";
}
$charNameFilter = $_SESSION['charNameFilter'];
$charRoleFilter = $_SESSION['charRoleFilter'];
$charGameFilter = $_SESSION['charGameFilter'];

$search = isset($_POST['searchChars']) ? $_POST['searchChars'] : "";
if ($search) {
    $charNameFilterIn = isset($_POST['charNameFilter']) ? $_POST['charNameFilter'] : '';
    $charNameFilter = str_replace("'", "''", "$charNameFilterIn");
    $_SESSION['charNameFilter'] = $charNameFilter;

    $charRoleFilterIn = isset($_POST['charRoleFilter']) ? $_POST['charRoleFilter'] : '';
    $charRoleFilter = str_replace("'", "''", "$charRoleFilterIn");
    $_SESSION['charRoleFilter'] = $charRoleFilter;

    $charGameFilterIn = isset($_POST['charGameFilter']) ? $_POST['charGameFilter'] : '';
    $charGameFilter = str_replace("'", "''", "$charGameFilterIn");
    $_SESSION['charGameFilter'] = $charGameFilter;
}


if ($_SESSION['charNameFilter'] === '' && $_SESSION['charRoleFilter'] === '' && $_SESSION['charGameFilter'] === '') {
    $characterList = $characterSvc->getCharacterOverview();
} else {
    $characterList = $characterSvc->filterList($charNameFilter, $charRoleFilter, $charGameFilter);
}

function showCharacterList($characterList)
{
    foreach ($characterList as $character) {
        echo "<div class='characterEntry'>";
        echo ($character->getFirstName()  . " "  . $character->getLastName() . "<br/>");

        echo "<img src='./img/characters/" . $character->getId() . ".png' alt='Character Image' onerror=this.onerror=null;this.src='./img/characters/blank.png'; height='160' width='160' maxwidth='25%'><br/>";

        echo "Stars In: <br />";
        $characterSvc = new CharacterService();
        $gameRoles = $characterSvc->getGamesIn($character->getId());
        foreach ($gameRoles as $gamerole) {
            echo "<a href='./singlegame.php?gameId=" . $gamerole[2] . "' >" . $gamerole[0] . "</a> as " . $gamerole[1] . "<br/>";
        }
        echo "</div>";
    }
}

include_once("presentation/navigation.php");
include("presentation/characterlist.php");
