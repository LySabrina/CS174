<?php
namespace group\hw3\controllers;
require_once("views/View.php");
require_once("models/Model.php");
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
    function getModel(){
        return $this->model;
    }

    function getView(){
        return $this->view;
    }


    //what is render() function?
    function render($data){
        return $data;
    }

//    abstract function processRequest($data);
   

}