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
    public function getOeuvreById($id_piece_doeuvre) {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT * FROM piecedoeuvre WHERE id_piece_doeuvre = :id_piece_doeuvre");
            $query->bindParam(':id_piece_doeuvre', $id_piece_doeuvre, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors here
            return null;
        }
    }
    public function getTotalPieces() {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT COUNT(*) as total FROM piecedoeuvre");
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (PDOException $e) {
            // Handle errors here
            return 0;
        }
    }

    public function getAllPiecesWithPagination($tri = 'asc', $itemsPerPage, $offset) {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT * FROM piecedoeuvre ORDER BY prix " . ($tri === 'desc' ? 'DESC' : 'ASC') . " LIMIT :itemsPerPage OFFSET :offset");
            $query->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors here
            return [];
        }
    }
    public function getAllPieces($tri = 'asc') {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT * FROM piecedoeuvre ORDER BY prix " . ($tri === 'desc' ? 'DESC' : 'ASC'));
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors here
            return [];
        }
    }
}
?>
