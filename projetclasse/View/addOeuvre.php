<!DOCTYPE html>
<html>
<head>
    <title>Add oeuvre</title>
    <style>
        body {
            background-color: #f2f2f2; /* Light gray background */
            color: #333; /* Dark gray text color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333; /* Dark gray header color */
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff; /* White form background */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light shadow effect */
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333; /* Dark gray label color */
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green submit button */
            color: #fff; /* White text on the button */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
   
    <h1>Add oeuvre<header><img src="..\asset\logo.png" alt="Logo" width="150" height="150"></header></h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="titre">titre:</label>
        <input type="text" name="titre" required><br>

        <label for="proprietaire">proprietaire:</label>
        <input type="text" name="proprietaire" required ><br>

        <label for="description">description:</label>
        <input type="text" name="description" required><br>

        <label for="prix">prix:</label>
        <input type="text" name="prix" required><br>

        <label for="support">support:</label>
        <input type="text" name="support" required><br>

        <label for="etat">etat:</label>
        <input type="text" name="etat" required><br>

        <label for="poids">poids:</label>
        <input type="text" name="poids" required><br>

        <label for="image">image:</label>
        <input type="text" name="image" required><br>

        <label for="category">category:</label>
        <input type="text" name="category" required><br>

        

        <input type="submit" value="Add oeuvre">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = htmlspecialchars($_POST['titre']);
        $proprietaire = htmlspecialchars($_POST['proprietaire']);
        $description = htmlspecialchars($_POST['description']);
        $prix = htmlspecialchars($_POST['prix']);
        $support = htmlspecialchars($_POST['support']);
        $etat = htmlspecialchars($_POST['etat']);
        $poids = htmlspecialchars($_POST['poids']);
        $image = htmlspecialchars($_POST['image']);
        $category = htmlspecialchars($_POST['category']);

        require_once '../controller/oeuvreC.php';
        $oeuvrecontroller = new oeuvreC();

        if ($oeuvrecontroller->addOeuvre($titre, $proprietaire, $description, $prix, $support, $etat, $poids, $image,$category)) {
            header("Location: listeoeuvre.php");
            exit();
        } else {
            echo "Error adding the art piece.";
        }
    }
    ?>
</body>
</html>
