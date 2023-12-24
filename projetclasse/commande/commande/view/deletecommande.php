<link rel="stylesheet" href="path/to/style.css">
<?php
include '../Controller/commandeC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["search"])) {
    // Check if the 'id' parameter is set in the form submission
    if (isset($_POST["id"])) {
        // Create an instance of the commandeC class
        $commandeC = new commandeC();

        // Call the deletecommande method with the provided ID
        $commandeC->deletecommande($_POST["id"]);

        // Redirect to the current page after deleting the command
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // Handle the case where the 'id' parameter is not set
        $error = "Invalid request. Please provide an ID.";
    }
}
?>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Commande</title>

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
<button onclick="window.location.href='listcommande.php';">retour à la liste</button>
    <hr>

    <center><h2>Delete Commande</h2><center>

    <center><form action="deletecommande.php" method="POST"><center>
        <label for="id">ID de la commande à supprimer:</label>
        <input type="text" name="id" required>
        <input type="submit" name="search"  value="Rechercher et Supprimer">
    </form>

    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
</body>

</html>