<?php
include "../controller/ImageC.php";

$c = new ImageC();
$tab = $c->listImages();

?>

<center>
    <h1>Liste des Images</h1>




<table border="1" align="center" width="60%">
    <tr>
        <th>Id Image</th>
        <th>titre</th>
        <th>portrait</th>
        <th>idGalerie</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $image) {
    ?>

        <tr>
            <td><?= $image['idImage']; ?></td>
            <td><?= $image["titre"]; ?></td>
            <td><?= $image['portrait']; ?></td>
            <td><?= $image['idGalerie']; ?></td>
            <td align="center">
                <form method="POST" action="updateImage.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $image['idImage']; ?> name="idImage">
                </form>
            </td>
            <td>
            <a href="deleteImage.php?id=<?php echo $image['idImage']; ?>" id="l" onclick="return confirmDelete();">Delete</a> 

            </td>
        </tr>
    <?php
    }
    ?>
</table>
    
<h3>
        <a href="addImage.php">Ajout d'une Image</a>
    </h3>
</center>
<script>
function confirmDelete() {
    if (confirm("Voulez-vous vraiment supprimer cette image?") == true) {
        return true;
    } else {
        return false;
    }
}
</script>