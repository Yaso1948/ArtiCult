<!DOCTYPE html>
<html>
<head>
    <title>Liste des oeuvre</title>
    <!-- Any necessary styling or meta tags -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: white;
        color: black;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    h1 {
        text-align: center;
        color: teal; /* Blue-green color */
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: silver; /* Silver color */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: teal; /* Blue-green color */
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    a {
        text-decoration: none;
        color: #007BFF; /* Blue color */
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <h1>Liste des oeuvres</h1><header><img src="..\asset\logo.png" alt="Logo" width="150" height="150"></header>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>titre</th>
                <th>proprietaire</th>
                <th>description</th>
                <th>prix</th>
                <th>support</th>
                <th>etat</th>
                <th>poids</th>
                <th>image</th>
                <th>category</th>
              
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../Controller/oeuvreC.php');
            $controller = new oeuvreC();
            $oeuvres = $controller->listoeuvre();

            foreach ($oeuvres as $oeuvre) {
                echo "<tr>";
                echo "<td>" . $oeuvre['id_piece_doeuvre'] . "</td>";
                echo "<td>" . $oeuvre['titre'] . "</td>";
                echo "<td>" . $oeuvre['proprietaire'] . "</td>";
                echo "<td>" . $oeuvre['description'] . "</td>";
                echo "<td>" . $oeuvre['prix'] . "</td>";
                echo "<td>" . $oeuvre['support'] . "</td>";
                echo "<td>" . $oeuvre['etat'] . "</td>";
                echo "<td>" . $oeuvre['poids'] . "</td>";
                echo "<td>" . $oeuvre['image'] . "</td>";
                echo "<td>" . $oeuvre['category'] . "</td>";
                echo "<td><a href='../View/deleteOeuvre.php?id=" . $oeuvre['id_piece_doeuvre'] ."'>Supprimer</a></td>";
                echo "<td><a href='../View/updateoeuvre.php?id=" . $oeuvre['id_piece_doeuvre'] . "'>Modifier</a></td>";

               
                echo "</tr>";
            }
            
            ?>
        </tbody>
    </table>
</body>
</html>
