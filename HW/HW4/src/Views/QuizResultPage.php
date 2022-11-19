<?php
namespace group\hw4\Views;
class QuizResultPage{
    function __construct()
    {
        
    }

    function renderView($data, $quizType){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Quiz Result Page</title>
            </head>
            <body>
                <h1><a href="index.php">Language Quiz/</a> <a href="#"><?=$quizType?></a></h1>
                <div>
                    <form action="index.php?c=QuizController">
                        <select name="experience-level" id="">
                            <option value="any">Any</option>
                            <option value="> 10">< 10</option>
                            <option value="10 - 20">10 - 20</option>
                            <option value="> 20"> 20</option>
                        </select>
                    </form>
                </div>

                <div>
                    <table>
                        <tbody>
                            <tr><th>Word Rand Percentile</th><th>% Correct</th></tr>

                        </tbody>
                    </table>
                </div>

                <?php 

                ?>
            </body>
            </html>
        <?php
    }
}