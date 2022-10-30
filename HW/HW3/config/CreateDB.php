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
        $createTable = "create table Policy(policyID int NOT NULL AUTO_INCREMENT, 
                                            policyTypeID int,
                                            policyName varchar(20),
                                            email varchar(20),
                                            duration int, 
                                            description varchar(100),
                                            PRIMARY KEY (policyID)
                                            )";
        $createTable2 = "create table PolicyType(policyTypeID int NOT NULL AUTO_INCREMENT,
                                                 policyTypeName varchar(20),
                                                 PRIMARY KEY (policyTypeID)
                                                )";
        
        $db = mysqli_connect($dbHost, $dbuser, $dbPassword, $monsterDB);
        if(!mysqli_query($db,$createTable) || !mysqli_query($db, $createTable2)){
            echo mysqli_error($db);
        }
        echo("Tables Created Success");
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


// POLICY TABLE STUFF

// $createPolicy = $db->prepare("INSERT INTO Policy(policyTypeID, policyName, email, duration, description) VALUES (?,?,?,?,?)");
// $createPolicyType->bind_param("issis", $policyTypeID, $policyName, $email, $duration, $description);
// $policyTypeID = 1;
// $policyName = 'Coffin Relocation';
// $email = 'jonsay157@gmail.com';
// $duration = 5;
// $description = 'This is a funny description';
// $createPolicy->execute();
// $policyTypeID = 2;
// $policyName = 'Silver Bullet';
// $email = 'jh3209@gmail.com';
// $duration = 50;
// $description = 'This is a cool description';
// $createPolicy->execute();
// $createPolicy->close();


// $createPolicyType1 = "INSERT INTO PolicyType (policyTypeName) VALUES ('Lair')";
// $createPolicyType2 = "INSERT INTO PolicyType (policyTypeName) VALUES ('Magical Accident')";
// $createPolicy1 = "INSERT INTO Policy (policyTypeID, policyName, email, duration, description) VALUES (1, 'Coffin Relocation', 'jonsay157@gmail.com', 5, 'This is a funny description')";
// $createPolicy2 = "INSERT INTO Policy (policyTypeID, policyName, email, duration, description) VALUES (2, 'Silver Bullet', 'jh3209@gmail.com', 50, 'This is a cool description')";

// mysqli_query($db,$createPolicyType1);
// mysqli_query($db,$createPolicyType2);
// mysqli_query($db,$createPolicy1);
// mysqli_query($db,$createPolicy2);




// WORK ON QUERYING DATABASE AND INSERTING INTO DATABSE FROM MODEL 
// CONNECT THE MODEL TO THE POLCYTYPECONTROLLER
