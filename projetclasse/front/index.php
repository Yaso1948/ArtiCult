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
    echo "<tr>";
    echo "<td>" . htmlspecialchars($categorie['id_categorie']) . "</td>";
    echo "<td>" . (isset($categorie['nom']) ? htmlspecialchars($categorie['nom']) : '') . "</td>";
    echo "<td>" . (isset($categorie['type_oeuvre']) ? htmlspecialchars($categorie['type_oeuvre']) : '') . "</td>";

    // Le lien pointe vers pieces_par_categorie.php sans spécifier l'id_category
    echo "<td><a href='pieces_par_categorie.php'>Voir les pièces</a></td>";

    echo "</tr>";
    echo "<br>";
}
?>


    </ul>
</body>
</html>
