<?php
namespace group\hw3\controllers;

class Controller {
    private $controller;

    function __construct() {
        
    }


    /**
     * Main controller for handling requests to go to edit, detail, confirm or menu views
     */
    function mainController()
    {
        //if we get a request (either post or get with name ='a'), then if the value of 'a' is either edit, detail, 
        //or confirm then we call their respective controller. else call menuView() function
        // $view = (isset($_REQUEST['a']) && in_array($_REQUEST['a'], ['edit', 'detail', 'confirm'])) ? $_REQUEST['a'] . "Controller" : 'menuView';
        // $view();

        echo "Hello";
    }
}