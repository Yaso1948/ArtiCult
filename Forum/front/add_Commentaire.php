<?php

require_once('../Controller/commentaireC.php');
require_once('../Model/Commentaire.php');

$error = "";

$commentaireC = new CommentaireC();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $contenu = $_POST['contenu'] ?? '';
    $user_id = $_POST['user_id'] ?? null;
    $id_discussion = $_POST['id_discussion'] ?? null;

    if (!empty($contenu) && !empty($user_id) && !empty($id_discussion)) {

        $commentaire = new Commentaire(null, $contenu, $user_id, $id_discussion);

        if ($commentaireC->addCommentaire($user_id, $commentaire)) {
            header('Location: index.php');
            exit();
        } else {
            $error = "Failed to add comment.";
        }
    } else {
        $error = "Missing or invalid information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Commentaire </title>
</head>

<body>
    <a href="index.php">Back to Forum </a>
    <hr>

    <div id="error">
        <?php $error; ?>
    </div>

    <form action="" method="POST">
        <table>
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

            <tr>
                <td><label for="id_discussion">id_discussion :</label></td>
                <td>
                    <input type="text" id="id_discussion" name="id_discussion" />
                    <span id="erreurid_discussion" style="color: red"></span>
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
