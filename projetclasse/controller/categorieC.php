<?php

require_once('../config.php'); // Assurez-vous d'ajuster le chemin si nécessaire

class CategorieC {
    public function listCategories() {
        $pdo = config::getConnexion();

        try {
            $query = $pdo->prepare("SELECT * FROM categorie");
            $query->execute();
            
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gestion des erreurs (à adapter selon votre besoin)
            echo "Error fetching categories: " . $e->getMessage();
            return [];
        }
    }

    public function getPiecesByCategoryId($id_category) {
        $pdo = config::getConnexion();

        try {
            $query = $pdo->prepare("SELECT * FROM piecedoeuvre WHERE category = :id_category");
            $query->bindParam(':id_category', $id_category, PDO::PARAM_INT);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs ici
            return [];
        }
    }

    public function getAllPieces() {
        $pdo = config::getConnexion();

        try {
            $query = $pdo->prepare("SELECT * FROM piecedoeuvre");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs ici
            return [];
        }
    }
}
?>
