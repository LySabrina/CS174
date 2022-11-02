<?php
namespace group\hw3;

require_once("controllers/LandingController.php");
require_once("controllers/DisplayController.php");
require_once("controllers/PolicyTypeController.php");
require_once("controllers/PolicyController.php");
$controller;
$namespace = 'group\\hw3\\controllers\\';
$controllerArr = ['DisplayController', 'PolicyTypeController', 'PolicyController'];

$controllerName = $namespace . ((isset($_GET['c']) && in_array($_GET['c'], $controllerArr)) ? $_GET['c'] : "LandingController");
$controller = new $controllerName;
$controllerFunction = (isset($_REQUEST['m'])) ? $_REQUEST['m'] : "processRequest";
$controller->$controllerFunction();

// if(!(isset($_GET['c']))){
//     $controller = new LandingController();
// }


// else if(isset($_GET['c'])){
//     $controllerName = $namespace . $_GET['c'];
//     $controller = new $controllerName;
// }
// $controller->processRequest();


