<?php
//entities/character.php

class Character
{

    private static $idMap = array();

    private $id;
    private $firstName;
    private $lastName;

    private function __construct($id, $firstName, $lastName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public static function create($id, $firstName, $lastName)
    {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Character($id, $firstName, $lastName);
        }
        return self::$idMap[$id];
    }

    public function getId()
    {
        return $this->id;
    }

    //firstname
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    //lastname
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
}
