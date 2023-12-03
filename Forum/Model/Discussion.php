<?php

class Discussion
{
    private ?int $id_discussion = null;
    private ?string $titre = null;
    private ?int $id_commentaire = null;

    public function __construct($id = null, $titre, $id_commentaire)
    {
        $this->id_discussion = $id;
        $this->titre = $titre;
        $this->id_commentaire = $id_commentaire;
    }

    public function getIdDiscussion()
    {
        return $this->id_discussion;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this->titre;
    }
}
?>
