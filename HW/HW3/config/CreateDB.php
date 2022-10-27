<?php
$db = mysqli_connect("localhost", "root", "root"); //start a connection with the database

if($db == false){
    echo("Failed to connect to a database");
}
$create_query = "CREATE DATABASE Insurance";
$result = mysqli_query($db, $create_query);
if(!$result){
    echo("Failed to create a database");
}



mysqli_close($db);      //close the connection to the database