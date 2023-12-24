<?php
include ('../Controller/utilisateurC.php');
include ('../Model/utilisateur.php');
$utilisateurC = new utilisateurC();
$utilisateur = new utilisateur(null,null,null,null,null,null,null);
$utilisateur->setEmail($_POST['email']);
$p=$_POST['password'];
$hashed_key = hash('sha512', $p);
$utilisateurC->authentification_utilisateur_logout($utilisateur,$hashed_key);
?>