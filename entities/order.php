<?php
//entities/order.php
class Order
{
    private static $idMap = array();
    private $id;
    private $userId;
    private $date;
    private $totalPrice;
    private $games = array();

    private function __construct($id, $userId, $date, $totalPrice, $games)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->date = $date;
        $this->totalPrice = $totalPrice;
        $this->games = $games;
    }

    public static function create($id, $userId, $date, $totalPrice, $games)
    {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Order($id, $userId, $date, $totalPrice, $games);
        }
        return self::$idMap[$id];
    }
    public function getId()
    {
        return $this->id;
    }
    //userId
    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    //date
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    //totalPrice
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }
    //gamesArray
    public function getGames()
    {
        return $this->games;
    }
    public function setGames($games)
    {
        $this->games = $games;
    }
}
