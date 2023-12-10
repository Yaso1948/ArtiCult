<?php

require_once('../Controller/discussionC.php');
require_once('../Model/Discussion.php');

$error = "";

$discussionC = new DiscussionC();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'] ?? '';

    if (!empty($titre)) {
        // Validez l'entrée utilisateur si nécessaire

        $discussion = new Discussion(null, $titre);

        if ($discussionC->addDiscussion($titre)) {
            header('Location: index.php');
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
    <a href="index.php">Retour au Forum</a>
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
