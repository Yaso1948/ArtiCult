<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- Styles CSS ici -->
</head>
<body>
    <h1>Bienvenue sur notre Galerie d'Art</h1>

    <h2>Catégories</h2>
    <ul>
        <?php
        require_once('../controller/categorieC.php');
        $controller = new CategorieC();
        $categories = $controller->listCategories();

        foreach ($categories as $categorie) {
            echo "<li>";
            echo "ID: " . htmlspecialchars($categorie['id_categorie']) . "<br>";
            echo "Type d'œuvre: " . (isset($categorie['type_oeuvre']) ? htmlspecialchars($categorie['type_oeuvre']) : '') . "<br>";

            // Link to view pieces in the category, passing the category ID
            echo "<a href='pieces_par_categorie.php?id=" . htmlspecialchars($categorie['id_categorie']) . "'>Voir les pièces</a>";

            echo "</li>";
            echo "<br>";
        }
        ?>
    </ul>

    <h2>Toutes les Œuvres</h2>
    <?php
    // Retrieve all pieces of artwork
    $pieces = $controller->getAllPieces();

    // Display images and titles of all pieces
    foreach ($pieces as $piece) {
        echo "<div>";
        echo "<h3>" . htmlspecialchars($piece['titre']) . "</h3>";
        echo "<img src='" . htmlspecialchars($piece['image']) . "' alt='Image de l'œuvre' width='100'><br>";
        // Display other information about the piece if needed
        echo "</div>";
        echo "<br>";
    }
    ?>
</body>
</html>
