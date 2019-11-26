<?php //business/userService.php

require_once("data/userDAO.php");

class UserService
{

    public function getUserOverview()
    {
        $userDAO = new UserDAO();
        $list = $userDAO->getAll();
        return $list;
    }
}
