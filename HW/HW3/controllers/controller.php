<?php
namespace group\hw3\controllers;

/**
 * Job of the controller is to be able to handle requests from client and use that 
 * request to call certain model function then call view function to render that page 
 * 
 * Client requests --> POST, GET $_POST and $_GET array variables used to see what the client entered 
 */
abstract class Controller{
    private $model;             //Model object used to initiate database functions
    private $view;              //View object used to call view functions to render

    /**
     * Class Constructor that creates the controller with 
     * model and view instance variables initialized 
     */
    function __construct($model, $view){
        $this->model = $model;
        $this->view = $view;
        
    }

    function render(){
            
    }

}