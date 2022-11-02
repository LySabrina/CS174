<?php
namespace group\hw3\controllers;


use group\hw3\views\NewPolicyTypePage;
use group\hw3\models\Model;
use group\hw3\views\DisplayPolicyPage;
use group\hw3\views\PolicyTypePage;

require_once("controllers/Controller.php");
require_once("views/NewPolicyTypePage.php");
require_once("views/DisplayPolicyPage.php");
require_once("views/PolicyTypePage.php");
require_once("models/Model.php");

class PolicyTypeController{
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
        $allPolicyTypes = $model->getAllPolicyType();
        $allPolicies = $model->getAllPolicy();
        $view->renderView($allPolicyTypes, $allPolicies);
    }

    function processRequest(){
        $policyTypeName = $_REQUEST['typeName'];
        $model = new Model();
        $model->insertPolicyType($policyTypeName);
        header("Location: index.php");
    }

}