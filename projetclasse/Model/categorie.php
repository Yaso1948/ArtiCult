<?php
class Categorie {
    private $id_category;
    private $type_oeuvre;

    // Constructeur
    public function __construct($id_category, $type_oeuvre) {
        $this->id_category = $id_category;
        $this->type_oeuvre = $type_oeuvre;
    }

    // Méthode pour obtenir l'ID de la catégorie
    public function getIdCategory() {
        return $this->id_category;
    }

    // Méthode pour obtenir le type de la catégorie
    public function getTypeOeuvre() {
        return $this->type_oeuvre;
    }
}
?>