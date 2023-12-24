<!-- view_oeuvre.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue de l'Œuvre</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <?php
    // Include necessary files and classes
    require_once('../controller/categorieC.php');

    // Instantiate the CategorieC class
    $controller = new CategorieC();

    // Check if the ID parameter is set in the URL
    if (isset($_GET['id'])) {
        $id_piece_doeuvre = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // Retrieve information about the specific piece of artwork
        $oeuvre = $controller->getOeuvreById($id_piece_doeuvre);

        if ($oeuvre) {
            echo "<div>";
            echo "<img src='" . htmlspecialchars($oeuvre['image']) . "' alt='Image de l'œuvre' width='400'><br>";
            echo "<div>";
            echo "<h2>" . htmlspecialchars($oeuvre['titre']) . "</h2>";
            echo "<p>Propriétaire: " . htmlspecialchars($oeuvre['proprietaire']) . "</p>";
            echo "<p>État: " . htmlspecialchars($oeuvre['etat']) . "</p>";
            echo "<p>Description: " . htmlspecialchars($oeuvre['description']) . "</p>";
            echo "<p>Prix: " . htmlspecialchars($oeuvre['prix']) . "</p>";
            echo "<button onclick='commander(" . $oeuvre['id_piece_doeuvre'] . ")'>Commander</button>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Œuvre non trouvée.</p>";
        }
    } else {
        echo "<p>Identifiant de l'œuvre non spécifié.</p>";
    }
    ?>

    <script>
        function commander(id_piece_doeuvre) {
            // You can add logic here to handle the ordering process
            alert("Commande de l'œuvre avec l'ID " + id_piece_doeuvre + " effectuée !");
        }
    </script>
</body>
</html>
