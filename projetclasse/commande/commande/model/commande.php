<?php
class Commande
{
  
    private ?int $id_cmd = null;
    private ?string $prix_total = null;
    private ?string $description = null;
    private ?string $nbr_article = null;

    public function __construct($id = null, $p, $d, $nbr)
    {
        $this->id_cmd = $id;
        $this->prix_total = $p;
        $this->description = $d;
        $this->nbr_article = $nbr;
    }

    public function getIdCmd()
    {
        return $this->id_cmd;
    }

    public function getPrixTotal()
    {
        return $this->prix_total;
    }

    public function setPrixTotal($prix_total)
    {
        $this->prix_total = $prix_total;
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

    public function getNbrArticle()
    {
        return $this->nbr_article;
    }

    public function setNbrArticle($nbr)
    {
        $this->nbr_article = $nbr;
        return $this;
    }
}
?>
