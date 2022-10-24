<?php

    use group\hw3\controllers\Controller;
    use group\hw3\models\Model;
    use group\hw3\views\View;
    use group\hw3\views\elements\Elements;
    use group\hw3\views\helpers\Helpers;


    require_once("src\controllers\controller.php");
    require_once("src\models\model.php");

    // These three require onces don't work for whatever reason

    // require_once("src\views\elements\elements.php");
    // require_once("src\views\helpers\helpers.php");
    // require_once("src\views\layouts\layouts.php");


    $controller = new Controller();
    $controller.mainController();


    echo "Aloha";
    
?>