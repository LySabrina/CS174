<?php
namespace group\hw4\Views;

class QuizPage{
    function __construct()
    {
        
    }
    
    function renderView($data){
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
                <h1><a href="index.php">LanguageQuiz/</a><a href="">PLACEHOLDER</a></h1>
                <p>Select the words that could be used to fill in the blank (at least one should work).</p>
                <form action="" name='test'>
                    <ol>
                        <li>
                            jumped over __ lazyy dog
                            <br/>
                            <input id='grocery' type="checkbox"></input>
                            <label for="p1">grocery</label>
                            
                            <input id='grocery' type="checkbox"></input>
                            <label for="p1">grocery</label>

                            <input id='grocery' type="checkbox"></input>
                            <label for="p1">grocery</label>

                            <input id='grocery' type="checkbox"></input>
                            <label for="p1">grocery</label>
                        </li>
                    </ol>
                    <button type="submit">Submit</button>
                </form>
            </body>
            </html>
        <?php
    }

}