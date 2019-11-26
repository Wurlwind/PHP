<?php
//data/GenreDAO.php
require_once("DBConfig.php");
require_once("entities/genre.php");

class GenreDAO {
    public function getAll() {
        $sql = "select genreId, genre from genre";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();

        foreach ($resultSet as $rij) {
            $genre = Genre::create($rij["genreId"], $rij["genre"]);
            array_push($lijst, $genre);
        }
        $dbh = null;
        return $lijst;
    }
}
