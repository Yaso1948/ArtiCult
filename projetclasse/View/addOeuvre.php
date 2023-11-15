<!DOCTYPE html>
<html>
<head>
    <title>Add oeuvre</title>
</head>
<body>
    <h1>Add oeuvre</h1>

    <form method="post" action="">
        <label for="titre">titre:</label>
        <input type="text" name="titre"><br>

        <label for="proprietaire">proprietaire:</label>
        <input type="text" name="proprietaire"><br>

        <label for="description">description:</label>
        <input type="text" name="description"><br>

        <label for="prix">prix:</label>
        <input type="text" name="prix"><br>

        <label for="support">support:</label>
        <input type="text" name="support"><br>

        <label for="etat">etat:</label>
        <input type="text" name="etat"><br>

        <label for="poids">poids:</label>
        <input type="text" name="poids"><br>

        <label for="image">image:</label>
        <input type="text" name="image"><br>

        

        <input type="submit" value="Add oeuvre">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre'];
        $proprietaire = $_POST['proprietaire'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $support = $_POST['support'];
        $etat = $_POST['etat'];
        $poids = $_POST['poids'];
        $image = $_POST['image'];


        require_once '../controller/oeuvreC.php';
        $oeuvrecontroller = new oeuvreC();

        if ($oeuvrecontroller->addOeuvre($titre, $proprietaire, $description, $prix, $support, $etat, $poids, $image)) {
            header("Location: listeoeuvre.php");
            exit();
        } else {
            echo "Error adding the art piece.";
        }
    }
    ?>
</body>
</html>
