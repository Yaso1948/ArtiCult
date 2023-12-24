<?php

require '../configs.php';

class CommandeC
{
    public function listCommandes()
    {
        $sql = "SELECT * FROM commande";

        $db = configs::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCommande($id_cmd)
    {
        $sql = "DELETE FROM commande WHERE id_cmd = :id_cmd";
        $db = configs::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_cmd', $id_cmd);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addCommande($commande)
    {
        $sql = "INSERT INTO commande  
                VALUES (NULL, :description, :prix_total, :nbr_article)";
        $db = configs::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'prix_total' => $commande->getPrixTotal(),
                'description' => $commande->getDesc(),
                'nbr_article' => $commande->getNbrArticle(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showCommande($id_cmd)
    {
        $sql = "SELECT * FROM commande WHERE id_cmd = :id_cmd";
        $db = configs::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_cmd', $id_cmd);
            $query->execute();
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    
    function updateCommande($commande, $id_cmd)
{
    try {
        $db = configs::getConnexion();
        $query = $db->prepare(
            'UPDATE commande SET 
                prix_total = :prix_total, 
                description = :description, 
                nbr_article = :nbr_article
            WHERE id_cmd = :id_cmd'
        );

        $query->execute([
            'id_cmd' => $id_cmd,
            'prix_total' => $commande->getPrixTotal(),
            'description' => $commande->getDescription(),
            'nbr_article' => $commande->getNbrArticle(),
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    private function sanitize($value)
    {
        // Ajoutez ici la logique pour échapper les valeurs si nécessaire
        return $value;
    }
}
?>
