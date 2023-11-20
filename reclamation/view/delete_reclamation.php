<?php
include '../Controller/reclamationC.php';
$clientC = new reclamationC();
$clientC->deletereclamation($_GET["id_rec"]);
header('Location:listreclamation.php');//redirection de la route