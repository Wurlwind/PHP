<?php //showallusers.php
require_once("business/userService.php");

$userSvc = new UserService();
$userList = $userSvc->getUserOverview();
include("presentation/userlist.php");
