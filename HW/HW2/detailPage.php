<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .pizza-outer-circle {
            height: 100px;
            width: 100px;
            border-style: solid;
            border-radius: 50%;
        }

        .pizza-inner-circle {
            height: 90px;
            width: 90px;
            border-style: solid;
            border-radius: 50%;
            background-color: red;
            margin: 2px;
        }

    </style>
</head>
<body>
<h1> <a href = "landingPage.php"> Original Pizza Place <a/> </h1>
<h2></h2>
<h3> Details </h3>
<form action="confirmDeletePage.php" method="POST">

    <div style = "float:left; width:1.4in;">    
        <div class = "pizza-outer-circle">
            <div class = "pizza-inner-circle">
            </div>
        </div>    
    </div>

    <div style = "font-weight:bold;">Saucy Pie : Placeholder</div>
    <div style = "font-weight:bold;">Price: Placeholder</div>
    <div style = "font-weight:bold;">Toppings</div>
    <ul style = "position:relative; left:0.2in;">
        <li>Placeholder</li>
        <li>Placeholder</li>
    </ul>

    <button type = "submit" >Create</button>
    <a href = "landingPage.php">Back</a>
</form>

    <?php

    ?>

</body>
</html>