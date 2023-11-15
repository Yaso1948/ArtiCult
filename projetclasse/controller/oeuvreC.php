<?php
require_once('../config.php');

class oeuvreC
{
    public function listoeuvre()
    {
        $pdo = config::getConnexion();

        $query = $pdo->query('SELECT * FROM piecedoeuvre');
        $oeuvre = $query->fetchAll();

        return $oeuvre;
    }
    public function deleteoeuvre($id_piece_doeuvre)
    {
        $pdo = config::getConnexion();

        try {
            $query = $pdo->prepare("DELETE FROM piecedoeuvre WHERE ID = :id");
            $query->bindParam(':id', $id_piece_doeuvre);
            return $query->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    public function addoeuvre($titre, $proprietaire, $description, $prix, $support, $etat, $poids, $image)
    {
        $pdo = config::getConnexion();

        try {
            $query = $pdo->prepare("INSERT INTO piecedoeuvre (Name, Size, Activity_Area, Country, Phone, Postal_Code, Full_Address, Website, LinkedIn, Facebook) VALUES (:name, :size, :activityArea, :country, :phone, :postalCode, :fullAddress, :website, :linkedIn, :facebook)");
            $query->bindParam(':titre', $titre);
            $query->bindParam(':proprietaire', $proprietaire);
            $query->bindParam(':description', $description);
            $query->bindParam(':prix', $prix);
            $query->bindParam(': support',  $support);
            $query->bindParam(':etat', $etat);
            $query->bindParam(':poids', $poids);
            $query->bindParam(':image', $image);
            

            return $query->execute();
        } catch (PDOException $e) {
     
            return false;
        }
    }
   public function showoeuvre($id_piece_doeuvre)
    {
        $sql = "SELECT * from piecedoeuvre where id_piece_doeuvre =$id_piece_doeuvre";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $oeuvre = $query->fetch();
            return $oeuvre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function updateoeuvre($id_piece_doeuvre,$titre, $proprietaire, $description, $prix, $support, $etat, $poids, $image) {
        $pdo = config::getConnexion();
    
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
                                    WHERE ID = :id");
    
            $query->bindParam(':id_piece_doeuvre', $id_piece_doeuvre);
            $query->bindParam(':titre', $titre);
            $query->bindParam(':proprietaire', $proprietaire);
            $query->bindParam(':description', $description);
            $query->bindParam(':prix', $prix);
            $query->bindParam(': support',  $support);
            $query->bindParam(':etat', $etat);
            $query->bindParam(':poids', $poids);
            $query->bindParam(':image', $image);
    
            $query->execute();
    
            // Optionally, you can return a success message or handle the response as needed
            return "oeuvre details updated successfully";
        } catch (PDOException $e) {
            // Handle exception or errors appropriately
            return "Error: " . $e->getMessage();
        }
    }
    
}
?>
