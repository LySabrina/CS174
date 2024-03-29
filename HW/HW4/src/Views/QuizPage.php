<?php

namespace group\hw4\Views;

class QuizPage
{
    function __construct()
    {
    }

    function renderView($data)
    {
        $myKeys =array_keys($data);
        $redirect = "index.php?c=QuizController&m=gradeQuiz&quiz-type=" . $_POST['quiz-type']."&" . http_build_query(array('aParam' =>$myKeys));
        
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>QUIZ</title>
        </head>

        <body>
            <h1><a href="index.php">LanguageQuiz/</a><a href="#"><?= $_POST['quiz-type'] ?></a></h1>
            <p>Select the words that could be used to fill in the blank (at least one should work).</p>
            <form method="POST" action=<?=$redirect?> name='test' onsubmit="return validateForm()">
                <ol>
                    <?php
                    $questionNum = 1;
                    foreach ($data as $key => $value) {
                    ?>
                        <li>
                            <div id = <?=$questionNum?>>


                                <?php
                                for ($i = 0; $i < count($value); $i++) {
                                    if ($i == 2) {
                                        echo (" ____ ");
                                    } else {
                                        echo ($value[$i] . " ");
                                    }
                                }
                                ?>
                                

                                <?php
                                $choices = array_rand($data, 3);
                                $correctAnswer = $key;
                                array_push($choices, $correctAnswer);
                                shuffle($choices);                  //randomize the order
                                //choices with 3 random keys and the correct key
                                foreach ($choices as $key => $value) {
                                    
                                
                                ?>
                                    <br/>
                                    <input type="checkbox" name=<?= $questionNum . "[]"?> value=<?=$value?> >
                                    <label for="<?= $questionNum ?>"><?= $value ?></label>

                                    <?php
                                    

                                }
                                                            $questionNum++;
                                                                ?>
                            </div>
                            <br/>
                        </li>
                    <?php


                    }
                    ?>
                </ol>
                <button type='submit'>Submit</button>
            </form>
            <script>
                function validateForm(){
                    for (let i =1; i <= 20; i++) {
                     let question = document.getElementById(i);
                        let len = question.querySelectorAll('input[type="checkbox"]:checked').length;
                        if(len == 0){
                           alert("ENTER ALL QUESTIONS");
                           return false;
                            }
                    }
                }
            </script>
        </body>

        </html>
<?php
    }
}
