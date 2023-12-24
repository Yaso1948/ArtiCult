<?php
require_once('../controller/categorieC.php');
$controller = new CategorieC();

if (isset($_GET['id_categorie']) && isset($_GET['type_oeuvre'])) {
    $id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_SANITIZE_NUMBER_INT);
    $type_oeuvre = filter_input(INPUT_GET, 'type_oeuvre', FILTER_SANITIZE_STRING);

    if ($id_categorie !== false && $id_categorie !== null && $type_oeuvre !== false && $type_oeuvre !== null) {
        // Retrieve pieces by type and category
        $pieces = $controller->getPiecesByTypeAndCategory($type_oeuvre, $id_categorie);

        // Display the id_piece_doeuvre of the retrieved pieces
        foreach ($pieces as $piece) {
            echo "ID: " . htmlspecialchars($piece['id_piece_doeuvre']) . "<br>";
        }
    } else {
        // Invalid category ID or type of work, handle the error
        echo "Invalid category ID or type of work.";
        exit();
    }
} else {
    // Parameters not specified, handle the error
    echo "Categorie ID or type of work not specified.";
}
?>
