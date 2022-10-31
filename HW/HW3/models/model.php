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

    function insertPolicy($data){
        if(!(mysqli_query($this->db, $data))){
            echo("error");
            exit();
        }
        else{
            echo('sucess');
        }
    }

    function deletePolicy($data){
        if(!(mysqli_select_db($this->db, $data))){
            echo("error in deleting");
            exit();
        }
    }

    function deletePolicyType($data){
        if(!(mysqli_select_db($this->db, $data))){
            echo("error in deleting");
            exit();
        }
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

    function getPolicyType($policyType){
        
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

    //FIX THISSS
    function getPolicy($policyName){
        $query = "SELECT * from Policy, PolicyType where Policy.policyTypeID = PolicyType.policyTypeID AND Policy.policyName =" . $policyName;
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_array($result);
        return $row;
    }
}