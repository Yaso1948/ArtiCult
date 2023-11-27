<?php
include '../Controller/commentaireC.php';
$clientC = new commentaireC();
$clientC->deleteCommentaire($_GET["id_commentaire"]);
header('Location:list_Commentaire.php');