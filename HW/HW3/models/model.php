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


    function insertPolicy($policyNameToAdd, $policyTypeNameToAdd, $emailToAdd, $durationToAdd, $descriptionToAdd){
        $createPolicy = $this->$db->prepare("INSERT INTO Policy(policyName, policyTypeID, email, duration, details) VALUES (?,?,?,?,?)");
        $createPolicy->bind_param("sisis", $policyName, $policyTypeID, $email, $duration, $details);
        $policyName = $policyNameToAdd;


        // WIP
        $policyTypeID = getPolicyTypeIDFromName($policyTypeNameToAdd);


        $email = $emailToAdd;
        $duration = $durationToAdd;
        $details = $descriptionToAdd;
        $createPolicy->execute();
    }


    private function getPolicyTypeIDFromName($policyTypeNameToGet){
        $getPolicyTypeIDFromName = $this->db->prepare("SELECT policyTypeID FROM PolicyType WHERE policyTypeName = ? LIMIT 1");
        $getPolicyTypeIDFromName->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeNameToGet;
        $getPolicyTypeIDFromName->execute();
        $getPolicyTypeIDFromName->bind_result($id);
        while($getPolicyTypeIDFromName->fetch()) {
            return $id;
        }
        return 0;
    }


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


    function getAllPolicies(){
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


    function insertPolicyType($policyTypeNameToAdd){
        $createPolicyType = $this->db->prepare("INSERT INTO PolicyType(policyTypeName) VALUES (?)");
        $createPolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeNameToAdd;
        $createPolicyType->execute();
        $createPolicyType->close();
    }


    function deletePolicyType($policyTypeToDelete){
        $deletePolicyType = $this->db->prepare("DELETE FROM PolicyType WHERE policyTypeName = ?");
        $deletePolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToDelete;
        $deletePolicyType->execute();
        $deletePolicyType->close();
    }
    

    // WIP
    function getPolicyType($policyTypeToGet){
        $getPolicyType = $this->db->prepare("SELECT * FROM PolicyType WHERE policyTypeName = ? LIMIT 1");
        $getPolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToGet;
        $getPolicyType->execute();
        $getPolicyType->bind_result($policyTypeName);
        while($getPolicyTypeIDFromName->fetch()) {
            return $policyTypeName;
        }
        return null;
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
}