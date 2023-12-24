<?php

require_once 'C:\xampp\htdocs\backend\config.php';

class ImageC
{

    public function listImages()
    {
        $sql = "SELECT * FROM image";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) { 
            die('Error:' . $e->getMessage());
        }
    }

    function deleteImage($ide)
    {
        $sql = "DELETE FROM image WHERE idImage = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addImage($image)
    {
        $sql = "INSERT INTO image (titre,portrait,idGalerie) 
        VALUES (:titre,:portrait,:idGalerie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $image->getTitre(),
                'portrait' => $image->getPortrait(),
                'idGalerie' => $image->getIdGalerie(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function checkIdGalerieExists($idGalerie) {
      
        $sql = "SELECT COUNT(*) as total FROM galerie WHERE idGalerie = :id";
        $conn = config::getConnexion();
        try {
    
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $idGalerie, PDO::PARAM_INT);
    
            // Execute statement
            $query->execute();
    
            // Store the result
            $result = $query->fetch();
    
            // Check if idGalerie exists
            if ($result['total'] > 0) {
                return true;
            } else {
                return false;
            }
    
        }
        catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
}
    
    function showImage($id)
    {
        $sql = "SELECT * from image where idImage = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $image = $query->fetch();
            return $image;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateImage($image, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE image SET 
                    titre = :titre, 
                    portrait = :portrait, 
                    idGalerie= :idGalerie
                WHERE idImage= :id'
            );
            
            $query->execute([
                'id' => $id,
                'titre' => $image->getTitre(),
                'portrait' => $image->getPortrait(),
                'idGalerie' => $image->getIdGalerie(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}