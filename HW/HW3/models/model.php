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
            exit();
        }
    }


    // SHOULD WORK BUT NOT TESTED
    function insertPolicy($policyNameToAdd, $policyTypeNameToAdd, $emailToAdd, $durationToAdd, $descriptionToAdd){
        $createPolicy = $this->$db->prepare("INSERT INTO Policy(policyName, policyTypeID, email, duration, details) VALUES (?,?,?,?,?)");
        $createPolicy->bind_param("sisis", $policyName, $policyTypeID, $email, $duration, $details);
        
        
        $policyTypeID = $this->getPolicyTypeIDFromPolicyTypeName($policyTypeNameToAdd);
        if($policyTypeID != 0) {
            $policyName = $policyNameToAdd;
            $email = $emailToAdd;
            $duration = $durationToAdd;
            $details = $descriptionToAdd;
            $createPolicy->execute();
            $createPolicy->close();
        }
        else {
            $createPolicy->close();
        }
    }


    // SHOULD WORK BUT NOT TESTED
    function deletePolicy($policyToDelete){
        $deletePolicy = $this->db->prepare("DELETE FROM Policy WHERE policyName = ?");
        $deletePolicy->bind_param("s", $policyName);
        $policyName = $policyToDelete;
        $deletePolicy->execute();
        $deletePolicy->close();
    }


    //FIX THISSS
    function getPolicy($policyName){
        $query = "SELECT * from Policy, PolicyType where Policy.policyTypeID = PolicyType.policyTypeID AND Policy.policyName =" . "'" . $policyName . "'";
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_array($result);
        return $row;
    }


    function getAllPolicy(){
        $query = "SELECT policyName from Policy";
        $results = mysqli_query($this->db,$query);
        $num_rows = mysqli_num_rows($results);
        $arr = [];
        for($j = 0; $j < $num_rows; $j++){
            $row = mysqli_fetch_array($results);
            $arr[$j] = $row;
        }
        return $arr;
    }


    // WORKS
    function insertPolicyType($policyTypeNameToAdd){
        $createPolicyType = $this->db->prepare("INSERT INTO PolicyType(policyTypeName) VALUES (?)");
        $createPolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeNameToAdd;
        $createPolicyType->execute();
        $createPolicyType->close();
    }


    // WORKS
    function deletePolicyType($policyTypeToDelete){
        $deletePolicyType = $this->db->prepare("DELETE FROM PolicyType WHERE policyTypeName = ?");
        $deletePolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToDelete;
        $deletePolicyType->execute();
        $deletePolicyType->close();
    }
    

    // WORKS
    function getPolicyType($policyTypeToGet){
        $getPolicyType = $this->db->prepare("SELECT policyTypeName FROM PolicyType WHERE policyTypeName = ? LIMIT 1");
        $getPolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToGet;
        $getPolicyType->execute();
        $getPolicyType->bind_result($policyTypeName);
        $returnMe = null;
        while($getPolicyType->fetch()) {
            $returnMe = $policyTypeName;
        }
        echo $returnMe;
        return $returnMe;
    }


    function getAllPolicyType(){
        $query = "SELECT policyTypeName from PolicyType";
        //db is the connection
        $results = mysqli_query($this->db, $query);
        $num_rows = mysqli_num_rows($results);
        $arr = [];  
        for($j = 0; $j <$num_rows; $j++){
            $row = mysqli_fetch_array($results);
            $arr[$j] = $row;
        }
        return $arr;
    }


    function getAllPolicyNamesFromPolicyType($policyTypeNameToGet) {
        $getAllPolicyNamesFromPolicyType = $this->db->prepare("SELECT policyName FROM Policy WHERE policyTypeID = ?");
        $getAllPolicyNamesFromPolicyType->bind_param("i", $policyTypeIDToGet);

        $policyTypeIDToGet = $this->getPolicyTypeIDFromPolicyTypeName($policyTypeNameToGet);
        echo $policyTypeIDToGet;
        if($policyTypeIDToGet != 0) {
            $getAllPolicyNamesFromPolicyType->execute();
            $getAllPolicyNamesFromPolicyType->bind_result($policyName);
            $returnMe = null;
            while($getAllPolicyNamesFromPolicyType->fetch()) {
                $returnMe = $policyName;
                // echo $returnMe;
                yield $returnMe;
            }
        }
        else {
            $getAllPolicyNamesFromPolicyType->close();
        }
    }


    // HELPER FUNCTION
    // WORKS
    function getPolicyTypeIDFromPolicyTypeName($policyTypeNameToGet){
        $getPolicyTypeIDFromPolicyTypeName = $this->db->prepare("SELECT policyTypeID FROM PolicyType WHERE policyTypeName = ? LIMIT 1");
        $getPolicyTypeIDFromPolicyTypeName->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeNameToGet;
        $getPolicyTypeIDFromPolicyTypeName->execute();
        $getPolicyTypeIDFromPolicyTypeName->bind_result($id);
        $returnMe = 0;
        while($getPolicyTypeIDFromPolicyTypeName->fetch()) {
            $returnMe = $id;
        }
        // echo $returnMe;
        return $returnMe;
    }
}