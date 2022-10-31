<?php

use group\hw3\controllers\Controller;

class PolicyController extends Controller{

    function __construct($model, $view){
        parent::__construct($model, $view);
    }
    
    function processRequest($data){
        ///so we gt a POST request and then we will have the type name. 
        if(isset($_POST['POLICY'])){
            $policyName = $_POST['POLICY'];       
        }
    }
}