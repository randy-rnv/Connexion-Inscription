<?php

class User
{
    private $id_user;
    private $first_name;
    private $last_name;
    private $login;
    private $password;
    private $birthday;
    private $gender;

    /**
     * User constructor.
     * @param $id_user
     * @param $first_name
     * @param $last_name
     * @param $login
     * @param $password
     * @param $birthday
     * @param $gender
     */
    public function __construct($first_name="", $last_name="", $login="", $password="", $birthday="", $gender="", $id_user=0)
    {
        $this->id_user = $id_user;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->login = $login;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->gender = $gender;
    }


    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function __toString()
    {
        return $this->login . " / " . $this->password;
    }

}