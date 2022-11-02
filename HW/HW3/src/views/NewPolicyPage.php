<?php

namespace group\hw3\views;

class NewPolicyPage{

    function __construct(){
        
    }

    function renderView(){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>New Policy Page</title>
            </head>
            <body>
                <h1><a href="index.php">Monster Underwriters/<?=$_REQUEST['arg1']?></a></h1>
                <h2>New Policy</h2>

                <form method="POST" action="index.php?c=PolicyController&m=processRequest&parentPolicyType=<?=$_REQUEST['arg1']?>" >
                    <label for='title'>Title:</label>
                    <input type="text" id= 'title' name = 'title' required >
                    <br/>
                    <label for="agentEmail">Agent Email:</label>
                    <input type="text" id='agentEmail' name = 'agentEmail' required>
                    <br/>
                    <label for="duration">Duration:</label>
                    <input type="text" id = 'duration' name = 'duration' required>
                    <br/>
                    <label for="description"> Description</label>
                    <input type="text" id='description' name='details' required>
                    <br/>
                    <button type='submit' name='method' value='update'>Save so far</button>
                    <button type='submit' name = 'method' value ='insert'>Done</button>
                </form>
            </body>
            </html>
        <?php
    }

}