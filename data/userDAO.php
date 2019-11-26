<?php //data/UserDAO.php

require_once("entities/user.php");
require_once("DBConfig.php");

class UserDAO
{

    public function getAll()
    {
        $sql = "SELECT * FROM siteuser";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $row) {
            $user = new User($row["userId"], $row["username"], $row["email"], $row["userPassword"], $row["hashed"], $row["reviewer"]);
            array_push($lijst, $user);
        }
        $dbh = null;
        return $lijst;
    }



    /*$userId, $username, $email, $password, $hashed, $reviewer*/
}
