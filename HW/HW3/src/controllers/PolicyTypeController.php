<?php
namespace group\hw3\controllers;


use group\hw3\views\NewPolicyTypePage;
use group\hw3\models\Model;
use group\hw3\views\PolicyTypePage;

require_once("controllers/Controller.php");
require_once("views/NewPolicyTypePage.php");
require_once("views/DisplayPolicyPage.php");
require_once("views/PolicyTypePage.php");
require_once("models/Model.php");

class PolicyTypeController implements Controller{
    function __construct()
    {
        
    }

    function showForm(){
        $view = new NewPolicyTypePage();
        $view->renderView();

    }

    function showPolicyTypePage(){
        $view = new PolicyTypePage();
        $model = new Model();

        $policyType = $_REQUEST['arg1'];

        $allPolicyTypes = $model->getAllPolicyType();

        $policies = $model->getAllPolicyNamesFromPolicyType($policyType);

        $view->renderView($allPolicyTypes, $policies);
    }

    function processRequest(){
        $policyTypeName = $_REQUEST['typeName'];
        $model = new Model();
        $model->insertPolicyType($policyTypeName);
        header("Location: index.php");
    }

    function deletePolicyType(){
        $model = new Model();
        $policyType = $_REQUEST['arg1'];
        $model->deletePolicyType($policyType);
        header("Location: index.php");

    }
}