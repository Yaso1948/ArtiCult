<?php
include('C:/xampp/htdocs/projetclasse/latest_version_gestion_utilisateur_v1/View/backend/controller/GalerieC.php');

        // Code to delete the record goes here
        $clientC = new GalerieC();
        $clientC->deleteGalerie($_GET["id"]);
        header('Location:listGaleries.php');
?>