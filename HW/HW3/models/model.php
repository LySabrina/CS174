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


    // function insertPolicy($policyName, $policyTypeName, $email, $duration, $description){
    //     if(!(mysqli_query($this->db, $data))){
    //         echo("error");
    //         exit();
    //     }
    //     else{
    //         echo('success');
    //     }
    // }


    private function getPolicyTypeIDFromName($policyTypeToGet){
        $getPolicyTypeIDFromName = $this->db->prepare("SELECT policyTypeID FROM PolicyType WHERE policyTypeName = ? LIMIT 1");
        $getPolicyTypeIDFromName->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToGet;
        $getPolicyTypeIDFromName->execute();
        $getPolicyTypeIDFromName->bind_result($id);
        while($getPolicyTypeIDFromName->fetch()) {
            return $id;
        }
 

        return 10;


        // $getPolicyTypeIDFromName->close();
    }


    function deletePolicy($data){
        if(!(mysqli_select_db($this->db, $data))){
            echo("error in deleting");
            exit();
        }
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
        $getPolicyType = $this->db->prepare("SELECT * FROM PolicyType WHERE policyTypeName = ?");
        $getPolicyType->bind_param("s", $policyTypeName);
        $policyTypeName = $policyTypeToGet;
        $getPolicyType->execute();
        $result = $getPolicyType->get_result();
        $getPolicyType->close();
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