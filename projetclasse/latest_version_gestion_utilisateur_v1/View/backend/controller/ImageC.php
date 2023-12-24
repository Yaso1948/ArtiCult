<?php

include('configu.php');
class ImageC
{

    public function listImages()
    {
        $sql = "SELECT * FROM image";

        $db = configu::getConnexion();
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
        $db = configu::getConnexion();
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
        $db = configu::getConnexion();
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
        $conn = configu::getConnexion();
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
        $db = configu::getConnexion();
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
            $db = configu::getConnexion();
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
            
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}?>