<?php //business/gamecompanyService.php

require_once("data/gamecompanyDAO.php");

class GamecompanyService
{

    public function getGamecompanyOverview()
    {
        $gamecompanyDAO = new GamecompanyDAO();
        $list = $gamecompanyDAO->getAll();
        return $list;
    }
}
