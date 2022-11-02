<?php

namespace group\hw3\controllers;
use group\hw3\controllers\Controller;
use group\hw3\models\Model;
use group\hw3\views\DisplayPolicyPage;
use group\hw3\views\NewPolicyPage;

require_once("views/NewPolicyPage.php");
require_once("views/DisplayPolicyPage.php");
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

        if($_REQUEST['method'] == 'save'){            
            
            $_SESSION['title'] = $_REQUEST['title'];
            $_SESSION['agentEmail'] = $_REQUEST['agentEmail'];
            $_SESSION['duration']= $_REQUEST['duration'];
            $_SESSION['details']= $_REQUEST['details'];   
            $_SESSION['parentPolicyType'] = $_REQUEST['parentPolicyType'];

            if(filter_var($_SESSION['agentEmail'], FILTER_VALIDATE_EMAIL) == false
                         || filter_var($_SESSION['duration'], FILTER_VALIDATE_INT) == false)
           {
                $_SESSION['failed'] = 1;
                header("Location: index.php?c=PolicyController&m=showForm&arg1=" . $_SESSION['parentPolicyType']);                
           }
           else{
            unset($_SESSION['failed']);
            header("Location: index.php?c=PolicyTypeController&m=showPolicyTypePage&arg1=" . $_SESSION['parentPolicyType']);
           }
            

        }
        else if($_REQUEST['method'] == 'insert'){
            $title = $_REQUEST['title'];
            $agentEmail = $_REQUEST['agentEmail'];
            $duration = $_REQUEST['duration'];
            $description = $_REQUEST['details'];   
            $parentPolicyType = $_REQUEST['parentPolicyType'];

          
            if(filter_var($agentEmail, FILTER_VALIDATE_EMAIL) == false
                || filter_var($duration, FILTER_VALIDATE_INT) == false)
            {
                $_SESSION['title'] = $_REQUEST['title'];
                $_SESSION['agentEmail'] = $_REQUEST['agentEmail'];
                $_SESSION['duration']= $_REQUEST['duration'];
                $_SESSION['details']= $_REQUEST['details'];   
                $_SESSION['parentPolicyType'] = $_REQUEST['parentPolicyType'];
                $_SESSION['failed'] = 1;
                header("Location: index.php?c=PolicyController&m=showForm&arg1=" . $parentPolicyType);                
            }
            else{
                unset($_SESSION['failed']);
                unset($_SESSION['title']);
                unset($_SESSION['agentEmail']);
                unset($_SESSION['duration']);
                unset($_SESSION['details']);

                $model->insertPolicy($title, $parentPolicyType, $agentEmail, $duration, $description);
                header("Location: index.php?c=PolicyController&m=showPolicyInformation&arg1=" . $title);    
                }
            
            
        }
        else if($_REQUEST['method'] == 'delete'){
            
            $model->deletePolicy($_REQUEST['arg1']);
            $parentPolicyType = $_REQUEST['arg2'];
            header("Location: index.php?c=PolicyTypeController&m=showPolicyTypePage&arg1=" . $parentPolicyType);
        }
    }

    function showPolicyInformation(){
        $view = new DisplayPolicyPage();
        $model = new Model();
        $policyName = $_REQUEST['arg1'];
        $policyInfo = $model->getPolicy($policyName);
        $model->updatePolicyViewCount($policyName);
        $view->renderView($policyInfo);
    }   
}