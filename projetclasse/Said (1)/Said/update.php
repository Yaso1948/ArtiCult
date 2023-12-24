<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
    try {
        // connect to mysql
        $pdoConnect = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
        $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
   
   // get values form input text and number
   
   $id = $_POST['id'];
   $fname = $_POST['fnameR'];
   $lname = $_POST['lnameR'];
   $age = $_POST['etat'];
           
   // mysql query to Update data
   $query = "UPDATE `reservv` SET `fnameR`='".$fnameR."',`lnameR`='".$lnameR."',`etat`= $etat WHERE `id` = $id";
   
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP UPDATE DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="validation.js"></script>


    </head>

    <body>

        <form action="updatee.php" method="post">

            ID To Update: <input type="text" name="id" required><br><br>

            New reclamation refernce:<input type="text" name="fnameR" required><br><br>

            New reservation refernce:<input type="text" name="lnameR" required><br><br>

            New Etar DECLARATION:<input type="text" name="etat" required><br><br>

            <input type="submit" name="update" value="Update Data">

        </form>

    </body>


</html>
