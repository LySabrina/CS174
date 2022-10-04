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
<h3> Menu </h3>
<form action="createEditPage.php" method="POST">
    <table>
		<tr>
            <td>Pizza</td>
            <td>Price</td>
            <td>Popularity</td>
            <td>Actions</td>
        </tr>
        <tr>
            <td>Saucy Pie</td>
            <td>$12</td>
            <td>💗💗💗</td>
            <td><button>✏️</button><button>🗑️</button></td>
        </tr>
        <tr>
            <td>Fromage Delight</td>
            <td>$13</td>
            <td>💗💗</td>
            <td><button>✏️</button><button>🗑️</button></td>
        </tr>
        <tr>
            <td>Peppy Pizzazz</td>
            <td>$15</td>
            <td>💗💗💗💗</td>
            <td><button>✏️</button><button>🗑️</button></td>
        </tr>
	</table>

    <button type = "submit" >Create</button>
</form>

    <?php

    ?>
</body>
</html>