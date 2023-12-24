
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="../css/slick.css"/>

        <link href="../css/tooplate-little-fashion.css" rel="stylesheet">
        <style>
  

            table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}


/* Custom styling */
.custom-hr {
    border-top: 1px dashed #888; /* Dashed line with a different color */
    margin: 30px 0; /* Adjust vertical margin */
}

/* Style for table headers (th) */
th {
    background-color: #f2f2f2;
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

/* Style for table cells (td) */
td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}
.instyle {
	appearance: none;
	border: none;
	outline: none;
	border-bottom: .2em solid #E91E63;
	background: rgba(#E91E63, .2);
	border-radius: .2em .2em 0 0;
	padding: .4em;
	color: #E91E63;
}

/* Optional: Add some hover effect for better user experience */
tr:hover {
    background-color: #f5f5f5;
}
        </style>
    </head>
    <body>
    

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <hr class="custom-hr">
    <input type="text" name="target_deletion" id="target_deletion" placeholder="target_id" required>
    <input type="submit" name="deletion" class="custom-btn" value="Delete last account">
    </form>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <hr class="custom-hr">
    <input type="submit" name="list" class="custom-btn" value="Account list">
    </form>

<hr class="custom-hr">
    <?php 
    include '../Controller/utilisateurC.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $utilisateurc = new utilisateurC();    
    if (isset($_POST['list'])) {
        // Code to execute when the button is clicked
        $utilisateurc->listutilisateurs();
    }
    if (isset($_POST['deletion'])) {
        $submitted_id = intval($_POST['target_deletion']);
        // Code to execute when the button is clicked
        $utilisateurc->deleteutilisateur($submitted_id);
    }}
        
    
    
    
    
    
    ?>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/Headroom.js"></script>
    <script src="../js/jQuery.headroom.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/custom.js"></script>
    
    
    
        
    </body>
</html>
