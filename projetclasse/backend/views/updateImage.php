<?php

include '../Controller/ImageC.php';
include '../model/Image.php';
$error = "";

// create galerie
$image = null;
// create an instance of the controller
$imageC = new ImageC();

function isNumericidGalerie($idGalerie){

    return preg_match('/^[0-9]+$/', $idGalerie);

}

if (
    isset($_POST["titre"]) &&
    isset($_POST["portrait"]) && 
    isset($_POST["idGalerie"])
) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["portrait"]) &&
        !empty($_POST["idGalerie"])&& (isNumericidGalerie($_POST["idGalerie"]))&&
         $imageC->checkIdGalerieExists($_POST["idGalerie"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $image = new Image(
            null,
            $_POST['titre'],
            $_POST['portrait'],
            $_POST['idGalerie']
        );
        var_dump($image);
        
        $imageC->updateImage($image, $_POST['idImage']);

        header('Location:listImages.php');
    } else
    if (
        empty($_POST['titre']) ||
        empty($_POST["portrait"]) ||
        empty($_POST["idGalerie"])
    ) {
        echo '<div style="text-align:center;">';
        echo '<span style="color:red;"> Tous les champs doivent être remplis </span>';
        echo '</div>';}

        if(!isNumericidGalerie($_POST["idGalerie"]))
    {
    //echo "L'identifiant de la Galerie est invalide (doit être numérique).";
        echo '<div style="text-align:center;">';
        echo '<span style="color:red;">Lidentifiant de la Galerie doit être numérique.</span>';
        echo '</div>';    
    }
        if (!$imageC->checkIdGalerieExists($_POST["idGalerie"])){

            echo '<div style="text-align:center;">';
            echo '<span style="color:red;">idGalerie nexiste pas dans la table galerie..</span>';
            echo '</div>'; 
        }
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listImages.php">Back to list</a></button>
    <center>
        <h2 >Modification d'une Image</h2>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idImage'])) {
        $image = $imageC->showImage($_POST['idImage']);
        
    ?>
    
        <form action="" method="POST">
            
            <table>
            <tr>
                    <td><label for="nom">IdImage :</label></td>
                    <td>
                        <input type="text" id="idImage" name="idImage" value="<?php echo $_POST['idImage'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">Titre :</label></td>
                    <td>
                        <input type="text" id="titre" name="titre" value="<?php echo $image['titre'] ?>" />
                        <span id="erreurTitre" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="portrait">Portrait :</label></td>
                    <td>
                        <input type="text" id="portrait" name="portrait" value="<?php echo $image['portrait'] ?>" />
                        <span id="erreurPortrait" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="idGalerie">Galerie :</label></td>
                    <td>
                        <input type="int" id="idGalerie" name="idGalerie" value="<?php echo $image['idGalerie'] ?>" />
                        <span id="erreurTel" style="color: red"></span>
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