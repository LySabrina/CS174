<?php
namespace group\hw3\views;

class PolicyTypePage{
    
    public function renderView($arrPolicyType, $arrPolicy){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Policy Type Page</title>
            </head>
            <body>
                <h1>Monster Underwriters</h1>
                <div class = 'container'>
                    <h2>Policy Type</h2>
                    <ul id='policyType'>
                    <?php
                            for($i = 0; $i < count($arrPolicyType); $i++){
                                $policyName = $arrPolicyType[$i]['policyTypeName'];
                                ?>
                                    <li> <a href = "index.php?c=DisplayController">
                                    <?= $policyName ?> 
                                    </a> 
                                        </li>
                                        
                                <?php
                            }
                            

                        ?> 
                    <h2>Policies</h2>
                    <ul id ='policies'>
                        <ul> [New Policiy]</ul>
                        <?php

                        ?>  
                    </ul>
                    </ul>
                </div>
                
            </body>
            </html>
        <?php
    }
}