<?php
class piecedoeuvre
{
    private ?int $id_piece_doeuvre = null;
    private ?string $titre = null;
    private ?string $proprietaire = null;
    private ?string $description = null;
    private ?int $prix = null;
    private ?string $support = null;
    private ?string $etat = null;
    private ?int $poids = null;
    private ?string $image = null;
    private ?int $category = null;
    public function __construct($id_piece_doeuvre = null,$titre,$proprietaire,$description )
    {
        $this->id_piece_doeuvre = $id_piece_doeuvre;
        $this->titre = $titre;
        $this->proprietaire = $proprietaire;
        $this->edescription = $description;
        $this->support = $support;
        $this->etat= $$etat;
        $this->poids = $poids;
        $this->image = $image;
        $this->category = $category;
       
    }


    public function getidoeuvre()
    {
        return $this->id_piece_doeuvre;
    }


    public function gettitre()
    {
        return $this->titre;
    }


    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }


    public function getproprietaire()
    {
        return $this->proprietaire;
    }


    public function setproprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }


    public function getdescription()
    {
        return $this->description;
    }


    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getsupport()
    {
        return $this->support;
    }


    public function setsupport($support)
    {
        $this->support = $support;

        return $this;
    }
    public function getetat()
    {
        return $this->etat;
    }


    public function setetat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
    public function getpoids()
    {
        return $this->poids;
    }


    public function setpoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }
    public function getimage()
    {
        return $this->image;
    }


    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getcategory()
    {
        return $this->category;
    }


    public function setcategory($category)
    {
        $this->category = $category;

        return $this;
    }

}
