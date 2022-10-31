<?php

class NewPolicyPage{

    function __construct(){
        
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
                <h1>MonsterUnderWrites</h1>
                <h2>New Policy</h2>

                <form method="POST">
                    <label for='title'>Title:</label>
                    <input type="text" id= 'title' name = 'title'>

                    <label for="agentEmail">Agent Email:</label>
                    <input type="text" id='agentEmail' name = 'agentEmail'>

                    <label for="duration">Duration:</label>
                    <input type="text" id = 'duration' name = 'duration'>

                    <label for="description"> Description</label>
                    <input type="text" id='description' name='description'>

                    <button>Save so far</button>
                    <button>Done</button>
                </form>
            </body>
            </html>
        <?php
    }

}