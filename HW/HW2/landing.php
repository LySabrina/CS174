<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

    </style>
</head>
<body>
<h1> <a href ="#"> Original Pizza Place <a/> </h1>
<h3> Pie Editor </h3>
<form action="index.php" method="POST">
    <input type="text" name="pizza-name" placeholder = "Pizza Name" />
    <input type="text" name="pizza-price" placeholder = "price" /> 
    <h4>Toppings</h4>
    
    <div class ="toppings">
    <input type="checkbox" name="red-sauce" id="red-sauce">
    <label for="red-sauce">Red-sauce</label>

    <input type="checkbox" name="mozarella" id="mozarella">
    <label for="mozarella">Mozarella</label>
    
    <input type="checkbox" name="pepperoni" id="pepperoni">
    <label for="pepperoni">Pepperoni</label>

    <input type="checkbox" name="pineapple" id="pineapple">
    <label for="pineapple">Pineapple</label>

    <input type="checkbox" name="green-peppers" id="green-peppers">
    <label for="green-peppers">Green Peppers</label>

    <input type="checkbox" name="ham" id="ham">
    <label for="ham">Ham</label>

    <input type="checkbox" name="mushrooms" id="mushrooms">
    <label for="mushrooms">Mushrooms</label>

    <input type="checkbox" name="anchovies" id="anchovies">
    <label for="anchovies">Anchovies</label>

    </div>

    <button type = "submit" >Create</button>
</form>

    <?php

    ?>
</body>
</html>