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
                 <h1><a href="">Landing Quiz</a></h1>
                 <form method = 'GET'>
                 <div>
                       <select name="quiz-type" id="quiz-type" >
                         <option value="English">English</option>
                        <option value="Spanish">Spanish</option>
                      </select>

                  <p>Years Experience:</p>
                 <input type="number" name='experience' min = '0'  id='experience' >

                 <!-- <button onclick="checkQuizRequirements()"  name='quiz' value='start'>Start</button> -->
                 <a href="index.php?c=QuizController&m=getQuiz">QuizController</a>
                 <button onclick="checkResultRequirements()" name='quiz' value='results'>See Results</button>
            
                </div>
                 </form>
                
            </body>

            <script>
                  let experience = document.getElementById('experience');
                    let quizType = document.getElementById('quiz-type');   
                function checkQuizRequirements(){
                    if(experience.value == "" || quizType.value == ""){
                        alert("NOTHING SELECTED");
                    }
                    else{
                        
                    }
                }

                function checkResultRequirements(){
                    if(quizType.value=""){
                        alert("Select a quiz type please");
                    }
                    else{
                        alert("selected quiz type");
                    }
                }
            </script>
            </html>
       
        <?php
    }

}