<?php
namespace group\hw3;

use DisplayPolicy;
use group\hw3\controllers\LandingController;
use group\hw3\controllers\DisplayController;
use group\hw3\models\Model;
use group\hw3\View;
use group\hw3\views\NewPolicyType;
use group\hw3\controllers\PolicyTypeController;
use group\hw3\views\LandingPage;

use group\hw3\views\DisplayPolicyPage;
use PolicyController;

require_once("models/Model.php");
require_once("controllers/PolicyTypeController.php");
require_once("views/NewPolicyType.php");
require_once("views/View.php");
require_once("views/LandingPage.php");
require_once("controllers/LandingController.php");
require_once("controllers/DisplayController.php");
require_once("views/DisplayPolicyPage.php");

$model = new Model();
$view = new LandingPage();

$controller = new LandingController($model, $view);
$controller->renderView();

// INSERT INTO POLICY TYPE
// $insertMe = "Insert Me";
// $model->insertPolicyType($insertMe);
// echo("Insert Completed");

// DELETE FROM POLICY TYPE
// $deleteMe = "Insert Me";
// $model->deletePolicyType($deleteMe);
// echo("Delete Completed");

if(isset($_GET['c']) && $_GET['c'] == 'PolicyTypeController'){
    $typeC = "group\\hw3\\controllers\\" . $_GET['c'];
    $view = new NewPolicyType();
    $controller = new $typeC($model, $view);
    $controller->renderView();
}
// DELETE FROM POLICY TYPE
// $deleteMe = "Insert Me";
// $model->deletePolicyType($deleteMe);
// echo("Delete Completed");


// GET ID GIVEN NAME
// $policyTypeToGet = "Magical Accident";
// echo $model->getPolicyTypeIDFromName($policyTypeToGet);


// $view->renderView();

// if(isset($_POST['typeName'])){
//     $typeName = $_POST['typeName'];
//     $controller = new PolicyTypeController($model, $view);
//     $controller->processRequest($typeName);
// }

// if(isset($_GET['c'])){
//     $typeC = "group\\hw3\\controllers\\" . $_GET['c'];
//     $view = new NewPolicyType();
    
//     $controller = new $typeC($model, $view);
//     $controller->getView();
// }

if(isset($_GET['c']) && $_GET['c'] == 'DisplayController'){
    $typeC = "group\\hw3\\controllers\\" . $_GET['c'];
    echo($typeC);
    $view = new DisplayPolicyPage();
    $arg1 = $_GET['arg1'];
    $controller = new $typeC($model, $view);
    $controller->processRequest($arg1);

}   

// if(isset($_GET['c']) && isset($_GET['m'])){                
//     // seems like if we do not add group\\hw3\\controller, it does not work ? 
//     //even though i am using "use namespace" 
//     $typeC = "group\\hw3\\controllers\\" . $_GET['c'];
//     $typeM = "group\\hw3\\models\\" . $_GET['m'];

//     $controller = new $typeC($model, $view);
//     $model = new $typeM;
//     $controller->processRequest();
// }




