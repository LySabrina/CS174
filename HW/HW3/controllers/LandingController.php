<?php
namespace group\hw3\controllers;

class LandingController extends Controller{

    function __construct($model, $view)
    {
        parent::__construct($model, $view);
    }


    /**
     * LandingController is getting a GET Request, we should call the model functions to get the data 
     * then calls the correct view 
     */
    function renderView(){
        $view = parent::getView();
        $model = parent::getModel();
        $arrPolicyType = $model->getAllPolicyType();
        $arrPolicy = $model->getAllPolicy();
        $view->renderView($arrPolicyType, $arrPolicy);
    }


}   