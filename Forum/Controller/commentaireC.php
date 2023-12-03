<?php

require_once('../config.php');
require_once('../config2.php');

class CommentaireC {

    private $pdo;

    public function __construct() {
        $this->pdo = config::getConnexion();
    }

    public function listCommentaires() {
        try {
            $query = $this->pdo->prepare("SELECT * FROM Commentaire");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des commentaires: " . $e->getMessage());
        }
    }

    public function getCommentaireParUserId($user_id) {
        try {
            $query = $this->pdo->prepare("SELECT * FROM Commentaire WHERE user_id = :user_id");
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll to get a single row
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération du commentaire par utilisateur: " . $e->getMessage());
        }
    }

    public function deleteCommentaire($id_commentaire) {
        try {
            $query = $this->pdo->prepare("DELETE FROM Commentaire WHERE id_commentaire = :id_commentaire");
            $query->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression du commentaire: " . $e->getMessage());
        }
    }

    public function addCommentaire($user_id, $commentaire) {
        try {
            $query = $this->pdo->prepare("INSERT INTO Commentaire (user_id, contenu) VALUES (:user_id, :contenu)");
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->bindParam(':contenu', $commentaire->getContenu(), PDO::PARAM_STR);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout du commentaire: " . $e->getMessage());
        }
    }

    public function updateCommentaire($commentaire, $id_commentaire) {
        try {
            $query = $this->pdo->prepare("UPDATE Commentaire SET contenu = :contenu WHERE id_commentaire = :id_commentaire");
            $query->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $query->bindParam(':contenu', $commentaire->getContenu(), PDO::PARAM_STR);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour du commentaire: " . $e->getMessage());
        }
    }
}

?>
