<?php
namespace group\hw3\views;
class DisplayPolicyPage{

    function __construct()
    {
        
    }

    function renderView($data){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Display Policy Page</title>
            </head>
            <body>
                <h1>Monster Underwriters <?= $data['policyTypeName'] ?></h1>
                <h2><?= $data['policyName']?></h2>
                <p><b>Duration: </b> <?= $data['duration'] ?></p>
                <p><b>Description:</b> <?= $data['description'] ?></p>
                <p>Contact <?= $data['email'] ?> for a quote!</p>
            </body>
            </html>
        <?php
    }
}