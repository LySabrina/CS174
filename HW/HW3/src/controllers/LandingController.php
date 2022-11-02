<?php
namespace group\hw3\controllers;
use group\hw3\models\Model;
use group\hw3\views\LandingPage;
use group\hw3\views\View;

require_once("controllers/Controller.php");
require_once("views/LandingPage.php");
class LandingController implements Controller{

    function __construct()
    {

    }

    function processRequest()
    {
        $model = new Model();     
        $allPolicyTypes = $model->getAllPolicyType();                 
        $allPolicies = $model->getThreeMostPopularPolicies();          

        $noPolicyArr = [];                                         
        $j = 0;
        for($i = 0 ; $i < count($allPolicyTypes); $i++){         
            $arr = $model->getAllPolicyNamesFromPolicyTypeAsArray($allPolicyTypes[$i]['policyTypeName']);
            if(empty($arr)){
                $noPolicyArr[$j] = $allPolicyTypes[$i]['policyTypeName'];
                $j++;
            }
        }
       
        $view = new LandingPage();   
        $view->renderView($allPolicyTypes, $allPolicies, $noPolicyArr);
    }

}   