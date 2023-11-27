<?php

class Discussion
{
    private ?int $id_discussion = null;
    private ?Commentaire $commentaire = null;
    private ?string $titre = null;

    public function __construct($id = null, Commentaire $com, $t)
    {
        $this->id_discussion = $id;
        $this->commentaire = $com;
        $this->titre = $t;
    }

    public function getIdDiscussion()
    {
        return $this->id_discussion;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function setCommentaire(Commentaire $commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
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
}
?>
