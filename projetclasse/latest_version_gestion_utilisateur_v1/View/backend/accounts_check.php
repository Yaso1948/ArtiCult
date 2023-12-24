<?php
    session_start();
    include('controller/utilisateurC.php');
    include('model/utilisateur.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $utilisateurc = new utilisateurC();
        if (isset($_POST['update'])) {
            $h_p = $_POST['password'];
            $algorithm = 'sha512';
            $hash = hash($algorithm, $h_p);
            $utilisateur = new utilisateur(
                $_POST['cid'],
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $hash, 
                $_POST['radiox'],
                $_POST['adress'],               
            );
            $utilisateurc->update_utilisateur_backoffice($utilisateur,$utilisateur->getid_utilisateur());
            if($_POST['cid']==$_SESSION['id_utilisateur']){
                $_SESSION['nom'] = $_POST['nom'];
                $_SESSION['prenom'] = $_POST['prenom'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['rol'] = $_POST['radiox'];
                $_SESSION['adress'] = $_POST['adress'];
            }

        }
        if (isset($_POST['delete'])) {
            $submitted_id = intval($_POST['cid2']);
            // Code to execute when the button is clicked
            $utilisateurc->deleteutilisateur($submitted_id);
            if($submitted_id == $_SESSION['id_utilisateur']){
                session_unset();
                session_destroy();
            }
        }
        header('Location:accounts.php');
    }


    ?>