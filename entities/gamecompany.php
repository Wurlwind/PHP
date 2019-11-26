<?php
//entities/gamecompany.php

class Gamecompany
{

    private static $idMap = array();

    private $id;
    private $companyName;

    private function __construct($id, $companyName)
    {
        $this->id = $id;
        $this->companyName = $companyName;
    }

    public static function create($id, $companyName)
    {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Gamecompany($id, $companyName);
        }
        return self::$idMap[$id];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }
}
