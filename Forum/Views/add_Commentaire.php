<?php

include '../Controller/commentaireC.php';
include '../model/Commentaire.php';

$error = "";


$commentaire = null;


$commentaireC = new CommentaireC();

if (
    isset($_POST["id_commentaire"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["user_id"])
) {
    if (
        !empty($_POST['id_commentaire']) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["user_id"])
    ) {
        $commentaire = new CommentaireC(
            null,
            $_POST['id_commentaire'],
            $_POST['contenu'],
            $_POST['user_id']
        );

        $commentaireC->addCommentaire($commentaire);
        header('Location:list_Commentaire.php');
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
    <a href="list_Commentaire.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="id_commentaire">id_commentaire :</label></td>
                <td>
                    <input type="text" id="id_commentaire" name="id_commentaire" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="contenu">contenu :</label></td>
                <td>
                    <input type="text" id="contenu" name="contenu" />
                    <span id="erreurcontenu" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="user_id">user_id :</label></td>
                <td>
                    <input type="text" id="user_id" name="user_id" />
                    <span id="erreuruserid" style="color: red"></span>
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