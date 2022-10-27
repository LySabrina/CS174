<?php
namespace group\hw3;

/**
 * Job of the controller is to be able to handle requests from client and use that 
 * request to call certain model function then call view function to render that page 
 * 
 * Client requests --> POST, GET $_POST and $_GET array variables used to see what the client entered 
 */
class Controller{
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
// $_POST['stuff']
//for calling pOST and get --> does inside index.php --> depending on the request call the controller
//controller will be the one to get that request and do the model and view function
    function mainController(){
        
    }
    /**
     * Function Controller used to call the landing view function
     */
    function landingController(){

    }

    function render(){

    }

}