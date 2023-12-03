<?php

include '../Controller/commentaireC.php';
include '../Model/Commentaire.php';
$error = "";


$commentaire = null;


$commentaireC = new CommentaireC();


if (
    isset($_POST["id_commentaire"]) &&
    isset($_POST["contenu"])
) {
    if (
        !empty($_POST['id_commentaire']) &&
        !empty($_POST["contenu"])
    ) {
        $commentaire = $commentaireC->getCommentaireParUserId($_POST['id_commentaire']); // Assuming id_commentaire is used as user_id

            $commentaire = new Commentaire(
                null,
                $_POST['id_commentaire'],
                $commentaire['user_id'], // Assuming user_id remains the same
                $_POST['contenu']
            );

            $commentaireC->updateCommentaire($commentaire, $_POST['id_commentaire']);

        header('Location:list_Commentaire.php');
        exit();
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Display</title>
</head>

<body>
    <button><a href="list_Commentaire.php">Back to list</a></button>
    <center>
        <h2 >Modification d'un commentaire</h2>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_commentaire'])) {
        $commentaire = $commentaireC->getCommentaireParUserId($_POST['id_commentaire']);
    ?>
    
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="contenu">contenu :</label></td>
                    <td>
                        <input type="text" id="contenu" name="contenu" value="<?php echo $commentaire['contenu'] ?>" />
                        <span id="erreurcontenu" style="color: red"></span>
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