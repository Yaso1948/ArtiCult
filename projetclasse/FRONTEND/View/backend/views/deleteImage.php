<?php
include '../Controller/ImageC.php';

        // Code to delete the record goes here
        $clientC = new ImageC();
        $clientC->deleteImage($_GET["id"]);
        header('Location:listImages.php');
