<?php 
    include '../Controller/utilisateurC.php';
    include '../Model/utilisateur.php';
    $utilisateur = new utilisateur(null,null,null,null,null,null,null);
    $utilisateurc = new utilisateurC();
    $e=$_POST['email'];
    $p=$_POST['password'];
    $hashed_key = hash('sha512', $p);
    $utilisateur->setEmail($e);
    $utilisateurc->authentification_utilisateur($utilisateur,$hashed_key);
    
    
    ?>