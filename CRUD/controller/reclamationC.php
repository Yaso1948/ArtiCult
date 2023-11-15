<?php

require '../config.php';

class reclamationC
{

    public function listreclamation()
    {
        $sql = "SELECT * FROM CRUD";

        $db = config::getConnexion();//pdo
        try {
            $liste = $db->query($sql);//table des joueurs
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletereclamation($id_rec)
    {
        $sql = "DELETE FROM CRUD WHERE id_reclamation = :id_rec";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rec', $id_rec);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function addreclamation($id_rec, $titre, $description, $date_reclamation)
    {
        $pdo = config::getConnexion();

        try {
            $query = $pdo->prepare("INSERT INTO CRUD (id_rec,titre,description,date_reclamation) VALUES (:id_rec,:titre,:description,:date_reclamation)");
            $query->bindParam(':titre', $titre);
            $query->bindParam(':id_rec', $id_rec);
            $query->bindParam(':description', $description);
            $query->bindParam(':date_reclamation', $date_reclamation);
            
            return $query->execute();
        } catch (PDOException $e) {
     
            return false;
        }
    }


    function showreclamation($id_rec)
    {
        $sql = "SELECT * from CRUD where id_rec = $id_rec";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatereclamation($CRUD, $id_rec)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE CRUD SET 
                    id_rec = :id_rec, 
                    titre = :titre, 
                    description = :description, 
                    date_reclamation = :date_reclamation
                WHERE id_rec= :id_rec'
            );
            
            $query->execute([
                'id_rec' => $id_rec,
                'titre' => $CRUD->gettitre(),
                'description' => $CRUD->getdescription(),
                'date_reclamation' => $CRUD->getEmail(),
            
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
