<?php

include '../Controller/reclamationC.php';
include '../Model/reclamation.php';
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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reclamation = new reclamation(
            null,
            $_POST['id_rec'],
            $_POST['titre'],
            $_POST['description'],
            $_POST['date_reclamation']
        );
        var_dump($reclamation);
        
        $reclamationC->updatereclamation($reclamation, $_POST['id_rec']);

        header('Location:list_reclamation.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="list_reclamation.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_rec'])) {
        $reclamation = $reclamationC->showreclamation($_POST['id_rec']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id_rec">id_reclamation :</label></td>
                    <td>
                        <input type="titre" id="id_rec" name="id_rec" value="<?php echo $_POST['id_rec'] ?>" readonly />
                        <span id="erreurid_rec" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">id_reclamation :</label></td>
                    <td>
                        <input type="text" id="titre" name="titre" value="<?php echo $reclamation['titre'] ?>" />
                        <span id="erreurtitre" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $reclamation['description'] ?>" />
                        <span id="erreurdescription" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date_reclamation">date_reclamation :</label></td>
                    <td>
                        <input type="text" id="date_reclamation" name="date_reclamation" value="<?php echo $reclamation['date_reclamation'] ?>" />
                        <span id="erreurdate" style="color: red"></span>
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
    <?php
    }
    ?>
</body>

</html>