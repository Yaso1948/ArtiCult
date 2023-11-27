<?php
// Importations necessaires
include '../Controller/GalerieC.php';
include '../model/Galerie.php';

$error = "";

//fonction qui vérifie si le numéro de téléphone est numérique

function isNumericPhone($phone){

    return preg_match('/^[0-9]+$/', $phone);

}
// create variable galerie
$galerie = null;

// create an instance of the controller
$galerieC = new GalerieC();

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
        $galerie = new Galerie(
            null,
            $_POST['nom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['horaires']
        );

        $galerieC->addGalerie($galerie);
        header('Location:listGaleries.php');
    } else
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
    <a href="listGaleries.php">Back to list </a>
    <center>
        <h1 >Ajout d'une Galerie</h1>
    
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td ><label for="nom">Nom* :</label></td>
                
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email* :</label></td>
                <td>
                    <input type="text" id="email" name="email"/>
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="tel">Tél*  :</label></td>
                <td>
                    <input type="text" id="tel" name="tel"/>
                    <span id="erreurTel" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="horaires">Horaires de travail* :</label></td>
                <td>
                    <input type="text" id="horaires" name="horaires" values="saisir horaires d'ouverture et de fermeture" />
                    <span id="erreurHoraires" style="color: red"></span>
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
