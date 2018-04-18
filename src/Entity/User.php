<?php

namespace Entity;


class User
{
    /**
     * @var string
     */
    private $username = '';
    private $password = '';
    private $ID = 0;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     * @return User
     */
    public function setID(int $ID): User
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}