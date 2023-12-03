<?php
require_once('../config.php');

class CategorieC {
    public function listCategories() {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT * FROM categorie");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors here
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
            // Handle errors here
            return [];
        }
    }

    public function getPiecesByTypeAndCategory($type_oeuvre, $id_category) {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT * FROM piecedoeuvre WHERE category = :id_category AND type_oeuvre = :type_oeuvre");
            $query->bindParam(':id_category', $id_category, PDO::PARAM_INT);
            $query->bindParam(':type_oeuvre', $type_oeuvre, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors here
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
            // Handle errors here
            return [];
        }
    }
}
?>
