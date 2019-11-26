<?php //data/characterDAO.php

require_once("entities/character.php");
require_once("DBConfig.php");

class CharacterDAO
{

    public function getAll()
    {
        $sql = "SELECT * FROM gamecharacter";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $character = Character::create($row["characterId"], $row["firstName"], $row["lastName"]);
            array_push($list, $character);
        }
        $dbh = null;
        return $list;
    }

    /* public function getFiltered($name)
    {
        $nameSql = '';
        if ($name != '') {
            $nameSql = "WHERE firstName LIKE '%$name%' OR lastName LIKE '%$name%' ";
        }

        $sql = "SELECT * FROM gamecharacter "
            . $nameSql;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $character = Character::create($row["characterId"], $row["firstName"], $row["lastName"]);
            array_push($list, $character);
        }
        $dbh = null;
        return $list;
    } */

    public function getFiltered($name, $role, $game)
    {
        $nameSql = '';
        $roleSql = '';
        $gameSql = '';
        if ($name != '') {
            $nameSql = "WHERE gc.firstName LIKE '%$name%' OR gc.lastName LIKE '%$name%' ";
        }
        if ($role != '') {
            $roleSql = "HAVING Roles LIKE '%$role%' ";
        }
        if ($game != '' && $role != '') {
            $gameSql = "AND Games LIKE '%$game%'  ";
        } else if ($game != '') {
            $gameSql = "HAVING Games LIKE '%$game%' ";
        }

        $sql = "SELECT gc.*, game.gameId as GameId, GROUP_CONCAT(game.gameTitle) Games, GROUP_CONCAT(g1.theRole, ', ') Roles
                FROM game
                INNER JOIN characterroleingame on characterroleingame.gameId=game.gameId
                INNER JOIN characterrole as g1 on g1.roleId=characterroleingame.roleId
                INNER JOIN gamecharacter as gc on gc.characterId=characterroleingame.characterId "
            . $nameSql
            . "GROUP BY gc.characterId "
            . $roleSql
            . $gameSql;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $character = Character::create($row["characterId"], $row["firstName"], $row["lastName"]);
            array_push($list, $character);
        }
        $dbh = null;
        return $list;
    }

    public function getGamesIn($id)
    {
        $sql = "SELECT game.gameId as GameId, game.gameTitle as Game, g1.theRole as Role
                FROM game
                INNER JOIN characterroleingame on characterroleingame.gameId=game.gameId
                INNER JOIN characterrole as g1 on g1.roleId=characterroleingame.roleId
                INNER JOIN gamecharacter on gamecharacter.characterId=characterroleingame.characterId
                WHERE gamecharacter.characterId=$id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        if ($resultSet) {
            foreach ($resultSet as $row) {
                $game = array($row['Game'], $row['Role'], $row['GameId']);
                array_push($list, $game);
            }
        }
        return $list;
    }

    public function getFromGameId($id)
    {
        $sql =  "SELECT gc.firstName as FirstName, gc.lastName as LastName, cr.theRole as Role
                FROM gamecharacter as gc
                INNER JOIN characterroleingame as crg on crg.characterId=gc.characterId
                INNER JOIN characterrole as cr on cr.roleId=crg.roleId
                INNER JOIN game as g on g.gameId=crg.gameId
                WHERE g.gameId=$id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        if ($resultSet) {
            foreach ($resultSet as $row) {
                $char = array($row['FirstName'], $row['LastName'], $row['Role']);
                array_push($list, $char);
            }
        }
        return $list;
    }
}
