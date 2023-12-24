<link rel="stylesheet" href="path/to/style.css">
<?php
include '../Controller/commandec.php';
include '../Model/Commande.php';

$error = "";

// create an instance of the controller
$commandeC = new CommandeC();


// Handle form submission to update a command
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["prix-total"]) &&
        isset($_POST["description"]) &&
        isset($_POST["nbr_article"]) &&
        isset($_POST["id_cmd"])
    ) {
        $id_cmd = $_POST['id_cmd'];
        $prix_total = $_POST['prix-total'];
        $description = $_POST['description'];
        $nbr_article = $_POST['nbr_article'];

        // Instantiate the Commande class
        $commande = new Commande($id_cmd, $prix_total, $description, $nbr_article);

        try {
            // Use prepared statements to prevent SQL injection
            $commandeC->updateCommande($commande, $id_cmd);
            $success = "Commande updated successfully!";
        } catch (Exception $e) {
            $error = "Error updating commande: " . $e->getMessage();
        }
    } else {
        $error = "Missing information";
    }
}

// Get the list of commands
$commandes = $commandeC->listCommandes();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Display</title>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
   
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <!-- Display the list of commands -->
    <h2>Liste des commandes</h2>
    <table border="0">
        <tr>
            <th>ID Commande</th>
            <th>Prix Total</th>
            <th>Description</th>
            <th>Nombre d'Articles</th>
            <th>Action</th>
        </tr>
        <?php foreach ($commandes as $commande) { ?>
            <tr>
                <td><?= $commande['id_cmd']; ?></td>
                <td><?= $commande['prix_total']; ?></td>
                <td><?= $commande['description']; ?></td>
                <td><?= $commande['nbr_article']; ?></td>
                
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id_cmd" value="<?= $commande['id_cmd']; ?>">
                        <input type="text" name="prix-total" value="<?= $commande['prix_total']; ?>" />
                        <input type="text" name="description" value="<?= $commande['description']; ?>" />
                        <input type="text" name="nbr_article" value="<?= $commande['nbr_article']; ?>" />
                        <input type="submit" value="Save">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <center><button onclick="window.location.href='listcommande.php';">Back to list</button></center>
</body>

</html>





