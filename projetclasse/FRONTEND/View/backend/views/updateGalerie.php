<?php

include '../Controller/GalerieC.php';
include '../model/Galerie.php';
$error = "";

// create galerie
$galerie = null;
// create an instance of the controller
$galerieC = new GalerieC();

function isNumericPhone($phone){

    return preg_match('/^[0-9]+$/', $phone);

}

if (
    isset($_POST["nom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["horaires"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["email"]) && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) &&
        !empty($_POST["tel"]) && (isNumericPhone($_POST["tel"])) &&
        !empty($_POST["horaires"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $galerie = new Galerie(
            null,
            $_POST['nom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['horaires']
        );
        var_dump($galerie);
        
        $galerieC->updateGalerie($galerie, $_POST['idGalerie']);

        header('Location:listGaleries.php');
    } else
       // $error = "Tous les champs doivent être remplis";
       if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
       {

           //echo "L\'email est invalide.";
           echo '<div style="text-align:center;">';
           echo '<span style="color:red;">L\'email est invalide.</span>';
           echo '</div>';
       }
       if(!isNumericPhone($_POST["tel"]))
       {
       //echo "Le numéro de Téléphone est invalide (doit être numérique).";
           echo '<div style="text-align:center;">';
           echo '<span style="color:red;">Le numéro de téléphone doit être numérique.</span>';
           echo '</div>';    
       }
       if (
           empty($_POST['nom']) ||
           empty($_POST["email"]) ||
           empty($_POST["tel"]) ||
           empty($_POST["horaires"])
       ) {
           echo '<div style="text-align:center;">';
           echo '<span style="color:red;">Tous les champs doivent être remplis </span>';
           echo '</div>';}
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listGaleries.php">Back to list</a></button>
    <center>
        <h2 >Modification d'une Galerie</h2>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idGalerie'])) {
        $galerie = $galerieC->showGalerie($_POST['idGalerie']);
        
    ?>
    
        <form action="" method="POST">
            
            <table>
            <tr>
                    <td><label for="nom">IdGalerie :</label></td>
                    <td>
                        <input type="text" id="idGalerie" name="idGalerie" value="<?php echo $_POST['idGalerie'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $galerie['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $galerie['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="tel">Tel :</label></td>
                    <td>
                        <input type="text" id="tel" name="tel" value="<?php echo $galerie['tel'] ?>" />
                        <span id="erreurTel" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="horaires">Horaires :</label></td>
                    <td>
                        <input type="text" id="horaires" name="horaires" value="<?php echo $galerie['horaires'] ?>" />
                        <span id="erreurHoraires" style="color: red"></span>
                    </td>
                </tr>


               
            </table>
            <br>
            <br>
                    <input type="submit" value="Save">
                    <input type="reset" value="Reset">
                

        </form>
    </center>
    <?php
    }
    ?>
</body>

</html>