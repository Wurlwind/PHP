<?php //showallgamecompanies.php
require_once("business/gamecompanyService.php");

$gamecompanySvc = new GamecompanyService();
$gamecompanyList = $gamecompanySvc->getGamecompanyOverview();

include_once("presentation/navigation.php");
include("presentation/gamecompanylist.php");
