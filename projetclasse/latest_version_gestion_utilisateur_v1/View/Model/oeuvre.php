<?php
class Piecedoeuvre
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

    public function __construct(
        $id_piece_doeuvre = null,
        $titre,
        $proprietaire,
        $description,
        $prix,
        $support,
        $etat,
        $poids,
        $image,
        $category
    ) {
        $this->id_piece_doeuvre = $id_piece_doeuvre;
        $this->titre = $titre;
        $this->proprietaire = $proprietaire;
        $this->description = $description;
        $this->prix = $prix;
        $this->support = $support;
        $this->etat = $etat;
        $this->poids = $poids;
        $this->image = $image;
        $this->category = $category;
    }

    public function getIdPieceDoeuvre()
    {
        return $this->id_piece_doeuvre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getSupport()
    {
        return $this->support;
    }

    public function setSupport($support)
    {
        $this->support = $support;
        return $this;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
        return $this;
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function setPoids($poids)
    {
        $this->poids = $poids;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
}
?>
