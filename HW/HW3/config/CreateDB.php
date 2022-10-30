<?php

$dbHost = 'localhost';
$dbuser = 'root';
$dbPassword = 'root';
$monsterDB = "MonsterInsurance";

$db = mysqli_connect($dbHost, $dbuser, $dbPassword);
$dropDatabase =  "DROP DATABASE IF EXISTS MonsterInsurance";
mysqli_query($db, $dropDatabase);
if(!$conn = mysqli_select_db($db, $monsterDB)){
    echo("Failed to connect to MonsterInsurance database\n Attempting to create a database now...");
    $createQuery = "CREATE DATABASE " . $monsterDB;
    if(mysqli_query($db, $createQuery)){
        // echo("Successfuly made a MonsterInsurance DB");
        $createTable = "CREATE TABLE Policy(policyID int, 
                                            policyTypeID int,
                                            policyName varchar(20),
                                            email varchar(20),
                                            duration int, 
                                            description varchar(100))";
        $createTable2 = "create table PolicyType(policyTypeID int,
                                            policyTypeName varchar(20))";
        
        $db = mysqli_connect($dbHost, $dbuser, $dbPassword, $monsterDB);
        if(!mysqli_query($db,$createTable) || !mysqli_query($db, $createTable2)){
            echo mysqli_error($db);
        }
        echo("Table Created Success");
    }
    else{
        echo("Failed to make db");
    }
}
echo("Connection success");


// MAKE DUMMY DATA
$createPolicyType1 = "INSERT INTO PolicyType (policyTypeID, policyTypeName) VALUES (1, 'Lair')";
$createPolicyType2 = "INSERT INTO PolicyType (policyTypeID, policyTypeName) VALUES (2, 'Magical Accident')";
$createPolicy1 = "INSERT INTO Policy (policyID, policyTypeID, policyName, email, duration, description) 
                  VALUES (1, 1, 'Coffin Relocation', 'jonsay157@gmail.com', 5, 'This is a funny description')";
$createPolicy2 = "INSERT INTO Policy (policyID, policyTypeID, policyName, email, duration, description) 
                  VALUES (2, 2, 'Silver Bullet', 'jh3209@gmail.com', 50, 'This is a cool description')";

mysqli_query($db,$createPolicyType1);
mysqli_query($db,$createPolicyType2);
mysqli_query($db,$createPolicy1);
mysqli_query($db,$createPolicy2);


// WORK ON QUERYING DATABASE AND INSERTING INTO DATABSE FROM MODEL 
// CONNECT THE MODEL TO THE POLCYTYPECONTROLLER
