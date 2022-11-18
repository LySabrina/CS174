<?php

namespace group\hw4\Controllers;
use group\hw4\Models\QuizModel;
use group\hw4\Views\QuizPage;

require_once("Views/QuizPage.php");
require_once("Models/QuizModel");
class QuizController{
    
  
    function __construct()
    {
        
    }
    function processRequest(){
        $requestType = $_POST['quiz'];
        if($requestType == 'start'){
            $this->getQuiz();
        }
        else if($requestType == 'results'){
            $this->getResults();
        }
    }

    function getQuiz(){
        $model = new QuizModel();           ///returns an array of 
        $view = new QuizPage();

        $type = $_POST['quiz-type'];          //gets the quiz type (ex. english, spanish, novel)
        
        $arr = $model->getQuizData($type);  
        $view->renderView($arr);
    }

    function getResults(){
        $type = $_POST['quiz-type'];          //gets the quiz type (ex. english, spanish, novel)
        echo("YE");
    }

    function gradeQuiz(){
        $model = new QuizModel();
        $arr = $_GET['aParam'];         //numeric array
        print_r($arr);
    }
}