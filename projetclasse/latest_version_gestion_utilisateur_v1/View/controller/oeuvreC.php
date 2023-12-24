<?php
include('configu.php');

class oeuvreC
{
    public function listOeuvre()
{
    $pdo = configu::getConnexion();
    $query = $pdo->prepare("SELECT piecedoeuvre.*, categorie.type_oeuvre 
                    FROM piecedoeuvre
                    INNER JOIN categorie ON piecedoeuvre.category = categorie.id_categorie");
    $query->execute();
    $oeuvre = $query->fetchAll();

    return $oeuvre;
}


    public function deleteOeuvre($id_piece_doeuvre)
    {
        $pdo = configu::getConnexion();

        try {
            $query = $pdo->prepare("DELETE FROM piecedoeuvre WHERE id_piece_doeuvre = :id");
            $query->bindParam(':id', $id_piece_doeuvre, PDO::PARAM_INT);
            
            if ($query->execute()) {
                return true;
            } else {
                // Ajoutez des messages de débogage ici
                echo "Error executing delete query. Debug info: " . implode(" ", $query->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            // Ajoutez des messages de débogage ici
            echo "Error executing delete query. Exception: " . $e->getMessage();
            return false;
        }
    }
    

    public function addOeuvre($titre, $proprietaire, $description, $prix, $support, $etat, $poids, $image, $category)
    {
        $pdo = configu::getConnexion();
    
        try {
            $query = $pdo->prepare("INSERT INTO piecedoeuvre (titre, proprietaire, description, prix, support, etat, poids, image, category) VALUES (:titre, :proprietaire, :description, :prix, :support, :etat, :poids, :image, :category)");
            $query->bindParam(':titre', $titre);
            $query->bindParam(':proprietaire', $proprietaire);
            $query->bindParam(':description', $description);
            $query->bindParam(':prix', $prix);
            $query->bindParam(':support', $support);
            $query->bindParam(':etat', $etat);
            $query->bindParam(':poids', $poids);
            $query->bindParam(':image', $image);
            $query->bindParam(':category', $category);
    
            if ($query->execute()) {
                return true;
            } else {
                // Ajoutez des messages de débogage ici
                echo "Error executing insert query. Debug info: " . implode(" ", $query->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            // Ajoutez des messages de débogage ici
            echo "Error executing insert query. Exception: " . $e->getMessage();
            return false;
        }
    }

    public function showOeuvre($id_piece_doeuvre)
    {
        $sql = "SELECT * FROM piecedoeuvre WHERE id_piece_doeuvre = :id";
        $db = configu::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id_piece_doeuvre);
            $query->execute();
            $oeuvre = $query->fetch();
            return $oeuvre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateOeuvre($id_piece_doeuvre, $titre, $proprietaire, $description, $prix, $support, $etat, $poids, $image, $category)
    {
        $pdo = configu::getConnexion();

        try {
            $query = $pdo->prepare("UPDATE piecedoeuvre 
                                    SET titre = :titre, 
                                    proprietaire = :proprietaire, 
                                    description = :description, 
                                    prix = :prix, 
                                    support = :support, 
                                    etat = :etat, 
                                    poids = :poids, 
                                    image = :image, 
                                    category = :category 
                                    WHERE id_piece_doeuvre = :id");

            $query->bindParam(':id', $id_piece_doeuvre);
            $query->bindParam(':titre', $titre);
            $query->bindParam(':proprietaire', $proprietaire);
            $query->bindParam(':description', $description);
            $query->bindParam(':prix', $prix);
            $query->bindParam(':support', $support);
            $query->bindParam(':etat', $etat);
            $query->bindParam(':poids', $poids);
            $query->bindParam(':image', $image);
            $query->bindParam(':category', $category);

            $query->execute();

            return "Oeuvre details updated successfully";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
