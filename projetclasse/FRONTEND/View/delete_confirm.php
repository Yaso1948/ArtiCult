<?php 
    
    include('C:/xampp/htdocs/projetclasse/FRONTEND/View/backend/model/utilisateur.php');
    include('C:/xampp/htdocs/projetclasse/FRONTEND/View/backend/controller/utilisateurC.php');
    $utilisateurc = new utilisateurC();
    $utilisateur = new utilisateur(null,null,null,null,null,null,null);
    $e=$_POST['email'];
    $p=$_POST['password'];
    $hashed_key = hash('sha512', $p);
    $utilisateur->setEmail($e);
    $utilisateurc->authentification_utilisateur_delte($utilisateur,$hashed_key);
?>