<?php

namespace group\hw3\controllers;
use group\hw3\controllers\Controller;
use group\hw3\models\Model;
use group\hw3\views\DisplayPolicyPage;
use group\hw3\views\NewPolicyPage;

require_once("views/NewPolicyPage.php");
require_once("models/Model.php");
class PolicyController implements Controller{

    function __construct(){
        
    }
    
    function showForm(){
        $view = new NewPolicyPage();
        $view->renderView();
    }

    function processRequest(){
        $model = new Model();

        if($_REQUEST['method'] == 'update'){

        }
        else if($_REQUEST['method'] == 'insert'){
            $title = $_REQUEST['title'];
            $agentEmail = $_REQUEST['agentEmail'];
            $duration = $_REQUEST['duration'];
            $description = $_REQUEST['description'];   
        }
    }

    function showPolicyInformation(){
        $view = new DisplayPolicyPage();
        $model = new Model();
        $policyName = $_REQUEST['arg1'];
        $policyInfo = $model->getPolicy($policyName);
        $view->renderView($policyInfo);
    
    }
    
    
}