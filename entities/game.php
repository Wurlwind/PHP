<?php
//entities/game.php  

class Game
{
    private $gameId;
    private $gameTitle;
    private $synopsis;
    private $price;
    private $releasedate;
    private $developer;
    private $publisher;
    private $genre;

    public function __construct($gameId, $gameTitle, $synopsis, $price, $releasedate, $developer, $publisher, $genres)
    {
        $this->setId($gameId);
        $this->setGameTitle($gameTitle);
        $this->setSynopsis($synopsis);
        $this->setPrice($price);
        $this->setReleasedate($releasedate);
        $this->setDeveloper($developer);
        $this->setPublisher($publisher);
        $this->setGenres($genres);
    }

    public static function create($gameId, $gameTitle, $synopsis, $price, $releasedate, $developer, $publisher, $genres)
    {
        if (!isset(self::$idMap[$gameId])) {
            self::$idMap[$gameId] = new Character($gameId, $gameTitle, $synopsis, $price, $releasedate, $developer, $publisher, $genres);
        }
        return self::$idMap[$gameId];
    }

    /* userId */
    public function setId($gameId)
    {
        $this->gameId = $gameId;
    }

    public function getId()
    {
        return $this->gameId;
    }

    /* gameTitle */
    public function setGameTitle($gameTitle)
    {
        $this->gameTitle = $gameTitle;
    }

    public function getGameTitle()
    {
        return $this->gameTitle;
    }

    /* synopsis */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    }

    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /* price */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /* releasedate */
    public function setReleasedate($releasedate)
    {
        $this->releasedate = $releasedate;
    }

    public function getReleasedate()
    {
        return $this->releasedate;
    }

    /* developer */
    public function setDeveloper($developer)
    {
        $this->developer = $developer;
    }

    public function getDeveloper()
    {
        return $this->developer;
    }

    /* publisher */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    /* genre */
    public function setGenres($genre)
    {
        $this->genre = $genre;
    }

    public function getGenres()
    {
        return $this->genre;
    }
}
