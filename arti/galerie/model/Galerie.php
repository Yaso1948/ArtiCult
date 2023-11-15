<?php
class Galerie
{
    private ?int $idGalerie = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $tel = null;
    private ?string $horaires = null;

    public function __construct($id = null, $n, $e, $t, $h)
    {
        $this->idGalerie = $id;
        $this->nom = $n;
        $this->email = $e;
        $this->tel = $t;
        $this->horaires = $h;
    }


    public function getIdGalerie()
    {
        return $this->idGalerie;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function set($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }


    public function getHoraires()
    {
        return $this->horaires;
    }


    public function setHoraires($horaires)
    {
        $this->horaires = $horaires;

        return $this;
    }
}
