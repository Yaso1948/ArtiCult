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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <a href="listGaleries.php">Back to list </a>
    <center>
        <h1>Ajout d'une Galerie</h1>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST" id="galerieForm">
            <div class="form-group">
                <label for="nom">Nom* :</label>
                <input type="text" class="form-control" id="nom" name="nom" style="width: 300px;" />
                <span id="erreurNom" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="email">Email* :</label>
                <input type="text" class="form-control" id="email" name="email" style="width: 300px;" />
                <span id="erreurEmail" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="tel">Tél* :</label>
                <input type="text" class="form-control" id="tel" name="tel" style="width: 300px;" />
                <span id="erreurTel" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="horaires">Horaires de travail* :</label>
                <input type="text" class="form-control" id="horaires" name="horaires" placeholder="saisir horaires d'ouverture et de fermeture" style="width: 300px;" />
                <span id="erreurHoraires" class="error-message"></span>
            </div>
            <br>
            <br>
            <input type="submit" value="Save" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-danger">
        </form>
    </center>

    <script>
        document.getElementById('galerieForm').addEventListener('submit', function(event) {
            var isValid = true;

            // Validate "nom" field
            var nom = document.getElementById('nom');
            if (nom.value.trim() === '') {
                document.getElementById('erreurNom').textContent = 'Le nom est requis.';
                isValid = false;
            } else {
                document.getElementById('erreurNom').textContent = '';
            }

            // Validate "email" field
            var email = document.getElementById('email');
            if (email.value.trim() === '') {
                document.getElementById('erreurEmail').textContent = 'L\'email est requis.';
                isValid = false;
            } else {
                document.getElementById('erreurEmail').textContent = '';
            }

            // Validate "tel" field
            var tel = document.getElementById('tel');
            if (tel.value.trim() === '') {
                document.getElementById('erreurTel').textContent = 'Le téléphone est requis.';
                isValid = false;
            } else {
                document.getElementById('erreurTel').textContent = '';
            }

            // Validate "horaires" field
            var horaires = document.getElementById('horaires');
            if (horaires.value.trim() === '') {
                document.getElementById('erreurHoraires').textContent = 'Les horaires de travail sont requis.';
                isValid = false;
            } else {
                document.getElementById('erreurHoraires').textContent = '';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>