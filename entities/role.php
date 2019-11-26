<?php
//entities/role.php

class Role
{

    private static $idMap = array();

    private $id;
    private $roleName;

    private function __construct($id, $roleName)
    {
        $this->id = $id;
        $this->roleName = $roleName;
    }

    public static function create($id, $roleName)
    {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Role($id, $roleName);
        }
        return self::$idMap[$id];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoleName()
    {
        return $this->roleName;
    }

    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;
    }
}
