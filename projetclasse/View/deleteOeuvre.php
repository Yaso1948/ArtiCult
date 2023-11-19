<?php
if (isset($_GET['id'])) {
    // Sanitize input
    $id_piece_doeuvre = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    require_once '../controller/oeuvreC.php';

    $oeuvrecontroller = new oeuvreC();

    if ($oeuvrecontroller->deleteoeuvre($id_piece_doeuvre)) {
        // Redirect on success
        header("Location: listeoeuvre.php"); 
        exit();
    } else {
        // Display an error message
        echo "Error";
    }
}else {
    echo "art ID not specified.";
    exit(); // Exit to avoid further execution
}
?>
