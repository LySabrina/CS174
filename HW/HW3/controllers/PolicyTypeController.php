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
        $query = "Insert into PolicyType (policyType) values(" ."'". $policyName . "'". ");";
        $model = $this->getModel();
        $model->insertPolicy($query);
     
    }
}