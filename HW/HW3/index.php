<?php
namespace group\hw3;

use group\hw3\Model;
use group\hw3\View;
use group\hw3\NewPolicyType;
use group\hw3\controllers\PolicyTypeController;


require_once("models/Model.php");
require_once("controllers/PolicyTypeController.php");
require_once("views/NewPolicyType.php");
require_once("views/View.php");

$model = new Model();
$view = new NewPolicyType();
$view->renderView();

if(isset($_POST['typeName'])){
    $typeName = $_POST['typeName'];
    $controller = new PolicyTypeController($model, $view);
    $controller->processRequest($typeName);
}


