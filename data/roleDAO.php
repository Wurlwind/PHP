<?php
//data/GenreDAO.php
require_once("DBConfig.php");
require_once("entities/role.php");

class roleDAO
{
    public function getAll()
    {
        $sql = "select * from characterrole";
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME
        );

        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $genre = Role::create($rij["roleId"], $rij["theRole"]);
            array_push($lijst, $genre);
        }
        $dbh = null;
        return $lijst;
    }
}
