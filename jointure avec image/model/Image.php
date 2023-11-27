<?php
class Image
{
    private ?int $idImage = null;
    private ?string $titre = null;
    private ?string $portrait = null;
    private ?int $idGalerie = null;

    private ?Galerie $galerie = null;

    public function __construct($id = null, $t, $p, $idG)
    {
        $this->idImage = $id;
        $this->titre = $t;
        $this->portrait = $p;
        $this->idGalerie = $idG;
    }

    // Getters and setters for idImage, nom, description, and image

    public function getIdGalerie()
    {
        return $this->idGalerie;
    }

    public function setIdGalerie($idGalerie)
    {
        $this->idGalerie = $idGalerie;

        return $this;
    }
/*
    public function getGalerie()
    {
        return $this->galerie;
    }

    public function setGalerie(Galerie $galerie)
    {
        $this->galerie = $galerie;

        return $this;
    }
*/

    public function getIdImage()
    {
        return $this->idImage;
    }


    public function getTitre()
    {
        return $this->titre;
    }


    public function set($titre)
    {
        $this->titre = $titre;

        return $this;
    }
    public function getPortrait()
    {
        return $this->portrait;
    }


    public function setPor($portrait)
    {
        $this->portrait = $portrait;

        return $this;
    }
    
}