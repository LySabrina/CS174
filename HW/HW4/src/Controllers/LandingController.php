<?php
namespace group\hw4\Controllers;    
use group\hw4\Models\QuizModel;
use group\hw4\Views\LandingPage;



class LandingController{
    
    function __construct()
    {
        
    }

    function processRequest(){
        $view = new LandingPage();
        $view->renderView();
    }

    
    

}