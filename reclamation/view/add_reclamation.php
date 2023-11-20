<?php
// Importations bécessaires
include '../Controller/reclamationC.php';
include '../model/reclamation.php';

$error = "";

// create client
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();

if (
    isset($_POST["id_rec"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["description"]) &&
    isset($_POST["date_reclamation"])
) {
    if (
        !empty($_POST['id_rec']) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["date_reclamation"])
    ) {
        $reclamation = new reclamation(
            null,
            $_POST['id_rec'],
            $_POST['titre'],
            $_POST['description'],
            $_POST['date_reclamation']
        );

        $reclamationC->addreclamation($reclamation);
        header('Location:listreclamation.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> reclamation </title>
</head>

<body>
    <a href="listreclamation.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="id_rec">id_rec :</label></td>
                <td>
                    <input type="text" id="id_rec" name="id_rec" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="titre">titre :</label></td>
                <td>
                    <input type="text" id="titre" name="titre" />
                    <span id="erreurtitre" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date_reclamation">date_reclamation :</label></td>
                <td>
                    <input type="text" id="date_reclamation" name="date_reclamation" />
                    <span id="erreurdate_reclamation" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>

</html>