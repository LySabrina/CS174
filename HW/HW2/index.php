<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $pizzaFile = fopen("pizza.txt", "a");
    
    menuView();
    // function mainController(){
    //     $view = (isset($_REQUEST['view']) && in_array($_REQUEST['view'], [ 'editPizzaView', 'detailView', 'confirmView'])) ? $_REQUEST['view'] . "View" : "htmlLayout";
    //     $view("menuView");
    // }

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
            // if(!empty($file))
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
                            foreach(file("pizza.txt") as $line){
                                $arr = unserialize($line);
                                $pizza_name =$arr['pizza-name'];
                                $pizza_price = $arr['pizza-price'];
                                $ingredients = $arr['ingredients'];
                                $str = "<tr> <td>" . $pizza_name . "</td>" . "<td>$" . $pizza_price . "</td>"; 
                                $str .= " <td>💗💗💗</td> <td><button>✏️</button><button>🗑️</button></td>";
                                echo $str;
                            }
                        }
                    ?>
                 
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
                            <input type="checkbox" name="ingredient[]" id="red-sauce" value="red-sauce">
                            <label for="red-sauce">Red Sauce</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredient[]" id="green-peppers" value="green-peppers">
                            <label for="green-peppers">Green Peppers</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" name="ingredient[]" id="mozarella" value="mozarella">
                            <label for="mozarella">Mozarella</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredient[]" id="ham" value="ham">
                            <label for="ham">Ham</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" name="ingredient[]" id="pepperoni" value="pepperoni">
                            <label for="pepperoni">Pepperoni</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredient[]" id="mushrooms" value="mushrooms">
                            <label for="mushrooms">Mushrooms</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" name="ingredient[]"id="pineapple" value="pineapple">
                            <label for="pineapple">Pineapple</label>
                        </td>
                        <td>
                            <input type="checkbox" name="ingredient[]" id="anchovies" value="anchovies">
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
            print_r($_POST);        //array of all your stuff
            print("\n");
            if($_POST['pizza-name'] == null || $_POST['pizza-price'] == null){
                echo("Cannot enter pizza without a name AND price");
            }
            else{
                $pizza_name = $_POST['pizza-name'];
                $pizza_price = $_POST['pizza-price'];       
                $ingredients = $_POST['ingredient'];        //array of ingredient
                
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
                    $arr = $data['ingredient'];
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
        
    }

    ?>
</body>

</html>