<?php
namespace group\hw3\controllers;
use group\hw3\controllers\Controller;
use group\hw3\views\DisplayPolicyPage;

require_once("views/DisplayPolicyPage.php");
class DisplayController implements Controller{

    function __construct()
    {
        
    }

    function processRequest(){
        $view = new DisplayPolicyPage();
        $view->renderView();
        
    }

}