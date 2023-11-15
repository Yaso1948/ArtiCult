<!DOCTYPE html>
<html>
<head>
    <title>Add reclamation</title>
</head>
<body>
    <h1>Add reclamation</h1>

    <form method="post" action="">
        <label for="id_rec">titre:</label>
        <input type="text" name="id_rec"><br>

        <label for="titre">proprietaire:</label>
        <input type="text" name="titre"><br>

        <label for="description">description:</label>
        <input type="text" name="description"><br>

        <label for="date_reclamation">date_reclamation:</label>
        <input type="text" name="date_reclamation"><br>


        <input type="submit" value="addreclamation">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $date_reclamation = $_POST['date_reclamation'];
        $id_rec = $_POST['id_rec'];
        


        require_once '../controller/reclamationC.php';
        $reclamationcontroller = new reclamationC();

        if ($reclamationcontroller->addreclamation($id_rec,$titre,$description,$date_reclamation,)) {
            header("Location: list_reclamation.php");
            exit();
        } else {
            echo "PAS DE RECLAMATIONS";
        }
    }
    ?>
</body>
</html>