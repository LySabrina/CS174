<?php
namespace group\hw3;

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

    function insertPolicy($data){
        if(!(mysqli_query($this->db, $data))){
            echo("error");
            exit();
        }
        else{
            echo('sucess');
        }
    }

  
}