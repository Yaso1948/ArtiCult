<?php

class Discussion
{
    private ?int $id_discussion = null;
    private ?string $titre = null;

    public function __construct($id = null, $titre)
    {
        $this->id_discussion = $id;
        $this->titre = $titre;
    }

    public function getIdDiscussion()
    {
        return $this->id_discussion;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this->titre;
    }
}
?>
