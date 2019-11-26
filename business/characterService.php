<?php //business/characterService.php

require_once("data/characterDAO.php");

class CharacterService
{

    public function getCharacterOverview()
    {
        $characterDAO = new CharacterDAO();
        $list = $characterDAO->getAll();
        return $list;
    }

    public function filterList($name, $role, $game)
    {
        $characterDAO = new CharacterDAO();
        $list = $characterDAO->getFiltered($name, $role, $game);
        return $list;
    }

    public function getGamesIn($id)
    {
        $characterDAO = new CharacterDAO();
        $list = $characterDAO->getGamesIn($id);
        return $list;
    }

    public function getFromGame($id)
    {
        $characterDAO = new CharacterDAO();
        $list = $characterDAO->getFromGameId($id);
        return $list;
    }
}
