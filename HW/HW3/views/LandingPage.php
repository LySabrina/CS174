<?php
namespace group\hw3\views;
class LandingPage{
    
    public function renderView($arrPolicyType, $arrPolicy){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>MonsterInsurance Landing Page</title>
            </head>
            <body>
                <h1><a href='index.php'> Monster Underwrites</a></h1>
                <div class = 'container'>
                    <h2>Policy Type</h2>
                    <ul id = 'policyType'>
                        <li><a href="index.php?c=PolicyTypeController"> [New Type]</a></li>
                        <?php
                            for($i = 0; $i < count($arrPolicyType); $i++){
                                $policyTypeName = $arrPolicyType[$i]['policyTypeName'];
                                ?>
                                    <li> <a href = "index.php?c=PolicyController">
                                    <?= $policyTypeName ?> 
                                    </a> 
                                        </li>
                                <?php
                            }
                        
                        ?>
                    </ul>
                    <h2>Popular Policies</h2>
                    <ul id='popular-policies'>
                            <?php
                                for($i = 0 ; $i < count($arrPolicy); $i++){
                                    $policyName = $arrPolicy[$i]['policyName'];
                                    ?>
                                        <li>
                                        <a href = "index.php?c=DisplayController&arg1=<?= $policyName ?>" >
                                        <?= $policyName ?>
                                        </a>
                                        
                                        </li>
                                    <?php
                                }
                            ?>
                    </ul>
                </div>
            </body>
            </html>
        <?php
        }
    
}