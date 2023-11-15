<?php
include "../controller/reclamationC.php";

$c = new reclamationC();
$tab = $c->listreclamation();

?>

<center>
    <h1>List of players</h1>
    <h2>
        <a href="add_reclamation.php">Add reclamation</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>id_rec</th>
        <th>titre</th>
        <th>description</th>
        <th>date_reclamation</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $reclamation) {
    ?>

        <tr>
            <td><?= $reclamation['id_rec']; ?></td>
            <td><?= $reclamation['titre']; ?></td>
            <td><?= $reclamation['description']; ?></td>
            <td><?= $reclamation['date_reclamation']; ?></td>
            <td align="center">
                <form method="POST" action="updatereclamation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reclamation['id_rec']; ?> name="id_rec">
                </form>
            </td>
            <td>
                <a href="delete_reclamation.php?id=<?php echo $reclamation['id_rec']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>