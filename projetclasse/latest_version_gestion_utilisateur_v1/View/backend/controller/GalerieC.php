<?php

include('configu.php');// configu shows the work of gallery, /configu shows images
class GalerieC
{

    public function listGaleries()
    {
        $sql = "SELECT * FROM galerie";

        $db = configu::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteGalerie($ide)
    {
        $sql = "DELETE FROM galerie WHERE idGalerie = :id";
        $db = configu::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addGalerie($galerie)
    {
        $sql = "INSERT INTO galerie (nom,email,tel,horaires) 
        VALUES (:nom,:email, :tel,:horaires)";
        $db = configu::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $galerie->getNom(),
                'email' => $galerie->getEmail(),
                'tel' => $galerie->getTel(),
                'horaires' => $galerie->getHoraires(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showGalerie($id)
    {
        $sql = "SELECT * from galerie where idGalerie = $id";
        $db = configu::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $galerie = $query->fetch();
            return $galerie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateGalerie($galerie, $id)
    {   
        try {
            $db = configu::getConnexion();
            $query = $db->prepare(
                'UPDATE galerie SET 
                    nom = :nom, 
                    email = :email, 
                    tel = :tel, 
                    horaires = :horaires
                WHERE idGalerie= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $galerie->getNom(),
                'email' => $galerie->getEmail(),
                'tel' => $galerie->getTel(),
                'horaires' => $galerie->getHoraires(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function afficherImages($id)
    { 
        try {
        $pdo = configu::getConnexion();
        $query = $pdo->prepare("SELECT * FROM image WHERE idGalerie = :id");
        $query->execute(['id' => $id]);
        return $query->fetchAll();
        } catch (PDOException $e) {
        echo $e->getMessage();
    
        }
    
    }
    function afficherGaleries()
    {
        $db = configu::getConnexion();
        $sql ="SELECT * FROM galerie";
        try{
            $liste = $db ->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
     }

 }





