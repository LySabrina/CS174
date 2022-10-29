<?php
namespace group\hw3\controllers;

class LandingController extends Controller{

    function __construct($model, $view)
    {
        parent::__construct($model, $view);
    }

    function processRequest($data){
        $view = parent::getView();
        $view->renderView();
    }
}