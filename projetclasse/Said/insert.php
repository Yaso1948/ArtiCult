<?php

// php insert data to mysql database using PDO

if(isset($_POST['insert']))
{
    try {
        // connect to mysql
        $pdoConnect = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
        $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }

    // get values from input text
    $fnameR = $_POST['fnameR'];
    $lnameR = $_POST['lnameR'];
    $etat = $_POST['etat'];

    try {
        // mysql query to insert data
        $pdoQuery = "INSERT INTO `reservv`(`fnameR`, `lnameR`, `etat`) VALUES (:fnameR, :lnameR, :etat)";
        $pdoResult = $pdoConnect->prepare($pdoQuery);
        
        // bind parameters
        $pdoResult->bindParam(":fnameR", $fnameR, PDO::PARAM_STR);
        $pdoResult->bindParam(":lnameR", $lnameR, PDO::PARAM_STR);
        $pdoResult->bindParam(":etat", $etat, PDO::PARAM_STR);

        $pdoExec = $pdoResult->execute();

        // check if mysql insert query successful
        if($pdoExec)
        {
            echo 'Data Inserted';
        } else {
            echo 'Data Not Inserted';
        }
    } catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
    }
}
?>
