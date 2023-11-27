<?php

include '../Controller/commentaireC.php';
include '../Model/Commentaire.php';
$error = "";


$commentaire = null;

$commentaireC = new CommentaireC();


if (
    isset($_POST["id_commentaire"]) &&
    isset($_POST["user_id"]) &&
    isset($_POST["contenu"])
) {
    if (
        !empty($_POST['id_commentaire']) &&
        !empty($_POST["user_id"]) &&
        !empty($_POST["contenu"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $commentaire = new CommentaireC(
            null,
            $_POST['id_commentaire'],
            $_POST['user_id'],
            $_POST['contenu']
        );
        var_dump($commentaire);
        
        $commentaireC->updateCommentaire($commentaire, $_POST['id_commentaire']);

        header('Location:list_Commentaire.php');
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
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['user_id'])) {
        $commentaire = $commentaireC->getCommentaireParUserId($_POST['user_id']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id_commentaire">id_commentaire :</label></td>
                    <td>
                        <input type="titre" id="id_commentaire" name="id_commentaire" value="<?php echo $_POST['id_commentaire'] ?>" readonly />
                        <span id="erreurid_commentaire" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="contenu">contenu :</label></td>
                    <td>
                        <input type="text" id="contenu" name="contenu" value="<?php echo $commentaire['contenu'] ?>" />
                        <span id="erreurcontenu" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="user_id">user_id :</label></td>
                    <td>
                        <input type="text" id="user_id" name="user_id" value="<?php echo $comment['user_id'] ?>" />
                        <span id="erreuruser_id" style="color: red"></span>
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