<?php 
    include '../Model/utilisateur.php';
    include '../Controller/utilisateurC.php';

    $utilisateur = NULL;
    $utilisateurc = new utilisateurC() ;
            
            
            $h_p = $_POST['password'];
            $h_p_c = $_POST['confirm_password'];
            if($h_p == $h_p_c){
            $algorithm = 'sha512';
            $hash = hash($algorithm, $h_p);
            
            $utilisateur = new utilisateur(
                $_SESSION['id_utilisateur'],
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $hash, 
                $_POST['radiox'],
                $_POST['adress'],               
            );
            $utilisateurc->update_utilisateur($utilisateur,$utilisateur->getid_utilisateur());
            echo "<script>alert('account updated')</script>";
            header('Location:../index.php');
            }
            else{
                echo "<script>alert('password confirmation at fault or role unconfirmed')</script>";
                header('Location:update_user.php');}
            
    ?>