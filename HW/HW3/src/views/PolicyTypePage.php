<?php
namespace group\hw3\views;

class PolicyTypePage{
    
    public function renderView($arrPolicyType, $arrPolicy){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Policy Type Page</title>
            </head>
            <body>
                <h1> <a href="index.php">Monster Underwriters/<?= $_REQUEST['arg1'] ?></a> </h1>
                <div class = 'container'>
                    <h2>Policy Type</h2>
                    <ul id='policyType'>
                    <?php
                            for($i = 0; $i < count($arrPolicyType); $i++){
                                $policyName = $arrPolicyType[$i]['policyTypeName'];
                                ?>
                                    <li> <a href = "index.php?c=PolicyTypeController&m=showPolicyTypePage&arg1=<?=$policyName ?>">
                                    <?= $policyName ?> 
                                    </a> 
                                        </li>
                                        
                                <?php
                            }
                        ?> 
                    </ul>
                    <h2>Policies</h2>
                    <ul id ='policies'>
                        <li><a href="index.php?c=PolicyController&m=showForm&arg1=<?=$_REQUEST['arg1']?>">[New Policy]</a></li>
                        <?php
                        ?>
                        
                        
                    </ul>
                </div>
                
            </body>
            </html>
        <?php
    }
}