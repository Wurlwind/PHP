<?php //data/gameDAO.php

require_once("entities/game.php");
require_once("entities/genre.php");
require_once("DBConfig.php");

class GameDAO
{

    public function getAll()
    {
        $sql = "SELECT game.gameId as GameId, game.gameTitle as Title, game.synopsis as Synopsis, game.price as Price, game.releasedate as 'Release Date', g1.companyname as Developer, g2.companyname as Publisher, GROUP_CONCAT(g3.genre) Genres
                FROM developedby
                INNER JOIN game on developedby.gameId=game.gameId
                INNER JOIN gamecompany as g1 on developedby.gamecompanyId=g1.gamecompanyId
                INNER JOIN publishedby on developedby.gameId = publishedby.gameId
                INNER JOIN gamecompany as g2 on publishedby.gamecompanyId = g2.gamecompanyId
                INNER JOIN genrespergame on game.gameId=genrespergame.gameId
                INNER JOIN genre as g3 on genrespergame.genreId = g3.genreId
                GROUP BY game.gameId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $game = new Game($row["GameId"], $row["Title"], $row["Synopsis"], $row["Price"], $row["Release Date"], $row["Developer"], $row["Publisher"], $row["Genres"]);
            array_push($list, $game);
        }
        $dbh = null;
        return $list;
    }

    public function getRand($limit)
    {
        $limRows = $limit;
        if ($limRows <= 0) {
            $limRows = 1;
        };
        $sql = "SELECT game.gameId as GameId, game.gameTitle as Title, game.synopsis as Synopsis, game.price as Price, game.releasedate as 'Release Date', g1.companyname as Developer, g2.companyname as Publisher, GROUP_CONCAT(g3.genre) Genres
                FROM developedby
                INNER JOIN game on developedby.gameId=game.gameId
                INNER JOIN gamecompany as g1 on developedby.gamecompanyId=g1.gamecompanyId
                INNER JOIN publishedby on developedby.gameId = publishedby.gameId
                INNER JOIN gamecompany as g2 on publishedby.gamecompanyId = g2.gamecompanyId
                INNER JOIN genrespergame on game.gameId=genrespergame.gameId
                INNER JOIN genre as g3 on genrespergame.genreId = g3.genreId
                GROUP BY game.gameId
                ORDER BY RAND()
                LIMIT " . $limRows;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $game = new Game($row["GameId"], $row["Title"], $row["Synopsis"], $row["Price"], $row["Release Date"], $row["Developer"], $row["Publisher"], $row["Genres"]);
            array_push($list, $game);
        }
        $dbh = null;
        return $list;
    }

    public function getNames()
    {
        $sql = "SELECT game.gameTitle as Title
                FROM developedby
                INNER JOIN game on developedby.gameId=game.gameId
                INNER JOIN gamecompany as g1 on developedby.gamecompanyId=g1.gamecompanyId
                INNER JOIN publishedby on developedby.gameId = publishedby.gameId
                INNER JOIN gamecompany as g2 on publishedby.gamecompanyId = g2.gamecompanyId
                INNER JOIN genrespergame on game.gameId=genrespergame.gameId
                INNER JOIN genre as g3 on genrespergame.genreId = g3.genreId
                GROUP BY game.gameId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        foreach ($resultSet as $row) {
            $gameTitle = $row['Title'];
            array_push($list, $gameTitle);
        }
        $dbh = null;
        return $list;
    }

    public function getFiltered($name, $genre)
    {
        /*echo $name . "<br/>";
        echo $genre . "<br/>";*/
        $nameSql = '';
        $genreSql = '';
        if ($name != '') {
            $nameSql = "WHERE game.gameTitle LIKE '%$name%' ";
        }
        if ($genre != '') {
            $genreSql = "HAVING Genres LIKE '%$genre%'";
        }
        /*echo $nameSql . "<br/>";
        echo $genreSql . "<br/>";*/

        $sql = "SELECT game.gameId as GameId, game.gameTitle as Title, game.synopsis as Synopsis, game.price as Price, game.releasedate as 'Release Date', g1.companyname as Developer, g2.companyname as Publisher, GROUP_CONCAT(g3.genre) Genres
                FROM developedby
                INNER JOIN game on developedby.gameId=game.gameId
                INNER JOIN gamecompany as g1 on developedby.gamecompanyId=g1.gamecompanyId
                INNER JOIN publishedby on developedby.gameId = publishedby.gameId
                INNER JOIN gamecompany as g2 on publishedby.gamecompanyId = g2.gamecompanyId
                INNER JOIN genrespergame on game.gameId=genrespergame.gameId
                INNER JOIN genre as g3 on genrespergame.genreId = g3.genreId "
            . $nameSql
            . "GROUP BY game.gameId "
            . $genreSql;
        echo $sql . "<br/>";
        /*$sql  = "SELECT * FROM game WHERE gameTitle LIKE '%$search%'";*/
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $list = array();
        if ($resultSet) {
            foreach ($resultSet as $row) {
                $game = new Game($row["GameId"], $row["Title"], $row["Synopsis"], $row["Price"], $row["Release Date"], $row["Developer"], $row["Publisher"], $row["Genres"]);
                array_push($list, $game);
            }
        }
        $dbh = null;
        return $list;
    }

    public function getById($id)
    {
        $sql = "SELECT game.*, gc.companyname as Developer, gc2.companyname as Publisher, GROUP_CONCAT(gr.genre) Genres
                FROM developedby
                INNER JOIN game on developedby.gameId=game.gameId
                INNER JOIN gamecompany as gc on developedby.gamecompanyId=gc.gamecompanyId
                INNER JOIN publishedby on developedby.gameId = publishedby.gameId
                INNER JOIN gamecompany as gc2 on publishedby.gamecompanyId = gc2.gamecompanyId
                INNER JOIN genrespergame on game.gameId=genrespergame.gameId
                INNER JOIN genre as gr on genrespergame.genreId = gr.genreId
                WHERE game.gameId='$id'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $game = new Game($id, $row["gameTitle"], $row["synopsis"], $row["price"], $row["releasedate"], $row['Developer'], $row['Publisher'], $row['Genres']);
        $dbh = null;
        return $game;
    }
}
