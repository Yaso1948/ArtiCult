<?php
// Importations necessaires

include '../controller/GalerieC.php';
include '../model/Image.php';
include '../controller/ImageC.php';

$error = "";

$galerieC = new GalerieC();

// Traitement du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['galerie']) && isset($_POST['search'])) {
$idGalerie = $_POST['galerie'];
$list = $galerieC->afficherImages($idGalerie);
  }
}

$galeries = $galerieC->afficherGaleries();






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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Galerie </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial , sans-serif;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <a href="listImages.php">Back to list </a>
    <center>
        <h1 >Ajout d'une image</h1>
    
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" id="imageForm">
        <div class="form-group">
            <label for="titre">Titre* :</label>
            <input type="text" class="form-control" id="titre" name="titre" style="width: 300px;" />
            <span id="erreurTitre" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="portrait">Portrait* :</label>
            <input type="text" class="form-control" id="portrait" name="portrait" style="width: 300px;" />
            <span id="erreurPortrait" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="galerie">Galerie* :</label>
            <select name="idGalerie" id="galerie" class="form-control" style="width: 300px;">
            <?php
            foreach ($galeries as $galerie) {
               
                echo '<option value="' . $galerie ['idGalerie'] . '">' . $galerie['nom'] . ' N° ' . $galerie['idGalerie']. '</option>';
            }
             ?>  
            </select>
            <span id="erreuridGalerie" class="error-message"></span>
        </div>
        <br>
        <br>
        <input type="submit" value="Save" class="btn btn-primary">
        <input type="reset" value="Reset" class="btn btn-danger">
    </form>
    </center>

    <script>
        document.getElementById('imageForm').addEventListener('submit', function(event) {
            var isValid = true;

            // Validate "titre" field
            var titre = document.getElementById('titre');
            if (titre.value.trim() === '') {
                document.getElementById('erreurTitre').textContent = 'Le titre est requis.';
                isValid = false;
            } else {
                document.getElementById('erreurTitre').textContent = '';
            }

            // Validate "portrait" field
            var portrait = document.getElementById('portrait');
            if (portrait.value.trim() === '') {
                document.getElementById('erreurPortrait').textContent = 'Le portrait est requis.';
                isValid = false;
            } else {
                document.getElementById('erreurPortrait').textContent = '';
            }

            // Validate "galerie" field
            var galerie = document.getElementById('galerie');
            if (galerie.value.trim() === '') {
                document.getElementById('erreuridGalerie').textContent = 'La galerie est requise.';
                isValid = false;
            } else {
                document.getElementById('erreuridGalerie').textContent = '';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
