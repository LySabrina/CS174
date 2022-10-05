<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS174 - Assignment #2</title>
</head>

<body>
    <?php
    $pizzaFile = fopen("pizza.txt", "a");
    
    mainController();
    function mainController(){
        $view = (isset($_REQUEST['a']) && in_array($_REQUEST['a'], ['edit', 'detail', 'confirm'])) ? $_REQUEST['a'] . "Controller" : 'menuView';
        $view();
        
    }
    function editController(){

    }
    function detailController(){
        $pizza_name = $_GET['pizza-name'];
        $pizza_price = $_GET['pizza-price'];
        
        foreach(file('pizza.txt') as $line){
            $arr = unserialize($line);
        
            if($arr['pizza-name']  == $pizza_name && $arr['pizza-price'] == $pizza_price){
                detailView($arr);
                
            }
        }        
    }

    function confirmController(){
        $pizza_name = $_GET['pizza-name'];
        $pizza_price = $_GET['pizza-price'];

        echo("piiza: " . $pizza_name . "price: " . $pizza_price);
        confirmView($_GET);
        // $file = file('pizza.txt');
        
        // foreach($file as $line){
        //     $arr = unserialize($line);
    
        //     if(strcmp($arr['pizza-name'], $pizza_name) == 0 && strcmp($arr['pizza-price'], $pizza_price) == 0){
            
        //     }
        // }
    }

    function getPizzaList(){
        if(file_exists("pizza.txt")){
            foreach(file("pizza.txt") as $line){
                $arr = unserialize($line);
                $pizza_name =$arr['pizza-name'];
                $pizza_price = $arr['pizza-price'];
                $ingredients = $arr['ingredients'];

                print("PIZZA NAME: " . $pizza_name . "\n");
                print("PIZZA PRICE: " . $pizza_price . "\n");
                print("INGREDIENTS: ");
                foreach($ingredients as $i){
                    print($i . " ");
                }
            }
        }
        else{
            print('file no exist');
        }
    }

    function menuView()
    {
        if(isset($_GET['create'])){
            editPizzaView();
        }
        else{
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
                          if(file_exists("pizza.txt")){
                            $myFile = file_get_contents("pizza.txt");
                            if(strcmp($myFile, "") == 0){
                                echo("No current made pizza. Please make some");
                            }
                            else{
                                foreach(file("pizza.txt") as $line){
                                    $arr = unserialize($line);
                                    $pizza_name =$arr['pizza-name'];
                                    $pizza_price = $arr['pizza-price'];
                                    $ingredients = $arr['ingredients'];
                                    ?>
                                        <tr>
                                            <td> <a href ="index.php?a=detail&pizza-name=<?=$pizza_name?>&pizza-price=<?=$pizza_price?>"> <?=$pizza_name ?> </a>
                                                </td>
                                            <td> $<?=$pizza_price ?> </td>
                                            <td>💗💗💗</td>
                                            <td><button type='submit'> <a name='edit' value ='edit' href="index.php?a=edit&pizza-name<?=$pizza_name?>">✏️</a></button>
                                            <button type='submit'><a name='confirm' value='confirm' href ="index.php?a=confirm&pizza-name=<?=$pizza_name?>&pizza-price=<?=$pizza_price?>">🗑️</button>
                                            </td>
                                        </tr>
                                    <?php
                                  
                                    // $arr = unserialize($line);
                                    // $pizza_name =$arr['pizza-name'];
                                    // $pizza_price = $arr['pizza-price'];
                                    // $ingredients = $arr['ingredients'];
                                    // $str = "<tr> <td>" . $pizza_name . "</td>" . "<td>$" . $pizza_price . "</td>"; 
                                    // $str .= " <td>💗💗💗</td> <td><button>✏️</button><button>🗑️</button></td>";
                                    // echo $str;
                                }
                                if(isset($_REQUEST['confirm'])){
                                    echo("howdy");
                                }
                            }
                       
                        }
                    ?>
                </table>
    
                <button type="submit" name="create" value='create'>Create</button>
            </form>
        <?php
           
        }

    }

    function editPizzaView() {
        if(!isset($_POST['submit'])){
            ?>
            <html>
            <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
            <h3> Pie Editor </h3>
            <form method ="POST">
                <input type="text" name="pizza-name" placeholder="Pizza Name" />
                <input type="text" name="pizza-price" placeholder="price" />
                <h4>Toppings</h4>
                <table>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" name="ingredients[]" id="red-sauce" value="red-sauce">
                            <label for="red-sauce">Red Sauce</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredients[]" id="green-peppers" value="green-peppers">
                            <label for="green-peppers">Green Peppers</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" name="ingredients[]" id="mozarella" value="mozarella">
                            <label for="mozarella">Mozarella</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredients[]" id="ham" value="ham">
                            <label for="ham">Ham</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" name="ingredients[]" id="pepperoni" value="pepperoni">
                            <label for="pepperoni">Pepperoni</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredients[]" id="mushrooms" value="mushrooms">
                            <label for="mushrooms">Mushrooms</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" name="ingredients[]"id="pineapple" value="pineapple">
                            <label for="pineapple">Pineapple</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredients[]" id="anchovies" value="anchovies">
                            <label for="anchovies">Anchovies</label>
                        </td>
                    </tr>
                </table>
                <button type="submit" name='submit' value='submit'>Create</button>
            </form>
            </html>
        <?php
        }
        else if(isset($_POST['submit'])){
            // print_r($_POST);        //array of all your stuff
            print("\n");
            if($_POST['pizza-name'] == null || $_POST['pizza-price'] == null){  //EDIT THIS TO TAKE USER BACK TO CUSTOMIZATION PAGE
                echo("Cannot enter pizza without a name AND price");
            }
            else{
                $pizza_name = $_POST['pizza-name'];
                $pizza_price = $_POST['pizza-price'];       
                $ingredients = $_POST['ingredients'];        
                
                $arr = ['pizza-name' => $pizza_name, 'pizza-price' => $pizza_price, 'ingredients' => $ingredients];

                $arr_serialized = serialize($arr);
                $file = fopen("pizza.txt", "a");
                fwrite($file, $arr_serialized . "\n");
                fclose($file);
                detailView($_POST);
            }   
        }
    }


    function detailView($data){
        ?>
            <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
            <h2> <?= $data['pizza-name'] ?> </h2>
            <p> Price: <?= $data['pizza-price'] ?> </p>
            <ul>
                <?php
                    $arr = $data['ingredients'];
                    foreach($arr as $e){
                        ?> 
                            <li> <?=$e ?> </li>
                        <?php
                    }
                ?>        
            </ul>
        <?php
    }

    function confirmView($data){
        ?>
            <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
            <p>Are you sure you want to delete the bookmark: <?=$data['pizza-name'] ?> </p>

            <button type ='submit' name='confirm' value='true'> <a href='index.php?a=menu'> Confirm </button> 
            <button type ='submit' name='cancel' value = 'false'> <a href="index.php"> Cancel  </a></button>
        <?php
    }
        if(isset($_GET['confirm'])){
            menuView();
        }

    ?>
</body>

</html>