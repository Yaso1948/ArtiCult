<?php

// connect php to mysql database using PDO
// display data from mysql database

try {
    // trying to connect with mysqli database
    // put your hostname,your database name, user name (root by default)
    // and your password if you have one 

    $pdoConnect = new PDO("mysql:host=localhost;dbname=test_db","root","");
} catch (PDOException $exc) {

    // cath the onnection propleme

    echo $exc->getMessage();
    exit();
}

// result of the mysql select query

$pdoResult = $pdoConnect->query("SELECT * FROM reservv");

// displaying data from database mysql using foreach loop

foreach ($pdoResult as $row)
{
    echo "$row[0] - $row[1] - $row[2] - $row[3]<br>";
}