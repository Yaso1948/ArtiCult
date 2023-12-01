<?php 
include '../config.php';

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
            <th>password</th>
            <th>role</th>
            <th>Adresse</th>
            </tr>";
            
    foreach($result as $row){
        echo "<tr>
                <td>" . $row['id_utilisateur'] . "</td><td>" . $row['nom'] . "</td> <td>" . $row['prenom'] . "</td> <td>" . $row['email'] . "</td> <td>" . $row['pass'] . "</td> <td>" . $row['rol'] ."</td> <td> ". $row['adress'] ."</td> </tr>";
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
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
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
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
            $_SESSION['rol'] = $result['rol'];
            $_SESSION['adress'] = $result['adress'];
            header('Location:../index.php');
        }
        else{
                header('Location:../View/sign-up.php');
                
        }
    } catch (Exception $e){echo 'Error: ' . $e->getMessage();}
}
}


?>