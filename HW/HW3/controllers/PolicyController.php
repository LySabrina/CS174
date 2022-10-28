<?php
class PolicyController{

    function __construct(){
        
    }

    function processRequest(){
        ///so we gt a POST request and then we will have the type name. 
        if(isset($_POST['POLICY'])){
            $policyName = $_POST['POLICY'];
            
        }
    }
}