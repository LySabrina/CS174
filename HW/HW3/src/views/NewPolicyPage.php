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
                <h1><a href="index.php">Monster Underwriters/</a>
                <a href=""><?=$_REQUEST['arg1']?></a>
            </h1>
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
                    <select name="duration" id="duration">
                        <option value="5"
                        <?php
                            if(isset($_SESSION['duration']) && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']  && $_SESSION['duration'] == '5'){
                                ?> selected<?php
                            }
                      ?>
                        >5 years</option>
                        <option value="50"
                        <?php
                            if(isset($_SESSION['duration']) && $_SESSION['parentPolicyType'] == $_REQUEST['arg1'] && $_SESSION['duration'] == '50'){
                                ?> selected <?php
                            }
                      ?>
                        >50 years</option>
                        <option value="100"
                        <?php
                            if(isset($_SESSION['duration']) && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']  && $_SESSION['duration'] == '100'){
                                
                                ?> selected <?php
                            }
                            
                      ?>
                        >100 years</option>
                        <option value="500"
                        <?php
                            if(isset($_SESSION['duration']) ==500 && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']  && $_SESSION['duration'] == '500'){
                                ?> selected<?php
                            }
                      ?>
                        >500 years</option>
                    </select>

                    
                    <br/>
                    <label for="description"> Description</label>
                    <br/>
                    <textarea name="details" id="description" cols="30" rows="5" required="required"><?php if(isset($_SESSION['details'])  && $_SESSION['parentPolicyType'] == $_REQUEST['arg1']){?> <?= $_SESSION['details']?><?php }?></textarea>
    
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