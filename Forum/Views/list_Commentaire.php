<?php
include "../controller/commentaireC.php";

$c = new CommentaireC();
$tab = $c->listCommentaires();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of comments</title>
</head>

<body>
    <header>
        <h1>List of comments</h1>
        <h2><a href="add_Commentaire.php">Add Commentaire</a></h2>
    </header>

    <table border="1" align="center" width="70%">
        <head>
            <tr>
                <th>id_commentaire</th>
                <th>user_id</th>
                <th>id_discussion</th>
                <th width="50%" align="center">contenu</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </head>
        <body>
            <?php foreach ($tab as $commentaire) : ?>
                <tr>
                    <td><?= $commentaire['id_commentaire']; ?></td>
                    <td><?= $commentaire['user_id']; ?></td>
                    <td><?= $commentaire['id_discussion']; ?></td>
                    <td align="center"><?= $commentaire['contenu']; ?></td>
                    <td >
                        <form method="POST" action="update_Commentaire.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= $commentaire['id_commentaire']; ?>" name="id_commentaire">
                        </form>
                    </td>
                    <td>
                        <a href="delete_Commentaire.php?id_commentaire=<?php echo $commentaire['id_commentaire']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </body>
    </table>
</body>

</html>