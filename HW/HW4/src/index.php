<?php
use group\hw4\Models\QuizModel;
use group\hw4\Controllers\LandingController;
use group\hw4\Views\LandingPage;

require_once("Controllers/QuizController.php");
require_once("Controllers/LandingController.php");
require_once("Views/LandingPage.php");

$controller;
$namespace = 'group\\hw4\\Controllers\\';
$controllerArr = ['QuizController'];

$controllerName = $namespace . ((isset($_GET['c']) && in_array($_GET['c'], $controllerArr)) ? $_GET['c'] : "LandingController");
$controller = new $controllerName;
$controllerFunction = (isset($_REQUEST['m'])) ? $_REQUEST['m'] : "processRequest";
$controller->$controllerFunction();

