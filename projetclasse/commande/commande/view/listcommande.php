<?php
include '../Controller/CommandeC.php';
include '../Model/Commande.php';

$error = "";

// create an instance of the controller
$commandeC = new CommandeC();

// Get the list of commands
$commandes = $commandeC->listCommandes();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Display</title>
    <style>
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('blanc.avif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(5px);
            z-index: -1;
        }

        table {
            margin-top: 20px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
        }

        table,
        th,
        td {

            border-collapse: collapse;
            border-radius: 10px;
            /* Ajout d'une bordure arrondie */
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 2px solid black;
            /* Ajout d'une bordure solide */
        }

        th {
            background-color: #f2f2f2;
            /* Couleur de fond pour les cellules d'en-tête */
        }

        button {
            /* Ajoutez d'autres styles au besoin */
            background-color: black;
            /* Couleur de fond du bouton */
            color: white;
            /* Couleur du texte du bouton */
            padding: 10px 20px;
            /* Espacement du contenu du bouton */
            border: none;
            /* Supprime la bordure par défaut */
            cursor: pointer;
            /* Change le curseur au survol du bouton */
            transition: background-color 0.3s ease;
            /* Ajout d'une transition pour une animation en douceur */
        }

        button:hover {
            background-color: grey;
            /* Nouvelle couleur de fond au survol du bouton */
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="background-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
        crossorigin="anonymous">
        <button onclick="window.location.href='addcommande.php';">ajouter commande</button>
        <button onclick="window.location.href='deletecommande.php';">supprimer commande</button>
        <button onclick="window.location.href='updatecommande.php';">modifier commande</button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <!-- Display the list of commands -->
    <h1><center><font color="black">Liste des commandes</font></center></h1>
    <center>
        <table border="0">
            <tr>
                <th>ID Commande</th>
                <th>Prix Total</th>
                <th>Description</th>
                <th>Nombre d'Articles</th>

            </tr>
            <?php foreach ($commandes as $commande) { ?>
                <tr>
                    <td><?= $commande['id_cmd']; ?></td>
                    <td><?= $commande['prix_total']; ?></td>
                    <td><?= $commande['description']; ?></td>
                    <td><?= $commande['nbr_article']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </center>
    <br>

    <h1>Tri de la liste</h1>

    <label for="sortOrder">Choisissez l'ordre de tri :</label>
    <select id="sortOrder" onchange="sortTable()">
        <option value="asc">prix croissant</option>
        <option value="desc">prix décroissant</option>
    </select>

    <script>
    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector('table');
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[1]; // Utilise la colonne "Prix Total"
                y = rows[i + 1].getElementsByTagName("TD")[1];

                var xValue = parseFloat(x.innerHTML.replace(',', '.')); // Convertit le texte en nombre
                var yValue = parseFloat(y.innerHTML.replace(',', '.'));

                if (document.getElementById("sortOrder").value === "asc") {
                    if (xValue > yValue) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (document.getElementById("sortOrder").value === "desc") {
                    if (xValue < yValue) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>


</body>

</html>