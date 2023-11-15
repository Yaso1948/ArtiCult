<?php
if (isset($_GET['id'])) {
    $id_piece_doeuvre = $_GET['id'];
    
    require_once '../Controller/oeuvreC.php';

    $ooeuvrecontroller = new oeuvreC();

    if ($oeuvrecontroller->deleteoeuvre($id_piece_doeuvre)) {
        header("Location: listeoeuvre.php"); 
        exit();
    } else {
        echo "Error deleting the art.";
    }
} else {
    echo "art ID not specified.";
}
?>
