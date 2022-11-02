<?php
namespace group\hw3\views;
class DisplayPolicyPage{

    function __construct()
    {
        
    }

   function renderView($policyInfo){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <h1><a href="index.php">Monster UnderWriters/<?=$policyInfo['policyName']?></a></h1>
                <h2><?=$policyInfo['policyName']?></h2>
                <p><b>Duration:</b> <?= $policyInfo['duration'] ?> </p>
                <br/>
                <p><b>Description:</b> <?= $policyInfo['description'] ?></p>
                <br/>
                <p><b>Contact <?= $policyInfo['email']?></b></p>
            </body>
            </html>
        <?php
   }
}