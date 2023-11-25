<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des œuvres</title>
    <style>
          body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: lightgrey ; /* Ajout de la couleur de fond grise */
        }

        h1 {
            text-align: center;
            color: #4a4a4a;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        td img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }

        button {
            background-color: #4a4a4a;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>Liste des œuvres</h1>

    <header><img src="..\asset\logo.png" alt="Logo" width="150" height="150"></header>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Propriétaire</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Support</th>
                <th>État</th>
                <th>Poids</th>
                <th>Image</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../controller/oeuvreC.php');
            $controller = new oeuvreC();
            $oeuvres = $controller->listOeuvre();

            foreach ($oeuvres as $oeuvre) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($oeuvre['id_piece_doeuvre']) . "</td>";
                echo "<td>" . htmlspecialchars($oeuvre['titre']) . "</td>";
                echo "<td>" . htmlspecialchars($oeuvre['proprietaire']) . "</td>";
                echo "<td>" . htmlspecialchars($oeuvre['description']) . "</td>";
                echo "<td>" . htmlspecialchars($oeuvre['prix']) . "</td>";
                echo "<td>" . htmlspecialchars($oeuvre['support']) . "</td>";
                echo "<td>" . htmlspecialchars($oeuvre['etat']) . "</td>";
                echo "<td>" . htmlspecialchars($oeuvre['poids']) . "</td>";
                echo "<td><img src='" . htmlspecialchars($oeuvre['image']) . "' alt='Image de l'oeuvre' width='100'></td>";
                echo "<td>" . htmlspecialchars($oeuvre['category']) . "</td>"; // Correction ici
               
                echo "<td>";
                echo "<form method='post' action='../View/deleteOeuvre.php' onsubmit='return confirmDelete(\"" . htmlspecialchars($oeuvre['id_piece_doeuvre']) . "\")'>";
                echo "<input type='hidden' name='id' value=''>";
                echo "<button type='submit' name='delete' value='" . htmlspecialchars($oeuvre['id_piece_doeuvre']) . "'>Supprimer</button>";
                echo "</form>";
                echo "<form method='get' action='../View/updateoeuvre.php'>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($oeuvre['id_piece_doeuvre']) . "'>";
                echo "<button type='submit'>Modifier</button>";
                echo "</form>";
                echo "<form method='get' action='../View/recherche.php'>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($oeuvre['category']) . "'>";
                echo "<button type='submit'>Recherche</button>";
                echo "</form>";
                echo "</td>";
               
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
