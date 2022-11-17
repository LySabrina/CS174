<?php
namespace group\hw4\Views;

class LandingPage{
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
                 <h1><a href="index.php">Landing Quiz</a></h1>

                 <form method = 'POST' action="index.php?c=QuizController&m=processRequest" onsubmit="return validateForm()">
                 
                       <select name="quiz-type" id="quiz-type" >
                         <option value="english">English</option>
                        <option value="novel">Novel</option>
                      </select>

                <p>Years Experience:</p>
                 <input type="number" name='experience' min = '0'  id='experience' >

                 <button type='submit'  name='quiz' value='start'>Start</button>
                 
                 <button  type='submit' name='quiz' value='results'>See Results</button>
            
                
                 </form>
                
            </body>

            <script>
                  let experience = document.getElementById('experience');
                    let quizType = document.getElementById('quiz-type');   
                    function validateForm(){
                        if(experience.value == "" || quizType.value ==""){
                            alert("INPUT EXPERIENCE AND QUIZ-TYPE");
                            return false;
                        }
                    }
                function checkQuizRequirements(){
                    if(experience.value == "" || quizType.value == ""){
                        alert("NOTHING SELECTED");
                        
                    }
                    else{
                      
                        echo("HERE: " . $_POST['quiz-type']);
                    }
                   
                }

                function checkResultRequirements(){
                    if(quizType.value=""){
                        alert("Select a quiz type please");
                    }
               
                }
            </script>
            </html>
                
            
        <?php

    }

}