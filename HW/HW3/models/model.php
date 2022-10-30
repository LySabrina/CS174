<?php
namespace group\hw3\models;

class Model{
    private $db;    
    function __construct()
    {
        $this->db = mysqli_connect('localhost', 'root', 'root');
        if($this->db == false){
            echo('failed to connect');
            exit();
        }
        $con = mysqli_select_db($this->db, "MonsterInsurance");
        if($con == false){
            echo("error");
        }
    }

    function insertPolicy($policyName, $policyTypeName, $email, $duration, $description){
        if(!(mysqli_query($this->db, $data))){
            echo("error");
            exit();
        }
        else{
            echo('success');
        }


        // $stmt =  $mysqli->stmt_init();
        // if ($stmt->prepare("SELECT FNAME, AGE FROM EMPLOYEE WHERE LNAME=? AND AGE > ?")) {
        //     $lnames = ["Smith", "Jones", "Pollett"];
        //     $min_age = 25;
        //     foreach($lnames as $lname) {
        //     $stmt->bind_param("si", $lname, $min_age); //s == string, i == int, d==double
        //     $stmt->execute();
        //     $stmt->bind_result($fname, $age);
        //     $i = 0;
        //     while($stmt->fetch()) {
        //         print("The {$i}th person I found with last name $lname and age greater than $min_age was  $fname, $age\n");
        //         $i++;
        //     }
        //     }
        //     $stmt->close();


    }


    function deletePolicy($data){

    }


    function getPolicy($data){

    }


    function insertPolicyType($policyTypeNameToAdd){
        $createPolicyType = $db->prepare("INSERT INTO PolicyType(policyTypeName) VALUES (?)");
        $createPolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeNameToAdd;
        $createPolicyType->execute();
        $createPolicyType->close();
    }
    

    function deletePolicyType($policyTypeToDelete){
        $deletePolicyType = $db->prepare("DELETE FROM PolicyType WHERE policyTypeName = ?");
        $deletePolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToDelete;
        $deletePolicyType->execute();
        $deletePolicyType->close();
    }
    
    function getPolicyType($policyTypeToGet){
        $getPolicyType = $db->prepare("SELECT * FROM PolicyType WHERE policyTypeName = ?");
        $getPolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToGet;
        $getPolicyType->execute();
        $getPolicyType->close();


        // $query = "SELECT policyTypeName from PolicyType";
        // //db is the connection
        // $results = mysqli_query($this->db, $query); //return an array?
        // if(is_array($results)){
        //     echo("is an array");
        // }
        // else{
        //     echo("not an array");
        // }
    }

  
}