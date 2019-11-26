<?php //data/gameDAO.php

require_once("entities/gamecompany.php");
require_once("DBConfig.php");

class GamecompanyDAO
{

    public function getAll()
    {
        $sql = "SELECT * FROM gamecompany";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, '');
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $row) {
            $gamecompany = Gamecompany::create($row["gamecompanyId"], $row["companyname"]);
            array_push($lijst, $gamecompany);
        }
        $dbh = null;
        return $lijst;
    }
}
