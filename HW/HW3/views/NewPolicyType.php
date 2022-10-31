<?php
namespace group\hw3\views;
use group\hw3\View;

class NewPolicyType {
    function __construct()
    {
        
    }
    function renderView(){
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
                <h1><a href="LandingPage.php">Monster Underwrites</a></h1>
                <h2>New Policy Type</h2>
                <form method='POST'>
                    <input type="text" placeholder="Type Name" name='typeName'>
                    <button>Add</button>
                </form>
            </body>
            </html>
        <?php
    }

    function sayHello(){
        echo("Hello from view!");
    }
}