<?php
require_once "../controller/categorieC.php";
$categorieC = new CategorieC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category']) && isset($_POST['search'])) {
        $id_categorie = $_POST['category'];
        $list = $categorieC->listerCategories($id_categorie);
    }
}

$categorie = $categorieC->listerCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche categorie</title>
</head>
<body>
    <h1>Recherche d'oeuvre par categorie</h1>
    <form action="" method="POST">
        <label for="category">Sélectionnez une categorie : </label>
        <select name="category" id="category">
            <?php
            foreach ($categorie as $cat) {
                echo '<option value="' . $cat['id_categorie'] . '">' . $cat['1-tableau'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
</body>
</html>
