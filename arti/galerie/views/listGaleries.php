<?php
include "../controller/GalerieC.php";

$c = new GalerieC();
$tab = $c->listGaleries();

?>

<center>
    <h1>Liste des Galeries</h1>




<table border="1" align="center" width="60%">
    <tr>
        <th>Id Galerie</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Horaires</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $galerie) {
    ?>

        <tr>
            <td><?= $galerie['idGalerie']; ?></td>
            <td><?= $galerie["nom"]; ?></td>
            <td><?= $galerie['email']; ?></td>
            <td><?= $galerie['tel']; ?></td>
            <td><?= $galerie["horaires"]; ?></td>
            <td align="center">
                <form method="POST" action="updateGalerie.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $galerie['idGalerie']; ?> name="idGalerie">
                </form>
            </td>
            <td>
            <a href="deleteGalerie.php?id=<?php echo $galerie['idGalerie']; ?>" id="l" onclick="return confirmDelete();">Delete</a> 

            </td>
        </tr>
    <?php
    }
    ?>
</table>
    
<h3>
        <a href="addGalerie.php">Ajout d'une Galerie</a>
    </h3>
</center>
<script>
function confirmDelete() {
    if (confirm("Voulez-vous vraiment supprimer cette galerie?") == true) {
        return true;
    } else {
        return false;
    }
}
</script>