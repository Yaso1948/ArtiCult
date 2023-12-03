<?php

require_once('../Controller/discussionC.php');
require_once('../Model/Discussion.php');

$error = "";

$discussionC = new DiscussionC();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'] ?? '';
    $id_commentaire = $_POST['id_commentaire'] ?? null;

    if (!empty($titre) && !empty($id_commentaire)) {
        // Validez l'entrée utilisateur si nécessaire

        $discussion = new Discussion(null, $titre, $id_commentaire);

        if ($discussionC->addDiscussion($id_commentaire, $titre)) {
            header('Location: list_Discussion.php');
            exit();
        } else {
            $error = "Échec de l'ajout de la discussion.";
        }
    } else {
        $error = "Informations manquantes ou invalides";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une discussion</title>
</head>

<body>
    <a href="list_Discussion.php">Retour à la liste des discussions</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="titre">Titre :</label></td>
                <td>
                    <input type="text" id="titre" name="titre" />
                    <span id="erreurtitre" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="id_commentaire">ID Commentaire :</label></td>
                <td>
                    <input type="text" id="id_commentaire" name="id_commentaire" />
                    <span id="erreuridcommentaire" style="color: red"></span>
                </td>
            </tr>

            <td>
                <input type="submit" value="Enregistrer">
            </td>
            <td>
                <input type="reset" value="Réinitialiser">
            </td>
        </table>
    </form>
</body>

</html>
