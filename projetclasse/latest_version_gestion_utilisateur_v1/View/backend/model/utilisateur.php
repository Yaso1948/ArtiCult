<?php
class utilisateur
{
    private ?int $id_utilisateur = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $pass = null;
    private ?string $rol = null;
    private ?string $adress = null;

    public function __construct($id_utilisateur = null, $nom, $prenom, $email, $pass, $rol , $adress)
    {
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pass = $pass;
        $this->rol = $rol;
        $this->adress = $adress;
    }


    public function getid_utilisateur()
    {
        return $this->id_utilisateur;
    }
    public function getadress()
    {
        return $this->adress;
    }
    public function setadress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

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
    public function setpass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
    public function getpass()
    {
        return $this->pass;
    }
    public function getrol()
    {
        return $this->rol;
    }
}