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
        $db = mysqli_connect($dbHost, $dbuser, $dbPassword, $monsterDB);
        // echo("Successfuly made a MonsterInsurance DB");


        // TO DO : ADD CONSTRAINT FOR NO DUPLICATES


        $createPolicyTypeTable = "create table PolicyType(policyTypeID int NOT NULL AUTO_INCREMENT,
                                                        policyTypeName varchar(20),
                                                        PRIMARY KEY (policyTypeID)
                                                        )";
        if(!mysqli_query($db, $createPolicyTypeTable)){
            echo mysqli_error($db);
        }
        echo("Policy Type Table Created");
        $createPolicyTable = "create table Policy(policyID int NOT NULL AUTO_INCREMENT, 
                                                policyTypeID int,
                                                policyName varchar(20),
                                                email varchar(20),
                                                duration int, 
                                                details varchar(100),
                                                PRIMARY KEY (policyID),
                                                CONSTRAINT FOREIGN KEY (policyTypeID) REFERENCES PolicyType(policyTypeID) ON DELETE CASCADE ON UPDATE CASCADE
                                            )";
        if(!mysqli_query($db,$createPolicyTable)){
            echo mysqli_error($db);
        }
        echo("Policy Table Created");
    }
    else{
        echo("Failed to make db");
    }
}
echo("Connection success");


// MAKE DUMMY DATA FOR POLICYTYPE
$createPolicyType = $db->prepare("INSERT INTO PolicyType(policyTypeName) VALUES (?)");
$policyTypeNames = ["Lair", "Magical Accident"];
foreach($policyTypeNames as $policyTypeName) {
    $createPolicyType->bind_param("s", $policyTypeName);
    $createPolicyType->execute();
}
$createPolicyType->close();


// TEST DELETE DUMMY DATA FOR POLICYTYPE

// $deletePolicyType = $db->prepare("DELETE FROM PolicyType WHERE policyTypeName = ?");
// $deletePolicyType->bind_param("s", $policyTypeName);
// $policyTypeName = "Magical Accident";
// $deletePolicyType->execute();
// $deletePolicyType->close();


// MAKE DUMMY DATA FOR POLICY
$createPolicy = $db->prepare("INSERT INTO Policy(policyTypeID, policyName, email, duration, details) VALUES (?,?,?,?,?)");
$createPolicy->bind_param("issis", $policyTypeID, $policyName, $email, $duration, $details);
$policyTypeID = 1;
$policyName = 'Coffin Relocation';
$email = 'jonsay157@gmail.com';
$duration = 5;
$details = 'This is a funny description';
$createPolicy->execute();
$policyTypeID = 2;
$policyName = 'Silver Bullet';
$email = 'jh3209@gmail.com';
$duration = 50;
$details = 'This is a cool description';
$createPolicy->execute();
$createPolicy->close();




// WORK ON QUERYING DATABASE AND INSERTING INTO DATABSE FROM MODEL 
// CONNECT THE MODEL TO THE POLCYTYPECONTROLLER
