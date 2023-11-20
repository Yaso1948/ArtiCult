<?php
class reclamation
{
    private ?int $id_rec = null;
    private ?string $titre = null;
    private ?string $description = null;
    private ?string $date_reclamation = null;
    

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->id_rec = $id;
        $this->titre = $n;
        $this->description = $p;
        $this->date_reclamation = $a;
    }


    public function getIdreclamation()
    {
        return $this->id_rec;
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


    public function getdescription()
    {
        return $this->description;
    }


    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getdate_reclamation()
    {
        return $this->date_reclamation;
    }


    public function setdate_reclamation($date_reclamation)
    {
        $this->date_reclamation = $date_reclamation;

        return $this;
    }


    
}