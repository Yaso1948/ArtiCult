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

    public function listDiscussionByTitle($titre) {
        try {
            $query = $this->pdo->prepare("SELECT * FROM Discussion ORDER BY titre");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des discussions: " . $e->getMessage());
        }
    }

    public function getTotalDiscussions() {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT COUNT(*) as total FROM Discussion");
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (PDOException $e) {
            // Handle errors here
            return 0;
        }
    }

    public function getAllDiscussionsWithPagination($tri = 'asc', $discussionPerPage, $offset) {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT * FROM Discussion ORDER BY titre " . ($tri === 'desc' ? 'DESC' : 'ASC') . " LIMIT :discussionPerPage OFFSET :offset");
            $query->bindParam(':discussionPerPage', $discussionPerPage, PDO::PARAM_INT);
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors here
            return [];
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

    /*public function getCommentsForDiscussion($discussionId) {

        $comments = array();

        // Assuming 'discussions' is the table name for discussions
        // and 'commentaires' is the table name for comments
        $query = $this->pdo->prepare("SELECT c.* FROM Commentaire c
                  INNER JOIN Discussion d ON c.id_commentaire = d.id_commentaire
                  WHERE d.id_discussion = :discussionId");
        $query->bindParam(':discussionId', $discussionId, PDO::PARAM_INT);

        if ($query->execute()) {
            // Fetch all comments for the discussion
            $comments = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $comments;
    }*/

    public function getDiscussionByTitle($titre) {
        try {
            $query = $this->pdo->prepare("SELECT * FROM Discussion WHERE titre = :titre");
            $query->bindParam(':titre', $titre, PDO::PARAM_STR);
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

    public function addDiscussion($titre) {
        try {
            $query = $this->pdo->prepare("INSERT INTO Discussion (titre) VALUES (:titre)");
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
