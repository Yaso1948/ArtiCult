

<?php
require_once('../controller/categorieC.php');
$controller = new CategorieC();

if (isset($_GET['id_category'])) {
    $id_category = filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT);

    if ($id_category !== false && $id_category !== null) {
        $pieces = $controller->getPiecesByCategoryId($id_category);
    } else {
        echo "Invalid category ID.";
        exit();
    }
} else {
    // Si id_category n'est pas spécifié, récupérez toutes les pièces d'œuvre
    $pieces = $controller->getAllPieces();
}

// Affichez les pièces d'œuvre ici
foreach ($pieces as $piece) {
    echo "ID: " . htmlspecialchars($piece['id_piece_doeuvre']) . "<br>";
    // ... affichez d'autres informations sur la pièce d'œuvre
    echo "<br>";
}
?>
