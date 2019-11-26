<?php //test.php 

/*** test DAO ***/

//user
require_once("data/userDAO.php");
$dao = new UserDAO();
$lijst = $dao->getAll();
print("<pre>");
print_r($lijst);
print("</pre>");

//game
/*require_once("data/gameDAO.php");
$dao = new GameDAO();
$lijst = $dao->getAll();
print("<pre>");
print_r($lijst);
print("</pre>");*/

//character
/*require_once("data/characterDAO.php");
$dao = new CharacterDAO();
$list = $dao->getAll();
print("<pre>");
print_r($list);
print("</pre>");*/

/*** test service ***/

//user
/*require_once("business/userService.php");
$userSvc = new UserService();
$list = $userSvc->getUserOverview();
print("<pre>");
print_r($list);
print("</pre>");*/

//game
/*require_once("business/gameService.php");
$gameSvc = new GameService();
$list = $gameSvc->getGameOverview();
print("<pre>");
print_r($list);
print("</pre>");*/
