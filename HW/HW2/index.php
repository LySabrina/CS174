<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CS174 - Assignment #2</title>
</head>

<body>
    <?php

    mainController();
    
    /**
     * Gets the text file associated with pizza name such that we can modify it 
     */
    function getPizzaFile($pizzaName)
    {
        $path = getcwd();
        $pizza_files = glob($path . "/*.txt");        //return an array of text files ==> find a way to exclude the readme.txt
        foreach ($pizza_files as $f) {
            $fileName = basename($f, ".txt");       //retyrbs a filename of the text file without absolute path
            if (md5($pizzaName) == $fileName) {
                $pizzaTextFile = basename(($f));
                return $pizzaTextFile;
            }
        }
    }

    function getAllPizzaFiles()
    {
        $path = getcwd();
        if (($pizza_files = glob($path . "/*.txt")) != false) {      //return an array of text files of their absolute path
            $readMe = $path . "/readme.txt";
            $key  = array_search($readMe, $pizza_files);
            if ($key !== false) {

                unset($pizza_files[$key]);
            }
            return $pizza_files;
        } else {
            $arr = [];
            return $arr;
        }
    }

    function mainController()
    {
        $view = (isset($_REQUEST['a']) && in_array($_REQUEST['a'], ['edit', 'detail', 'confirm'])) ? $_REQUEST['a'] . "Controller" : 'menuView';
        $view();
    }

    function editController(){
        if(empty($_GET['pizza-name'])){
            $arr = [];
            editPizzaView($arr);
        }
        else{
            $pizza_file = getPizzaFile($_GET['pizza-name']);
            echo($pizza_file);
            $file = fopen($pizza_file, "r");
            $unseralized_arr = unserialize(fgets($file));
            fclose($file);
            editPizzaView($unseralized_arr);
        }
   
    }

    function detailController()
    {
        $pizza_name = $_GET['pizza-name'];
        $pizza_file = getPizzaFile($pizza_name); //get the pizza text file associated with the pizza name
        $file = fopen($pizza_file, "r");
        $arr = unserialize(fgets($file));       //get the unseralized array from the single line
        detailView($arr);
    }

    function confirmController()
    {
        $pizza_name = $_GET['pizza-name'];
        echo ("piiza: " . $pizza_name);
        confirmView($_GET);
    }

    function menuView()
    {
        // if (isset($_GET['create'])) {
        //     editPizzaView();
        // }
        //  else {
    ?>
            <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
            <h3> Menu </h3>
            <form action="index.php" method="GET">
                <table>
                    <tr>
                        <td>Pizza</td>
                        <td>Price</td>
                        <td>Popularity</td>
                        <td>Actions</td>
                    </tr>
                    <?php
                    $arr = getAllPizzaFiles();
                    if (!count($arr)) {
                        echo ("No pizza made. Please make some pizza");
                    } else {
                        foreach ($arr as $f) {            //for each path file
                            $file = fopen($f, "r");      //open the file
                            $line = fgets($file);       //gets the seralized array
                            $arr = unserialize($line);
                            $pizza_name = $arr['pizza-name'];
                            $pizza_price = $arr['pizza-price'];
                            $ingredients = $arr['ingredients'];
                            $viewCounts = $arr['viewCounts']; 
                    ?>
                            <tr>
                                <td> <a href="index.php?a=detail&pizza-name=<?= $pizza_name ?>&pizza-price=<?= $pizza_price ?>"> <?= $pizza_name ?> </a>
                                </td>
                                <td> $<?= $pizza_price ?> </td>
                                <td>
                                    <?php
                                    $str = "";
                                    
                                    $numHearts = log($viewCounts, 5);   
                                    //each heart has a string length of 4??
                                    for ($i = 0; $i < $numHearts && strlen($str) < 20 ; $i++) {
                               
                                        $str .= "💗";
                                    
                                    }
                                    echo($str);
                                    ?>
                                </td>

                                <td><button type='submit' name = 'a' value='edit'> <a name='edit' value='edit' href="index.php?a=edit&pizza-name=<?=$pizza_name?>">✏️</a></button>
                                    <button type='submit'><a name='confirm' value='confirm' href="index.php?a=confirm&pizza-name=<?= $pizza_name ?>&pizza-price=<?= $pizza_price ?>">🗑️</button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                <button type="submit" name="a" value='edit'>Create</button>
            </form>
        <?php
        // }
    }

    function editPizzaView($data)
    {
        ?>
        <html>
        <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
        <h3> Pie Editor </h3>
        <form method="POST">
            <input type="text" name="pizza-name" placeholder="Pizza Name" value = <?php 
                            if(!empty($data['pizza-name'])){
                                echo($data['pizza-name']);
                            }
                       
                ?> >
            <input type="text" name="pizza-price" placeholder="price" value = <?php
                            if(!empty($data['pizza-price'])){
                                echo($data['pizza-price']);
                            }
                        ?>
            >
            <h4>Toppings</h4>
            <table>
                <tr>
                    <th></th>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="red-sauce" value="red-sauce" <?php
                            if(!empty($data['ingredients']) && in_array('red-sauce', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>
                        >
                        <label for="red-sauce">Red Sauce</label>
                    </td>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="green-peppers" value="green-peppers" <?php
                            if(!empty($data['ingredients']) && in_array('green-peppers', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>>
                        <label for="green-peppers">Green Peppers</label>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="mozarella" value="mozarella" <?php
                            if(!empty($data['ingredients']) && in_array('mozarella', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>>
                        <label for="mozarella">Mozarella</label>
                    </td>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="ham" value="ham" <?php
                            if(!empty($data['ingredients']) && in_array('ham', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>>
                        <label for="ham">Ham</label>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="pepperoni" value="pepperoni" <?php
                            if(!empty($data['ingredients']) && in_array('pepperoni', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>>
                        <label for="pepperoni">Pepperoni</label>
                    </td>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="mushrooms" value="mushrooms" <?php
                            if(!empty($data['ingredients']) && in_array('mushrooms', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>>
                        <label for="mushrooms">Mushrooms</label>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="pineapple" value="pineapple" <?php
                            if(!empty($data['ingredients']) && in_array('pineapple', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>>
                        <label for="pineapple">Pineapple</label>
                    </td>
                    <td>
                        <input type="checkbox" name="ingredients[]" id="anchovies" value="anchovies" <?php
                            if(!empty($data['ingredients']) && in_array('anchovies', $data['ingredients'])){
                                ?> checked <?php
                            }
                        ?>>
                        <label for="anchovies">Anchovies</label>
                    </td>
                </tr>
            </table>
            <button type="submit" name='submit' value='submit'>Create</button>
        </form>

        </html>
    <?php
 
       if (isset($_POST['submit'])) {
            
            if ($_POST['pizza-name'] == null || $_POST['pizza-price'] == null) {  //EDIT THIS TO TAKE USER BACK TO CUSTOMIZATION PAGE
                echo ("Cannot enter pizza without a name AND price");
            } else {
                $pizza_name = $_POST['pizza-name'];
                $pizza_price = $_POST['pizza-price'];
                $ingredients = $_POST['ingredients'];
                $arr = ['pizza-name' => $pizza_name, 'pizza-price' => $pizza_price, 'ingredients' => $ingredients, "viewCounts" => 0];

                $arr_serialized = serialize($arr);
                $hash = md5($pizza_name);
                $file = fopen($hash . ".txt", "w");
                fwrite($file, $arr_serialized);
                fclose($file);
                echo("Successfully created pizza");
            }
        }
    }

    function detailView($data)
    {
        ?>
        <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
        <h2> <?= $data['pizza-name'] ?> </h2>
        <p> Price: <?= $data['pizza-price'] ?> </p>
        <ul>
            <?php
            $arr = $data['ingredients'];
            foreach ($arr as $e) {
            ?>
                <li> <?= $e ?> </li>
            <?php
            }
            ?>
        </ul>
    <?php
        $data['viewCounts']++;
        
        updatePizzaFile($data);
    }

    function updatePizzaFile($data){
        $pizza_file = getPizzaFile($data['pizza-name']);    //get text file associated 
        $file = fopen($pizza_file, 'w');
        $arr_serialized = serialize($data);
        fwrite($file, $arr_serialized);
        fclose($file);
    }

    function confirmView($data)
    {
        $pizza_name = $data['pizza-name'];
        $pizzaHash = md5($pizza_name);

    ?>
        <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
        <p>Are you sure you want to delete the bookmark: <?= $data['pizza-name'] ?> </p>
        <form method='POST'>
            <button type='submit' name='delete' value='delete'> Confirm </button>
        </form>

        <button type='submit' name='cancel' value='cancel'> <a href="index.php"> Cancel </a></button>
    <?php

        if (isset($_POST['delete'])) {
            echo ("confirm");
            if 
            (unlink($pizzaHash . ".txt")) {
                echo ("Succesfully Deleted");
            } else {
                echo ("failed to delete");
            }
        }  
    }
    ?>

</body>

</html>