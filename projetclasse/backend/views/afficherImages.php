<?php
include_once "../controller/GalerieC.php";

$galerieC = new GalerieC();

// Traitement du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['galerie']) && isset($_POST['search'])) {
    $idGalerie = $_POST['galerie'];
    $list = $galerieC->afficherImages($idGalerie);
      }
    }



$galeries = $galerieC->afficherGaleries();
?>

<!DOCTYPE html>
<html>
<head>
<title>Recherche d'albums</title>
<style>
body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 65vh;
    font-family: 'Roboto', sans-serif;
}

form {
    text-align: center;
}

select {
    padding: 5px;
    margin-bottom: 10px;
}

input[type="submit"] {
    padding: 5px 10px;
    cursor: pointer;
}

h1, h2 {
    color: #007BFF; /* change the color of the titles */
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* add a shadow to the titles */
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {background-color: #f5f5f5;}
</style>
</head>
<body>
    <div>
        <h1>Recherche d'images par galerie</h1>
        <br>
        <form action="" method="POST">
            <label for="galerie">Sélectionnez une galerie :</label>
            <select name="galerie" id="galerie">
            <?php 
            foreach ($galeries as $galerie) {
                echo '<option value="' . $galerie['idGalerie'] . '">' . $galerie['nom'] . '</option>';
            }
            ?>
            </select>
            <input type="submit" value="Rechercher" name="search">
        </form>

    <?php if (isset($list)) { ?>
        <br>
        <h2> Images correspendantes a la Galerie selectionnée :</h2>
        <br>
        <table>
            <tr>
                <th>Titre</th>
                <th>Portrait</th>
            </tr>
            <?php foreach ($list as $image) { ?>
            <tr>
                <td><?= $image['titre'] ?></td>
                <td><?= $image['portrait'] ?></td>
            </tr>
            <?php } ?>
         </table>

        <?php } ?>
     </div>
</body>   
</html>























