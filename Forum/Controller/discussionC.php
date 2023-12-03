<?php

require_once('../config.php');

class DiscussionC {

    private $pdo;

    public function __construct() {
        $this->pdo = config::getConnexion();
    }

    public function listDiscussions() {
        try {
            $query = $this->pdo->prepare("SELECT * FROM Discussion");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des discussions: " . $e->getMessage());
        }
    }

    public function getDiscussionById($id_discussion) {
        try {
            $query = $this->pdo->prepare("SELECT * FROM Discussion WHERE id_discussion = :id_discussion");
            $query->bindParam(':id_discussion', $id_discussion, PDO::PARAM_INT);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération de la discussion par ID: " . $e->getMessage());
        }
    }

    public function deleteDiscussion($id_discussion) {
        try {
            $query = $this->pdo->prepare("DELETE FROM Discussion WHERE id_discussion = :id_discussion");
            $query->bindParam(':id_discussion', $id_discussion, PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression de la discussion: " . $e->getMessage());
        }
    }

    public function addDiscussion($id_commentaire, $titre) {
        try {
            $query = $this->pdo->prepare("INSERT INTO Discussion (id_commentaire, titre) VALUES (:id_commentaire, :titre)");
            $query->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $query->bindParam(':titre', $titre, PDO::PARAM_STR);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout de la discussion: " . $e->getMessage());
        }
    }

    public function updateDiscussion($titre, $id_discussion) {
        try {
            $query = $this->pdo->prepare("UPDATE Discussion SET titre = :titre WHERE id_discussion = :id_discussion");
            $query->bindParam(':id_discussion', $id_discussion, PDO::PARAM_INT);
            $query->bindParam(':titre', $titre, PDO::PARAM_STR);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour de la discussion: " . $e->getMessage());
        }
    }
}

?>
