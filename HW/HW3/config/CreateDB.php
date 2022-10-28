<?php

$dbHost = 'localhost';
$dbuser = 'root';
$dbPassword = 'root';
$monsterDB = "MonsterInsurance";

$db = mysqli_connect($dbHost, $dbuser, $dbPassword);
if(!$conn = mysqli_select_db($db, $monsterDB)){
    // echo("Failed to connect to MonsterInsurance database\n Attempting to create a database now...");
    $createQuery = "CREATE DATABASE " . $monsterDB;
    if(mysqli_query($db, $createQuery)){
        // echo("Successfuly made a MonsterInsurance DB");
        $createTable = "CREATE TABLE Policy(policyTable varchar(20), 
                                            policyName varchar(20),
                                            email varchar(20),
                                            duration int, 
                                            description varchar(100))";
        $createTable2 = "create table PolicyType(policyType varchar(20))";
        
        $db = mysqli_connect($dbHost, $dbuser, $dbPassword, $monsterDB);
        if(!mysqli_query($db,$createTable) || !mysqli_query($db, $createTable2)){
            echo mysqli_error($db);
        }
        echo("Success");
    }
    else{
        echo("Failed to make db");
    }
}

// WORK ON QUERYING DATABASE AND INSERTING INT ODATABSE FROM MODEL 
// CONNECT THE MODEL TO THE POLCYTYPECONTROLLER
