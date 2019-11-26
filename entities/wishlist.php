<?php
//entities/wishlist.php  

class Wishlist
{
    private $wishlistId;
    private $gameTitle;
    private $synopsis;
    private $price;
    private $genres;
    private $releasedate;

    public function __construct($gameTitle, $price, $synopsis, $genres, $releasedate)
    {
        $this->setGameTitle($gameTitle);
        $this->setPrice($price);
        $this->setReleasedate($releasedate);
        $this->setSynopsis($synopsis);
    }

    public static function create($wishlistId, $gameTitle, $synopsis, $price, $releasedate)
    {
        if (!isset(self::$idMap[$wishlistId])) {
            self::$idMap[$wishlistId] = new Character($wishlistId, $gameTitle, $synopsis, $price, $releasedate);
        }
        return self::$idMap[$wishlistId];
    }

    /* userId */
    public function setId($wishlistId)
    {
        $this->wishlistId = $wishlistId;
    }

    public function getId()
    {
        return $this->wishlistId;
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

    /* genre */
    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    public function getGenres()
    {
        return $this->genres;
    }
}
