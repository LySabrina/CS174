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
                    <input type="text" id= 'title' name = 'title' required 
                      <?php    
                            if(isset($_SESSION['title']) && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']){
                                ?> value = <?= $_SESSION['title']?><?php
                            }
        
                            
                      ?>
                    >
                    
                    
                    <br/>
                    <label for="agentEmail">Agent Email:</label>
                    <input type="text" id='agentEmail' name = 'agentEmail' required
                    <?php
                            if(isset($_SESSION['title'])  && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']){
                                ?> value = <?= $_SESSION['agentEmail']?><?php
                            }
                    
                      ?>
                    >

                    <br/>
                    <label for="duration">Duration:</label>
                    <input type="text" id = 'duration' name = 'duration' required
                    <?php
                            if(isset($_SESSION['duration'])  && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']){
                                ?> value = <?= $_SESSION['duration']?><?php
                            }
                      ?>
                    >
                    <br/>
                    <label for="description"> Description</label>
                    <input type="text" id='description' name='details' required
                    <?php
                            if(isset($_SESSION['details'])  && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']){
                                ?> value = <?= $_SESSION['details']?><?php
                            }
                      ?>
                    >
                    <br/>
                    <button type='submit' name='method' value='save'>Save so far</button>
                    <button type='submit' name = 'method' value ='insert'>Done</button>
                </form>
                <?php
                if(isset($_SESSION['failed']) && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']){{
                    echo("FAILED TO VALIDATE EMAIL OR DURATION");
                }}
                    
                ?>
            </body>
            </html>
        <?php
    }

}