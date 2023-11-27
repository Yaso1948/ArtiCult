<?php

class Commentaire
{
    private ?int $id_commentaire = null;
    private ?string $contenu = null;

    public function __construct($id = null, $cont)
    {
        $this->id_commentaire = $id;
        $this->contenu = $cont;
    }

    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }
}
?>
