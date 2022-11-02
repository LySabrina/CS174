<?php
namespace group\hw3\controllers;
require_once("views/View.php");
require_once("models/Model.php");
/**
 * Job of the controller is to be able to handle requests from client and use that 
 * request to call certain model function then call view function to render that page 
 * 
 * This interface requires that all classes that wants to be a controller must define procesRuqest
 */
interface Controller{
    
     function processRequest();    

}