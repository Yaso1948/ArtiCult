<?php
include "../controller/commentaireC.php";

$c = new CommentaireC();
$tab = $c->listCommentaires();

?>

<center>
    <h1>List of comments</h1>
    <h2>
        <a href="add_Commentaire.php">Add Commentaire</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>id_commentaire</th>
        <th>user_id</th>
        <th>contenu</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $commentaire) {
    ?>

        <tr>
            <td><?= $commentaire['id_commentaire']; ?></td>
            <td><?= $commentaire['user_id']; ?></td>
            <td><?= $commentaire['contenu']; ?></td>
            <td align="center">
                <form method="POST" action="updateCommentaire.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $commentaire['id_commentaire']; ?> name="id_commentaire">
                </form>
            </td>
            <td>
                <a href="delete_Commentaire.php?id=<?php echo $commentaire['id_commentaire']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>