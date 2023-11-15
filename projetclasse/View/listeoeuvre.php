<!DOCTYPE html>
<html>
<head>
    <title>Liste des oeuvre</title>
    <!-- Any necessary styling or meta tags -->
</head>
<body>
    <h1>Liste des oeuvres</h1>
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
              
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../Controller/oeuvreC.php');

            $controller = new oeuvreC();
            $oeuvre = $controller->listoeuvre();

            foreach ($oeuvre as $oeuvre) {
                echo "<tr>";
                echo "<td>" . $oeuvre['id_piece_doeuvre'] . "</td>";
                echo "<td>" . $oeuvre['titre'] . "</td>";
                echo "<td>" . $oeuvre['proprietaire'] . "</td>";
                echo "<td>" . $oeuvre['description'] . "</td>";
                echo "<td>" . $oeuvre['prix'] . "</td>";
                echo "<td>" . $oeuvre['support'] . "</td>";
                echo "<td>" . $oeuvre['etat'] . "</td>";
                echo "<td>" . $oeuvre['poids'] . "</td>";
                echo "<td>" . $oeuvre['image] . "</td>";
                echo "<td><a href='../View/deleteOeuvre.php?id=" . $oeuvre['ID'] . "'>delete</a></td>";
                echo "<td><a href='updateoeuvre.php?id=" . $oeuvre['ID'] . "'>update</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
