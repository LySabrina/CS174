<?php
namespace group\hw3\views;
use group\hw3\View;

class NewPolicyTypePage {
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
                <h1><a href="index.php">Monster Underwrites</a></h1>
                <h2>New Policy Type</h2>
                <form method='POST' action = "index.php?c=PolicyTypeController&m=processRequest">
                    <input type="text" placeholder="Type Name" name='typeName' required = 'required'>
                    <button type = 'submit' >Add</button>
                </form>
            </body>
            </html>
        <?php
    }
}