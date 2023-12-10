<?php

class Commentaire
{
    private ?int $id_commentaire = null;
    private ?string $contenu = null;
    private ?int $user_id = null;
    private ?int $id_discussion = null;

    public function __construct($id = null, $cont, $user, $id_dis)
    {
        $this->id_commentaire = $id;
        $this->contenu = $cont;
        $this->user_id = $user;
        $this->id_discussion = $id_dis;
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

    public function getIdDiscussion()
    {
        return $this->id_discussion;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this->contenu;
    }
}
?>