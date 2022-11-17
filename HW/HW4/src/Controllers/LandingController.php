<?php
namespace group\hw4\Controllers;    
use group\hw4\Models\QuizModel;
use group\hw4\Views\LandingPage;
require_once("src/Model/QuizModel");


class LandingController{
    
    function __construct()
    {
        $model = new QuizModel();
    }

    function processRequest(){
        $view = new LandingPage();
        $view->renderView();
    }

    
    

}