<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie</title>
    <!-- Styles CSS ici -->
</head>
<body>
    <h1>Oeuvres par Catégorie</h1>

    <?php
    require_once 'controller/piecedoeuvreC.php';

    if (isset($_GET['id'])) {
        $id_categorie = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $oeuvreController = new piecedoeuvreC();
        $oeuvres = $oeuvreController->listOeuvreByCategory($id_categorie);

        if ($oeuvres) {
            foreach ($oeuvres as $oeuvre) {
                echo "<div>";
                echo "<h2>" . $oeuvre['titre'] . "</h2>";
                echo "<p>Propriétaire: " . $oeuvre['proprietaire'] . "</p>";
                echo "<p>Description: " . $oeuvre['description'] . "</p>";
                // Afficher d'autres détails si nécessaire
                echo "</div>";
            }
        } else {
            echo "<p>Aucune œuvre trouvée dans cette catégorie.</p>";
        }
    } else {
        echo "<p>Catégorie non spécifiée.</p>";
    }
    ?>

    <p><a href="index.php">Retour à l'accueil</a></p>
</body>
</html>
