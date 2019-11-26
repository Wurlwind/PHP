<?php
//business/GenreService.php
require_once("data/roleDAO.php");

class RoleService
{
    public function getRoleOverview()
    {
        $roleDAO = new RoleDAO();
        $lijst = $roleDAO->getAll();
        return $lijst;
    }
}
