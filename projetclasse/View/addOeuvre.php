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
            header("Location: ../front/index.php");
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
            background: url('../asset/zzz.jpg') center/cover no-repeat; /* Set the path to your background image */
            color: #333333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #000000;
            padding: 20px;
            text-align: center;
            width: 100%;
            position: relative;
        }
        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000000; /* Black background color */
            opacity: 0.5; /* Adjust opacity as needed */
            z-index: -1;}
        header img {
            background-color: transparent;
            border-radius: 50%;
            z-index: 1;        }

        h1 {
            color: #FFA500;
            margin-bottom: 10px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Add some opacity to the background color */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
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
            background-color: #FFA500;
            color: #000000;
            cursor: pointer;
            font-size: 18px;
            border: 1px solid #FFA500;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #333;
            color: #FFA500;
        }

        .retour-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            background-color: #FFA500;
            color: #000000;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .retour-button:hover {
            background-color: #333;
            color: #FFA500;
        }
    </style>
</head>
<body>
<header>
        <img src="../asset/logo.png" alt="Logo" width="150" height="150">
    </header>
    <h1>Add Oeuvre </h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"enctype="multipart/form-data">
    <label for="titre">Titre:</label>
        <input type="text" name="titre" required><br>

        <label for="proprietaire">Propriétaire:</label>
        <input type="text" name="proprietaire" required><br>

        <label for="description">Description:</label>
        <input type="text" name="description" required><br>

        <label for="prix">Prix:</label>
        <input type="text" name="prix" required><br>

        <label for="support">Support:</label>
        <input type="text" name="support" ><br>

        <label for="etat">État:</label>
<select name="etat" required>
    <option value="nouveau">Nouveau</option>
    <option value="bon">Bon</option>
    <option value="correcte">Correcte</option>
</select><br>

        <label for="poids">Poids:</label>
        <input type="text" name="poids" required><br>
        <label for="image">Chemin de l'image:</label>
<input type="text" name="image" required><br>

        <label for="category">Catégorie:</label>
<select name="category" required>
    <option value="1">Peinture</option>
    <option value="2">Sculpture</option>
    <option value="3">Poterie</option>
</select><br>

        <input type="submit" value="Add Oeuvre">
    </form>
    <a href="../front/index.php" class="retour-button">Retour</a>

    <style>
         .retour-button {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        text-decoration: none;
        background-color: #FFA500; /* Orange background color */
        color: #000000; /* Black text color */
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .retour-button:hover {
        background-color: #333;
        color: #FFA500;
    }
    </style>
</body>
</html>