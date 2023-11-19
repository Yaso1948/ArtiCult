<?php
require_once('../config.php');

class categorieC
{
    public function affichercategorie($id_categorie)
    {
         try {
            $pdo = config::getConnexion();
            $query= $pdo->prepare("SELECT * FROM piecedoeuvre WHERE category =:id");
            $query->execute(['id' => $id_categorie]);
            return $query->fetchAll();
        } catch (POOException e) {
            echo $e->getMessage();
        }
    
    }
    public function affichercategorie() {
        try{
            $pdo config::getConnexion();
         $query=$pdo->prepare("SELECT FROM category"); 
        $query->execute(); 
        return $query->fetchAll();
        }
        catch (PDOException Se) {
        
         echo $e->getMessage();
        }
    }
    

}
?>