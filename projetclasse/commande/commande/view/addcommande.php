<?php
require '../configs.php'; // Assuming you have this file with the configs class

class CommandeC
{

    public function listCommandes()
    {
        $sql = "SELECT * FROM commande";

        $db = configs::getConnexion(); // pdo
        try {
            $liste = $db->query($sql); // table des commandes
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($id_cmd)
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

    function addCommande($commande)
    {
        $sql = "INSERT INTO commande  
        VALUES (NULL,  :description,:prix_total, :nbr_articles)";
        $db = configs::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'prix_total' => $commande['prix_total'],
                'description' => $commande['description'],
                'nbr_articles' => $commande['nbr_articles'],
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showCommande($id_cmd)
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
                nbr_articles = :nbr_articles
            WHERE id_cmd = :id_cmd'
            );

            $query->execute([
                'id_cmd' => $id_cmd,
                'prix_total' => $commande['prix_total'],
                'description' => $commande['description'],
                'nbr_articles' => $commande['nbr_articles'],
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

// Handle form submission to add a new command
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["ajouter_commande"])) {
    // Validate and process the form data
    $prix_total = $_POST['prix_total'];
    $description = $_POST['description'];
    $nbr_articles = $_POST['nbr_articles'];

    // Check if all required fields are filled
    if (!empty($prix_total) && !empty($description) && !empty($nbr_articles)) {
        // Create an associative array with the new command data
        $newCommande = array(
            'prix_total' => $prix_total,
            'description' => $description,
            'nbr_articles' => $nbr_articles
        );

        // Create an instance of the CommandeC class
        $commandeC = new CommandeC();

        // Add the new command to the database
        $commandeC->addCommande($newCommande);

        // Redirect to the current page with a success message
        header('Location: ' . $_SERVER['PHP_SELF'] . '?success=Commande ajoutée avec succès');
        exit();
    } else {
        $error = "Please fill in all the required fields.";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Commande</title>

    <style>
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('blanc.avif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(5px);
            z-index: -1;
        }

        table {
            margin-top: 20px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
        }

        table,
        th,
        td {

            border-collapse: collapse;
            border-radius: 10px;
            /* Ajout d'une bordure arrondie */
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 2px solid black;
            /* Ajout d'une bordure solide */
        }

        th {
            background-color: #f2f2f2;
            /* Couleur de fond pour les cellules d'en-tête */
        }

        button {
            /* Ajoutez d'autres styles au besoin */
            background-color: black;
            /* Couleur de fond du bouton */
            color: white;
            /* Couleur du texte du bouton */
            padding: 10px 20px;
            /* Espacement du contenu du bouton */
            border: none;
            /* Supprime la bordure par défaut */
            cursor: pointer;
            /* Change le curseur au survol du bouton */
            transition: background-color 0.3s ease;
            /* Ajout d'une transition pour une animation en douceur */
        }

        button:hover {
            background-color: grey;
            /* Nouvelle couleur de fond au survol du bouton */
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            display: inline-block;
        }
    </style>



</head>

<body>
<div class="background-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
        crossorigin="anonymous">
    <button onclick="window.location.href='listcommande.php';">retour à la liste</button>
    <hr>

    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
<center>
    <h1>ajouter une commande</h1>
<form action="" method="POST">

    <label for="prix_total">Prix total :</label>
    <input type="text" name="prix_total" required><br>

    <label for="description">Description :</label>
    <textarea name="description" required></textarea><br>

    <label for="nbr_articles">Nombre d'articles :</label>
    <input type="number" name="nbr_articles" required><br>

    <input type="submit" name="ajouter_commande" value="Ajouter la commande">
    <p><font color="white">nb:l'id de votre commande est en incrementation automatique</font></p>
</form>
</center>
</body>

</html>