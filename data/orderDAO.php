<?php
//data/GenreDAO.php
require_once("DBConfig.php");
require_once("entities/order.php");

class OrderDAO
{
    public function getAll()
    {
        $sql = "SELECT * FROM userorder";
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME
        );

        $resultSet = $dbh->query($sql);
        $row = array();
        foreach ($resultSet as $row) {
            $game = array($row['gameId']);
            $order = Order::create($row["orderId"], $row["userId"], $row['orderDate'], 0, game);
            array_push($lijst, $order);
        }
        $dbh = null;
        return $lijst;
    }

    public function getUserOrders($userId)
    {
        $sql = "SELECT uord.*, GROUP_CONCAT(gord.gameId) GameIds
                FROM userorder as uord
                INNER JOIN gamesordered as gord on uord.orderId=gord.orderId
                WHERE uord.userId='$userId'
                GROUP BY uord.orderId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME);
        $resultSet = $dbh->query($sql);

        $orderList = array();
        if ($resultSet) {
            foreach ($resultSet as $row) {
                $gameIds = explode(",", $row['GameIds']);
                $totalPrice = 0;
                $subList = array();
                foreach ($gameIds as $game) {
                    $sql2 = "SELECT game.gameTitle, gOrd.amount, gOrd.priceWhenOrdered
                             FROM game
                             INNER JOIN gamesordered as gOrd on gOrd.gameId=game.gameId
                             WHERE game.gameId='$game'
                             AND gOrd.orderId='" . $row['orderId'] . "'";
                    $resultSet2 = $dbh->query($sql2);

                    foreach ($resultSet2 as $row2) {
                        $totalPrice += $row2['amount'] * $row2['priceWhenOrdered'];
                        $info = array($row2['gameTitle'], $row2['amount'], $row2['priceWhenOrdered']);
                        array_push($subList, $info);
                    }
                }
                $order = Order::create($row["orderId"], $row["userId"], $row['orderDate'], $totalPrice, $subList);
                array_push($orderList, $order);
            }
        }
        $dbh = null;
        return $orderList;
    }
}
