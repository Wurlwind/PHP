<?php
//entities/user.php  

class User
{
    private $userId;
    private $username;
    private $email;
    private $password;

    private $hashed;
    private $reviewer;

    public function __construct($userId, $username, $email, $password, $hashed, $reviewer)
    {
        $this->setId($userId);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setHashed($hashed);
        $this->setReviewer($reviewer);
    }

    /* userId */
    public function setId($userId)
    {
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->userId;
    }

    /* username */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /* email */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /* password */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /* hashed boolean */
    public function setHashed($hashed)
    {
        $this->hashed = $hashed;
    }

    public function getHashed()
    {
        return $this->hashed;
    }

    /* reviewer boolean */
    public function setReviewer($reviewer)
    {
        $this->reviewer = $reviewer;
    }

    public function getReviewer()
    {
        return $this->reviewer;
    }
}
