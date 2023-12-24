<?php

$username = "root";
$password = "";
$database = new
PDO("mysql:host=localhost; dbname=reservationdb;charset=utf8;",$username,$password);

 if($database){

    echo 'Connexion avec succés';
 }

?>