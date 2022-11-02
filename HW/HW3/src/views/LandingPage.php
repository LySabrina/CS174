<?php
namespace group\hw3\views;
class LandingPage{

    public function renderView($policyTypeArr, $popularPolicyArr, $NoPoliciesArr){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Landing Page</title>
            </head>
            <body>
                <h1><a href="index.php">Monster UnderWrites</a></h1>
                <div id='container'>
                    <h2>Policy Type</h2>
                    <ul id='policyTypeList'>
                        <li><a href="index.php?c=PolicyTypeController&m=showForm">[New Type]</a></li>
                        <?php
                            foreach($policyTypeArr as $policyType ){
                                if(in_array($policyType['policyTypeName'], $NoPoliciesArr)){
                                    
                                    ?>
                                        <li><a href="index.php?c=PolicyTypeController&m=showPolicyTypePage&arg1=<?= $policyType['policyTypeName']?>">
                                        <?=$policyType['policyTypeName'] ?> </a> <a href="index.php?c=PolicyTypeController&m=deletePolicyType&arg1=<?=$policyType['policyTypeName']?>">
                                        
                                        <span title="Click here to delete">[DELETE]</span></a></li>
                                        
                                    <?php
                                }
                                else{
                                    
                                    ?> 
                                    <li><a href="index.php?c=PolicyTypeController&m=showPolicyTypePage&arg1=<?= $policyType['policyTypeName']?>">
                                        <?=$policyType['policyTypeName'] ?> </a>
                                    </li>
                                <?php
                                }
                            }
                        ?>
                    </ul>

                    <h2>Popular Policies</h2>
                    <ul id='popularPolicyList'>
                        <?php
                            foreach($popularPolicyArr as $policy){
                                ?>
                                    <li><a href="index.php?c=PolicyController&m=showPolicyInformation&arg1=<?= $policy['policyName'] ?>">
                                        <?=$policy['policyName']?></a></li>
                                    
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