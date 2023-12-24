<?php
include '../Controller/GalerieC.php';

        // Code to delete the record goes here
        $clientC = new GalerieC();
        $clientC->deleteGalerie($_GET["id"]);
        header('Location:listGaleries.php');
