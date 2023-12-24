<?php 
include '../config.php';
session_start();

class utilisateurC{
function add_utilisateur($utilisateur)
{
    $sql = "INSERT INTO utilisateurs  
    VALUES (null, :nom,:prenom, :email,:pass,:rol,:adress)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'email' => $utilisateur->getEmail(),
            'pass' => $utilisateur->getpass(),
            'rol' => $utilisateur->getrol(),
            'adress' => $utilisateur->getadress()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
function listutilisateurs(){
    try{
    $query = (config::getConnexion())->prepare('SELECT * FROM utilisateurs');
    $query->execute();
    $result= $query->fetchALL();
    }
    catch(PDOException $e){
        $e->getMessage();
    }
    echo "<h1>Liste d'utilisateurs:</h1><br><table><tr>
            <th>id_utilisateur</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>email</th>
            <th>role</th>
            <th>Adresse</th>
            </tr>";
            
    foreach($result as $row){
        echo "<tr>
                <td>" . $row['id_utilisateur'] . "</td><td>" . $row['nom'] . "</td> <td>" . $row['prenom'] . "</td> <td>" . $row['email'] . "</td> <td>" . $row['rol'] . "</td> </td>" . "</td> <td>" . $row['adress'] ."</td>";
    }
    echo "</table>";
}
function deleteutilisateur($submitted_id)
{
    $sql = "DELETE FROM utilisateurs
    WHERE id_utilisateur = :submitted_id;";
    $db = config::getConnexion();
    $req = $db->prepare($sql);

    try {
        $req->execute(['submitted_id' => $submitted_id]);
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
function update_utilisateur($utilisateur, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateurs SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    email = :email,
                    pass = :pass,
                    rol = :rol,
                    adress = :adress
                WHERE id_utilisateur= :id'
            );
            
            $query->execute([
                'id' => $id,            
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'email' => $utilisateur->getEmail(),
                'pass' => $utilisateur->getpass(),
                'rol' => $utilisateur->getrol(),
                'adress' => $utilisateur->getadress()
            ]);
            
            $_SESSION['nom'] = $utilisateur->getNom();
            $_SESSION['prenom'] = $utilisateur->getPrenom();
            $_SESSION['email'] = $utilisateur->getEmail();
            $_SESSION['adress'] = $utilisateur->getadress();
            $_SESSION['id_utilisateur'] = $utilisateur->getid_utilisateur();

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
function authentification_utilisateur($utilisateur,$submitted_pass){
    session_start();
    $sql="SELECT * FROM utilisateurs WHERE email = :email AND pass = :p";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindParam(":p", $submitted_pass);
        $query->bindParam(":email", $utilisateur->getEmail());
        $query->execute();
        $result = $query->fetch();
        if($result){
            $_SESSION['id_utilisateur'] = $result['id_utilisateur'];
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
            $_SESSION['rol'] = $result['rol'];
            $_SESSION['adress'] = $result['adress'];
            header('Location:../index.php');
            return true;
        }
        else{
                echo "<script>alert('the data input does is not registered beforehand');</script>";
                header('Location:../View/sign-up.php');
                
        }
    } catch (Exception $e){echo 'Error: ' . $e->getMessage();}
}
function authentification_utilisateur_delte($utilisateur,$submitted_pass){
    $sql="SELECT * FROM utilisateurs WHERE email = :email AND pass = :p";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindParam(":p", $submitted_pass);
        $query->bindParam(":email", $utilisateur->getEmail());
        $query->execute();
        $result = $query->fetch();
        if($result){
            $utilisateurC = new utilisateurC();
            $utilisateurC->deleteutilisateur($_SESSION['id_utilisateur']);
            session_unset();
            session_destroy();
            header('Location:../index.php');
        }
        else{
                echo "<p>the data input is not registered beforehand</p>";
                header('Location:../View/sign-up.php');
                
        }
    } catch (Exception $e){echo 'Error: ' . $e->getMessage();}
}
function authentification_utilisateur_logout($utilisateur,$submitted_pass){
    session_start();
    $sql="SELECT * FROM utilisateurs WHERE email = :email AND pass = :p";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindParam(":p", $submitted_pass);
        $query->bindParam(":email", $utilisateur->getEmail());
        $query->execute();
        $result = $query->fetch();
        if($result){
            session_unset();
            session_destroy();
            header('Location:../index.php');
        }
        else{
                echo "<script>alert('the data input is not registered beforehand');</script>";
                header('Location:../View/sign-up.php');
                
        }
    } catch (Exception $e){echo 'Error: ' . $e->getMessage();}
}
function AC_email($email) {
    session_start(); 
    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(":email", $email);
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            
            $code = mt_rand(100000, 999999);
            $_SESSION['reset_code'] = $code;
            //$to = $email;
            //$subject = "User verfification";
            //$headers = "MIME-Version: 1.0\r\n";
            //$headers .= "From: nadm4541@gmail.com\r\n";
            //$headers .= "Reply-To: nadm4541@gmail.com\r\n";
            //$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
           //$message ="Verification code : $code";
           //$name = "Articult";
           //$sent = mail($to, $subject, $message, $headers);
           //if(!$sent){
            //echo "Error: Message not sent. Please try again";
         //}else{
           // echo "Message was sent successfully";
         //}
        //} else {
        } 
            header('Location: CBA.php');
            echo "<p>email non existent</p>";
            
            exit; // Ensure no further code is executed after the redirection
        
    } catch (Exception $e) {
        // Log the error instead of displaying it to the user
        error_log('Error in AC_email: ' . $e->getMessage());

        // Display a generic error message to the user
        echo "<script>alert('An error occurred. Please try again later.')</script>";
        header('Location: CBA.php');
        exit; // Ensure no further code is executed after the redirection
    }
}

}



?>