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
<h1> <a href = "landingPage.php"> Original Pizza Place <a/> </h1>
<h2></h2>
<h3> Pie Editor </h3>
<form action="detailPage.php" method="POST">
    <input type="text" name="pizza-name" placeholder = "Pizza Name" />
    <input type="text" name="pizza-price" placeholder = "price" /> 
    <h4>Toppings</h4>

    <table>
		<tr>
            <th></th>
            <td>
                <input type="checkbox" name="red-sauce" id="red-sauce">
                <label for="red-sauce">Red Sauce</label>
            </td>
            <td>
                <input type="checkbox" name="green-peppers" id="green-peppers">
                <label for="green-peppers">Green Peppers</label>
            </td>
        </tr>
        <tr>
        <th></th>
        <td>
                <input type="checkbox" name="mozarella" id="mozarella">
                <label for="mozarella">Mozarella</label>
            </td>
            <td>
                <input type="checkbox" name="ham" id="ham">
                <label for="ham">Ham</label>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="checkbox" name="pepperoni" id="pepperoni">
                <label for="pepperoni">Pepperoni</label>
            </td>
            <td>
                <input type="checkbox" name="mushrooms" id="mushrooms">
                <label for="mushrooms">Mushrooms</label>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="checkbox" name="pineapple" id="pineapple">
                <label for="pineapple">Pineapple</label>
            </td>
            <td>
                <input type="checkbox" name="anchovies" id="anchovies">
                <label for="anchovies">Anchovies</label>
            </td>
        </tr>
	</table>
    
    <div class ="toppings">
    </div>

    <button type = "submit" >Create</button>
</form>

    <?php

    ?>
</body>
</html>