<?php
// Importations necessaires
include '../Controller/ImageC.php';
include '../model/Image.php';

$error = "";


//fonction qui vérifie si le numéro de téléphone est numérique
function isNumericidGalerie($idGalerie){

    return preg_match('/^[0-9]+$/', $idGalerie);

}
// create variable galerie
$image = null;

// create an instance of the controller
$imageC = new ImageC();

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
        $image = new Image(
            null,
            $_POST['titre'],
            $_POST['portrait'],
            $_POST['idGalerie']
        );

        $imageC->addImage($image);
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

        //$error = "Tous les champs doivent être remplis";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Galerie </title>
</head>

<body>
    



    <a href="listImages.php">Back to list </a>
    <center>
        <h1 >Ajout d'une image</h1>
    
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td ><label for="titre">Titre* :</label></td>
                
                <td>
                    <input type="text" id="titre" name="titre" />
                    <span id="erreurTitre" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="portrait">Portrait* :</label></td>
                <td>
                    <input type="text" id="portrait" name="portrait"/>
                    <span id="erreurPortrait" style="color: red"></span>
                </td>
            </tr>
   
            <tr>
                <td><label for="idGalerie">galerie* :</label></td>
                <td>
                    <input type="int" id="idGalerie" name="idGalerie"/>
                    <span id="erreuridGalerie" style="color: red"></span>
                </td>
            </tr>
  </table>
        <br>
        <br>
        <input type="submit" value="Save" id="sub">
        <input type="reset" value="Reset">
    </form>
    </center>

</body>
</html>
