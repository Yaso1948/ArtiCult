<?php
// Vérifie si l'ID de la pièce d'œuvre est passé en paramètre dans l'URL
if (isset($_POST['delete'])) {

    // Sanitise l'entrée pour éviter les attaques par injection
    $id_piece_doeuvre = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT);


if ($id_piece_doeuvre === false || $id_piece_doeuvre === null) {
    // Gestion de l'erreur si la validation échoue
    echo "Invalid ID format.";
    exit();
}

require_once '../controller/oeuvreC.php';

$oeuvrecontroller = new oeuvreC();

// Vérifie si la pièce d'œuvre a été supprimée avec succès
if ($oeuvrecontroller->deleteOeuvre($id_piece_doeuvre)) {
    // Redirige en cas de succès
    header("Location: listeoeuvre.php"); 
    exit();
} else {
    // Affiche un message d'erreur en cas d'échec de la suppression
    echo "Error deleting the art piece. Debug info: " . $oeuvrecontroller->getLastError();
}

} else {
    // Affiche un message si l'ID de l'œuvre n'est pas spécifié
    echo "Art ID not specified.";
    exit(); // Arrête l'exécution pour éviter toute autre exécution
}
?>