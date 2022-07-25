<?php

class User
{
    private $id, $username, $parola, $confirmareparola, $sex, $starecivila, $nume, $prenume, $email, $order, $dateinregistare;

    /**
     * @param $id
     * @param $username
     * @param $parola
     * @param $sex
     * @param $starecivila
     * @param $nume
     * @param $prenume
     * @param $email
     * @param $order
     * @param $dateinregistare
     */
    public function __construct($id, $username, $parola, $confirmareparola, $sex, $starecivila, $nume, $prenume, $email, $order, $dateinregistare)
    {
        $this->id = $id;
        $this->username = $username;
        $this->parola = $parola;
        $this->confirmareparola = $confirmareparola;
        $this->sex = $sex;
        $this->starecivila = $starecivila;
        $this->nume = $nume;
        $this->prenume = $prenume;
        $this->email = $email;
        $this->order=$order;
        $this->dateinregistare=$dateinregistare;
    }

    /**
     * @return mixed
     */
    public function getDateinregistare()
    {
        return $this->dateinregistare;
    }

    /**
     * @param mixed $dateinregistare
     */
    public function setDateinregistare($dateinregistare)
    {
        $this->dateinregistare = $dateinregistare;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getParola()
    {
        return $this->parola;
    }

    /**
     * @param mixed $parola
     */
    public function setParola($parola)
    {
        $this->parola = $parola;
    }

    /**
     * @return mixed
     */
    public function getConfirmareparola()
    {
        return $this->confirmareparola;
    }

    /**
     * @param mixed $confirmareparola
     */
    public function setConfirmareparola($confirmareparola)
    {
        $this->confirmareparola = $confirmareparola;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getStarecivila()
    {
        return $this->starecivila;
    }

    /**
     * @param mixed $starecivila
     */
    public function setStarecivila($starecivila)
    {
        $this->starecivila = $starecivila;
    }

    /**
     * @return mixed
     */
    public function getNume()
    {
        return $this->nume;
    }

    /**
     * @param mixed $nume
     */
    public function setNume($nume)
    {
        $this->nume = $nume;
    }

    /**
     * @return mixed
     */
    public function getPrenume()
    {
        return $this->prenume;
    }

    /**
     * @param mixed $prenume
     */
    public function setPrenume($prenume)
    {
        $this->prenume = $prenume;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}
?>