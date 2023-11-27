<?php

require_once('../config.php');

class DiscussionC {

    public function listDiscussions() {
        $pdo = config::getConnexion();
        try {
            $query = $this->pdo->prepare("SELECT * FROM Discussion");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des discussions: " . $e->getMessage();
        }
    }

    public function getDiscussionParCommentaireId($id_commentaire) {
        $pdo = config::getConnexion();
        try {
            $query = $this->pdo->prepare("SELECT * FROM Discussion WHERE id_commentaire = :id_commentaire");
            $query->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des discussions: " . $e->getMessage();
        }
    }

    public function ajouterDiscussion($id_commentaire, $titre) {
        $pdo = config::getConnexion();
        try {
            $query = $this->pdo->prepare("INSERT INTO Discussion (id_commentaire, titre) VALUES (:id_commentaire, :titre)");
            $query->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $query->bindParam(':titre', $titre, PDO::PARAM_STR);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des discussions: " . $e->getMessage();
        }
    }

    public function updateDiscussion($id_discussion, $titre) {
        $pdo = config::getConnexion();
        try {
            $query = $this->pdo->prepare("UPDATE Discussion SET titre = :titre WHERE id_discussion = :id_discussion");
            $query->bindParam(':id_discussion', $id_discussion, PDO::PARAM_INT);
            $query->bindParam(':titre', $titre, PDO::PARAM_STR);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des discussions: " . $e->getMessage();
        }
    }

    public function deleteDiscussion($id_discussion) {
        $pdo = config::getConnexion();
        try {
            $query = $this->pdo->prepare("DELETE FROM Discussion WHERE id_discussion = :id_discussion");
            $query->bindParam(':id_discussion', $id_discussion, PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des discussions: " . $e->getMessage();
        }
    }

}
?>
