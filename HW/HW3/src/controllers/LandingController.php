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
        $allPolicyTypes = $model->getAllPolicyType(); //[Lair, Test]
        $allPolicies = $model->getAllPolicy();          //coffine relocation 

        $noPolicyArr = [];                             // arrau of policy types that do not have any policues
        $j = 0;
        for($i = 0 ; $i < count($allPolicyTypes); $i++){
            // echo($allPolicyTypes[$i]['policyTypeName']);            //LAIR 
            
            $arr = $model->getAllPolicyNamesFromPolicyTypeAsArray($allPolicyTypes[$i]['policyTypeName']);
            if(empty($arr)){
                $noPolicyArr[$j] = $allPolicyTypes[$i]['policyTypeName'];
                $j++;
            }
            // if(($this->hasPolicies($allPolicyTypes[$i]['policyTypeName'])) == false){
                
            //     $noPolicyArr[$i] =  $allPolicyTypes[$i]  ;
            // }
        }
       
        $view = new LandingPage();   
        $view->renderView($allPolicyTypes, $allPolicies, $noPolicyArr);
    }

}   