
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- Styles CSS ici -->
    <style>
    
    body {
        background: url('../asset/sss.jpg') center/cover no-repeat;
        color: #333333;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333333;
        padding: 20px;
        text-align: center;
    }

    header img {
        background-color: transparent;
        border-radius: 50%;
    }

    h1 {
        position: relative;
        text-align: center;
        color: #353535;
        font-size: 50px;
        font-family: "Cormorant Garamond", serif;
    }

    p {
        font-family: 'Lato', sans-serif;
        font-weight: 300;
        text-align: center;
        font-size: 18px;
        color: #676767;
    }

    .frame {
        width: 90%;
        margin: 40px auto;
        text-align: center;
    }

    .custom-btn {
        width: 130px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: linear-gradient(0deg, rgba(255, 151, 0, 1) 0%, rgba(251, 75, 2, 1) 100%);
        border: none;
        z-index: 1;
        margin: 20px;
        position: relative;
    }

    .custom-btn:after {
        position: absolute;
        content: "";
        width: 100%;
        height: 0;
        bottom: 0;
        left: 0;
        z-index: -1;
        background-color: rgba(251, 75, 2, 1);
        box-shadow:
            -7px -7px 20px 0px rgba(255, 255, 255, .9),
            -4px -4px 5px 0px rgba(255, 255, 255, .9),
            7px 7px 20px 0px rgba(0, 0, 0, .2),
            4px 4px 5px 0px rgba(0, 0, 0, .3);
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        color: rgba(251, 75, 2, 1);
    }

    .custom-btn:hover:after {
        top: auto;
        bottom: 0;
        height: 100%;
    }

    .custom-btn:active {
        top: 2px;
    }

    h2 {
        color: #000000;
        font-size: 24px;
    }

    form {
        margin-bottom: 20px;
    }

    #sitemap-section {
        text-align: center;
        padding: 20px;
        background-color: #333333;
        color: #FFFFFF;
    }

    .articult-title span {
        font-size: 36px;
        font-weight: bold;
    }

    .articult-title span:first-of-type {
        color: orange;
    }

    .navbar {
        background-color: #333333;
        padding: 20px;
        text-align: center;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar img {
        max-height: 50px;
    }

    .navbar a {
        color: #FFFFFF;
        text-decoration: none;
        padding: 14px 16px;
        border-bottom: 2px solid transparent;
        transition: border-bottom 0.3s ease-in-out;
        font-family: 'Lato', sans-serif;
    }

    .navbar a:hover {
        border-bottom: 2px solid #FFA500;
    }

    .navbar-nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-nav li {
        margin-right: 20px;
    }

    select, button {
        padding:10px 25px;
        border: none;
        border-radius: 4px;
        margin-right: 10px;
        cursor: pointer;
    }

    select {
        background-color: #FFFFFF;
    }

    button {
        background-color: #FFA500;
        color: #000000;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .filter-buttons {
        text-align: center;
        margin-bottom: 20px;
    }

    .filter-button {
        background-color: #FFA500;
        color: #FFFFFF;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
        display: inline-block;
    }

    .filter-button:hover {
        background-color: #FF8C00;
    }

    .piece {
        background-color: #FFFFFF;
        padding: 20px;
        border: 1px solid #E0E0E0;
        border-radius: 8px;
        margin-bottom: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .add-oeuvre-button {
        display: inline-block;
        padding: 10px 20px;
        margin: 20px auto;
        text-decoration: none;
        background-color: #FFA500;
        color: #000000;
        border-radius: 4px;
        transition: background-color 0.2s ease-in-out;
    }

    .add-oeuvre-button:hover {
        background-color: #FFD700;
    }

    .piece:hover {
        transform: scale(1.05);
    }

    .piece img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease-in-out;
    }

    .piece:hover img {
        transform: scale(1.1);
    }

    .piece h3 {
        font-family: 'Georgia', serif;
        font-size: 24px;
        color: #800080;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .piece p {
        font-size: 16px;
        color: #333333;
        font-style: italic;
    }

    .pagination {
        text-align: center;
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
    }

    .pagination a {
        display: inline-block;
        padding: 8px 12px;
        margin: 0 5px;
        text-decoration: none;
        color: #FFA500;
        font-size: 16px;
        transition: font-size 0.2s ease-in-out;
    }

    .pagination a:hover {
        font-size: 18px;
    }

    .white-text {
        color: white;
    }
</style>



</head>
<body>
<header>
        <img src="../asset/logo.png" alt="Logo" width="150" height="150">
    </header>
    <h1>Bienvenue sur notre Galerie d'Art</h1>
    <a href='../backend/accounts.php'>accounts</a>
    <a href='../backend/galerie.php'>Gallery</a>
    <h2>Toutes les Œuvres</h2>

    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="tri">Trier par prix:</label>
        <select name="tri" id="tri">
            <option value="asc">Croissant</option>
            <option value="desc">Décroissant</option>
        </select>
        <button type="submit">Trier</button>
    </form>

    <!-- Filter buttons for specific types -->
    <div class="filter-buttons">
    <button class="filter-button" onclick="filterByType(0)">Toutes les œuvres</button>
    <button class="filter-button" onclick="filterByType(1)">Peinture</button>
    <button class="filter-button" onclick="filterByType(2)">Sculpture</button>
    <button class="filter-button" onclick="filterByType(3)">Poterie</button>
</div>

    <div class="gallery">
   
<?php
include('../controller/categorieC.php');

// Instantiate the CategorieC class
$controller = new CategorieC();

// Items per page
$itemsPerPage = 10  ;

// Retrieve the total number of pieces
$totalPieces = $controller->getTotalPieces();
$totalPages = ceil($totalPieces / $itemsPerPage);

// Get the current page, default to 1
$current_page = isset($_GET['page']) ? max(1, $_GET['page']) : 1;

// Calculate the offset for the query
$offset = ($current_page - 1) * $itemsPerPage;

// Retrieve pieces of artwork with sorting option and pagination
$tri = isset($_GET['tri']) ? $_GET['tri'] : 'asc';
$pieces = $controller->getAllPiecesWithPagination($tri, $itemsPerPage, $offset);

// Check if there are no pieces
if (empty($pieces)) {
    echo "Il n'y a pas d'œuvre pour le moment.";
} else {
    // Display category, title, image, and price of all pieces
    foreach ($pieces as $piece) {
        echo "<div class='piece' data-type='" . htmlspecialchars($piece['category']) . "'>";
        
        // Map category numbers to corresponding names
        $categoryNames = [
            1 => 'Peinture',
            2 => 'Sculpture',
            3 => 'Poterie',
        ];
        
        $categoryName = isset($categoryNames[$piece['category']]) ? $categoryNames[$piece['category']] : 'Inconnu';
    
        echo "<p>Catégorie: " . htmlspecialchars($categoryName) . "</p>";
        echo "<h3><a href='view_oeuvre.php?id=" . htmlspecialchars($piece['id_piece_doeuvre']) . "'>" . htmlspecialchars($piece['titre']) . "</a></h3>";
        echo "<img src='" . htmlspecialchars($piece['image']) . "' alt='Image de l'œuvre' width='100'><br>";
        echo "<p>Prix: " . htmlspecialchars($piece['prix']) . "</p>";
        echo "</div>";
        echo "<br>";
    }

    // Display pagination links if there are more than one page
    if ($totalPages > 1) {
        echo "<div class='pagination'>";
        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($i == $current_page) ? "active" : "";
            echo "<a href='?page=$i&tri=$tri' class='page-link $activeClass'>$i</a>";
        }
        echo "</div>";
    }
}
?>



    </div>
    <a href="../View/addOeuvre.php" class="add-oeuvre-button">Ajouter une oeuvre</a>
 <script>
        function filterByType(type) {
            var pieces = document.getElementsByClassName('piece');
            for (var i = 0; i < pieces.length; i++) {
                var pieceType = pieces[i].getAttribute('data-type');
                if (type.toString() === pieceType || type === 0) {
                    pieces[i].style.display = 'block';
                } else {
                    pieces[i].style.display = 'none';
                }
            }
        }
    </script>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- ... (autres éléments de la barre de navigation) ... -->

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../../index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../../about.html">Story</a>
                    </li>

                    

                    <li class="nav-item">
                        <a class="nav-link" href="../../faq.html">FAQs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../../contact.html">Contact</a>
                    </li>
                </ul>

                <!-- ... (autres éléments de la barre de navigation, y compris la section PHP pour l'utilisateur connecté) ... -->
            </div>
        </div>
    </nav>

    <!-- ... (autres sections du contenu) ... -->

    <footer class="site-footer">
        <!-- ... (autres éléments du pied de page) ... -->
        <section id="sitemap-section"> <h1 class="articult-title">
    <span style="color: orange;">Art</span>
    <span style="color: white;">iCult</span>
</h1>
</section>

        <!-- ... (autres éléments du pied de page) ... -->
    </footer>

    <!-- ... (autres balises de script et de fermeture body/html) ... -->
</body>
</html>
