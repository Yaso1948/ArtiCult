<?php
require_once('../controller/oeuvreC.php');

if (isset($_GET['id'])) {
    $id_piece_doeuvre = $_GET['id'];

    $oeuvrecontroller = new oeuvreC();
    $oeuvreDetails = $oeuvrecontroller->showoeuvre($id_piece_doeuvre);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updatedTitre = $_POST['titre'];
        $updatedProprietaire = $_POST['proprietaire'];
        $updatedDescription = $_POST['description'];
        $updatedPrix = $_POST['prix'];
        $updatedSupport = $_POST['support'];
        $updatedEtat = $_POST['etat'];
        $updatedPoids = $_POST['poids'];
        $updatedImage = $_POST['image'];
        $updatedCategory = $_POST['category'];
    
        $oeuvrecontroller = new oeuvreC();
    
        $updateResult = $oeuvrecontroller->updateOeuvre(
            $id_piece_doeuvre,
            $updatedTitre,
            $updatedProprietaire,
            $updatedDescription,
            $updatedPrix,
            $updatedSupport,
            $updatedEtat,
            $updatedPoids,
            $updatedImage,
            $updatedCategory
        );
        echo "<p>$updateResult</p>";
    }
} else {
    echo "art piece ID not specified.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update oeuvre Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            color: black;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: teal; /* Blue-green color */
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: silver; /* Silver color */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: black;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: teal; /* Blue-green color */
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #007BFF; /* Darker blue color */
        }

        button {
            background-color: teal;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #007BFF;
        }
        
    </style>
</head>
<body>
    <h1>Update oeuvre Information</h1>
    <header><img src="..\asset\logo.png" alt="Logo" width="150" height="150"></header>

    <form action="" method="POST">
        <label for="titre">titre:</label>
        <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($oeuvreDetails['titre']); ?>" required><br><br>

        <label for="proprietaire">proprietaire:</label>
        <input type="text" id="proprietaire" name="proprietaire" value="<?php echo htmlspecialchars($oeuvreDetails['proprietaire']); ?>"><br><br>

        <label for="description">description:</label>
        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($oeuvreDetails['description']); ?>"><br><br>

        <label for="prix">prix:</label>
        <input type="text" id="prix" name="prix" value="<?php echo htmlspecialchars($oeuvreDetails['prix']); ?>"><br><br>

        <label for="support">support:</label>
        <input type="text" id="support" name="support" value="<?php echo htmlspecialchars($oeuvreDetails['support']); ?>"><br><br>

        <label for="etat">etat:</label>
        <input type="text" id="etat" name="etat" value="<?php echo htmlspecialchars($oeuvreDetails['etat']); ?>"><br><br>

        <label for="poids">poids:</label>
        <input type="text" id="poids" name="poids" value="<?php echo htmlspecialchars($oeuvreDetails['poids']); ?>"><br><br>

        <label for="image">image:</label>
        <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($oeuvreDetails['image']); ?>"><br><br>

        <label for="category">category:</label>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($oeuvreDetails['category']); ?>"><br><br>

        <input type="submit" name="submit" value="update oeuvre">
    </form>
    <form method="get" action="listeoeuvre.php">
        <button type="submit">Retourner vers la liste</button>
    </form>

</body>
</html>
