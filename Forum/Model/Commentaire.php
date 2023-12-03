<?php

class Commentaire
{
    private ?int $id_commentaire = null;
    private ?string $contenu = null;
    private ?int $user_id = null;

    public function __construct($id = null, $cont, $user)
    {
        $this->id_commentaire = $id;
        $this->contenu = $cont;
        $this->user_id = $user;
    }

    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this->contenu;
    }
}
?>