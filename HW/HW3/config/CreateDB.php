<?php

$dbHost = 'localhost';
$dbuser = 'root';
$dbPassword = 'root';
$monsterDB = "MonsterInsurance";

$db = new mysqli($dbHost, $dbuser, $dbPassword);
$dropDatabase =  "DROP DATABASE IF EXISTS MonsterInsurance";
mysqli_query($db, $dropDatabase);
if(!$conn = mysqli_select_db($db, $monsterDB)){
    echo("Failed to connect to MonsterInsurance database\n Attempting to create a database now...");
    $createQuery = "CREATE DATABASE " . $monsterDB;
    if(mysqli_query($db, $createQuery)){
        $db = mysqli_connect($dbHost, $dbuser, $dbPassword, $monsterDB);
        // echo("Successfuly made a MonsterInsurance DB");


        // TO DO : FIGURE OUT WHY ID VALUES ARE BEING SKIPPED WHEN ADDING DUPLICATES


        $createPolicyTypeTable = "create table PolicyType(policyTypeID int NOT NULL AUTO_INCREMENT,
                                                        policyTypeName varchar(20),
                                                        PRIMARY KEY (policyTypeID),
                                                        CONSTRAINT constraint_name UNIQUE (policyTypeName)
                                                        )";
        if(!mysqli_query($db, $createPolicyTypeTable)){
            echo mysqli_error($db);
        }
        echo("Policy Type Table Created");
        $createPolicyTable = "create table Policy(policyID int NOT NULL AUTO_INCREMENT, 
                                                policyName varchar(20),
                                                policyTypeID int,
                                                email varchar(20),
                                                duration int, 
                                                details varchar(100),
                                                PRIMARY KEY (policyID),
                                                CONSTRAINT FOREIGN KEY (policyTypeID) REFERENCES PolicyType(policyTypeID) ON DELETE CASCADE ON UPDATE CASCADE,
                                                CONSTRAINT constraint_name UNIQUE (policyName)
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
$createPolicy = $db->prepare("INSERT INTO Policy(policyName, policyTypeID, email, duration, details) VALUES (?,?,?,?,?)");
$createPolicy->bind_param("sisis", $policyName, $policyTypeID, $email, $duration, $details);
$policyName = 'Coffin Relocation';
$policyTypeID = 1;
$email = 'jonsay157@gmail.com';
$duration = 5;
$details = 'This is a funny description';
$createPolicy->execute();
$policyName = 'Silver Bullet';
$policyTypeID = 2;
$email = 'jh3209@gmail.com';
$duration = 50;
$details = 'This is a cool description';
$createPolicy->execute();
$createPolicy->close();




// WORK ON QUERYING DATABASE AND INSERTING INTO DATABSE FROM MODEL 
// CONNECT THE MODEL TO THE POLCYTYPECONTROLLER
