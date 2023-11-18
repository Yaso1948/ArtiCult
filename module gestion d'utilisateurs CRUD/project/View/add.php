<?php 
    include '../Controller/utilisateurC.php';
    include '../Model/utilisateur.php';
    config::getconnexion();
    $utilisateur = NULL;
    $utilisateurc = new utilisateurC() ;
            
            
            $h_p = $_POST['password'];
            $h_p_c = $_POST['confirm_password'];
            if(($h_p == $h_p_c)&&(isset($_POST["radiox"]))){
            $algorithm = 'sha512';
            $hash = hash($algorithm, $h_p);
            $utilisateur = new utilisateur(
                null,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $hash, 
                $_POST['radiox'],
                $_POST['adress'],
                
                           
            );
            $utilisateurc->add_utilisateur($utilisateur);
            header('Location:../index.html');
            }
            else{
                echo "<script>alert('password confirmation at fault or role unconfirmed')</script>";
                include "sign-up.php";
            }
        
    ?>