<?php //business/gameService.php

require_once("data/gameDAO.php");

class GameService
{

    public function getGameOverview()
    {
        $gameDAO = new GameDAO();
        $list = $gameDAO->getAll();
        return $list;
    }

    public function filterList($name, $genre)
    {
        $gameDAO = new GameDAO();
        $list = $gameDAO->getFiltered($name, $genre);
        return $list;
    }

    public function getGameNames()
    {
        $gameDAO = new GameDAO();
        $list = $gameDAO->getNames();
        return $list;
    }

    public function getRand($limit)
    {
        $gameDAO = new GameDAO();
        $list = $gameDAO->getRand($limit);
        return $list;
    }

    public function getById($id)
    {
        $gameDAO = new GameDAO();
        $game = $gameDAO->getById($id);
        return $game;
    }
}
