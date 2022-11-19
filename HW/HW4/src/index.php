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


// function get_percentile($percentile, $array) {
//     sort($array);
//     $index = ($percentile/100) * count($array);
//     if (floor($index) == $index) {
//          $result = ($array[$index-1] + $array[$index])/2;
//     }
//     else {
//         $result = $array[floor($index)];
//     }
//     return $result;
// }


// $typeArr = glob("data/" . "english" . ".txt");
// $arr= unserialize(file_get_contents($typeArr[0]));
// $arr1 = [];
// foreach($arr as $key=>$value){
//     print($value[0] . "\n");   //num occurence
    
//     array_push($arr1, $value[0]);
// }

// sort($arr1);
// echo get_percentile(99, $arr1 );

