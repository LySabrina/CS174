<?php
namespace group\hw3\controllers;
require_once("controllers/Controller.php");

class PolicyTypeController extends Controller{
    function __construct($model, $view)
    {
        parent::__construct($model, $view);
    }

    function processRequest($policyName)
    {
        
        $model = $this->getModel(); //model->insertPolicyType($policyName);
        $model->insertPolicyType($policyName);
    }

    function renderView(){
        $view = parent::getView();
        $view->renderView();
    }
}