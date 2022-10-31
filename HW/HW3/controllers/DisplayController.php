<?php
namespace group\hw3\controllers;
use group\hw3\controllers\Controller;

class DisplayController extends Controller{

    function __construct($model, $view)
    {
        parent::__construct($model, $view);
    }

    function processRequest($policyName){
        $model = parent::getModel();
        $view = parent::getView();

        $policyInfo = $model->getPolicy($policyName);

        $view->renderView($policyInfo);
    }

}