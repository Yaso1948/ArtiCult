<?php

include '../Controller/discussionC.php';
include '../Model/Discussion.php';

$error = "";
$discussion = null;

$discussionC = new DiscussionC();

if (isset($_POST["id_discussion"]) && isset($_POST["titre"])) {
    if (!empty($_POST['id_discussion']) && !empty($_POST["titre"])) {
        $discussion = $discussionC->getDiscussionById($_POST['id_discussion']);

        $discussion = new Discussion(
            null,
            $_POST['titre'],
            $discussion['id_commentaire'] // Assuming id_commentaire remains the same
        );

        $discussionC->updateDiscussion($discussion, $_POST['id_discussion']);

        header('Location: list_Discussion.php');
        exit();
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Display</title>
</head>

<body>
    <button><a href="list_Discussion.php">Back to list</a></button>
    <center>
        <h2>Modification d'une discussion</h2>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <?php
        if (isset($_POST['id_discussion'])) {
            $discussion = $discussionC->getDiscussionById($_POST['id_discussion']);
        ?>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td><label for="titre">Titre :</label></td>
                        <td>
                            <input type="text" id="titre" name="titre" value="<?php echo $discussion['titre'] ?>" />
                            <span id="erreurtitre" style="color: red"></span>
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
