<?php
    include('C:/xampp/htdocs/trial_3/latest_version_gestion_utilisateur_v1-20231209T173456Z-001/latest_version_gestion_utilisateur_v1/View/backend/controller/utilisateurC.php');
    include('C:/xampp/htdocs/trial_3/latest_version_gestion_utilisateur_v1-20231209T173456Z-001/latest_version_gestion_utilisateur_v1/View/backend/model/utilisateur.php');
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
        }
        if (isset($_POST['delete'])) {
            $submitted_id = intval($_POST['cid2']);
            // Code to execute when the button is clicked
            $utilisateurc->deleteutilisateur($submitted_id);
        }
    }


    ?>