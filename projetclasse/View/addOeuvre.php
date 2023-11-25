<?php
echo "Le formulaire a été soumis.";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once '../controller/oeuvreC.php';
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
    
        $oeuvrecontroller = new oeuvreC();
    
        if ($oeuvrecontroller->addOeuvre($titre, $proprietaire, $description, $prix, $support, $etat, $poids, $image, $category)) {
            echo "Œuvre ajoutée avec succès.";
            // Redirige vers la page listeoeuvre.php
            header("Location: listeoeuvre.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'œuvre.";
        }
    } var_dump($_POST);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Oeuvre</title>
    <style>
     body {
    background-color: #f2f2f2;
    color: #333;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    color: #333;
    text-align: center;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333;
    font-size: 16px;
}

input {
    width: calc(100% - 16px);
    padding: 10px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="submit"] {
    background-color: #ffcc00;
    color: #333;
    cursor: pointer;
    font-size: 18px;
    border: 1px solid #ffcc00;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #333;
    color: #ffcc00;
}


    </style>
</head>
<body>
    <h1>Add Oeuvre <img src="../asset/logo.png" alt="Logo" width="150" height="150"></h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" required><br>

        <label for="proprietaire">Propriétaire:</label>
        <input type="text" name="proprietaire" required><br>

        <label for="description">Description:</label>
        <input type="text" name="description" required><br>

        <label for="prix">Prix:</label>
        <input type="text" name="prix" required><br>

        <label for="support">Support:</label>
        <input type="text" name="support" required><br>

        <label for="etat">État:</label>
        <input type="text" name="etat" required><br>

        <label for="poids">Poids:</label>
        <input type="text" name="poids" required><br>

        <label for="image">Chemin de l'image:</label>
        <input type="text" name="image" required><br>


        <label for="category">Catégorie:</label>
        <input type="text" name="category" required><br>

        <input type="submit" value="Add Oeuvre">
    </form>
</body>
</html>