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
  
    mainController();
    
    /**
     * Gets the text file associated with pizza name such that we can modify it 
     */
    function getPizzaFile($pizzaName){
        $path = getcwd();
        $pizza_files = glob($path."/*.txt");        //return an array of text files ==> find a way to exclude the readme.txt
        foreach($pizza_files as $f){
            $fileName = basename($f, ".txt");       //retyrbs a filename of the text file without absolute path
            if(md5($pizzaName) == $fileName){
                $pizzaTextFile = basename(($f)); 
                return $pizzaTextFile;    
            }            
        }
    }

    function getAllPizzaFiles(){
        $path = getcwd();
        if(($pizza_files = glob($path."/*.txt")) != false){      //return an array of text files of their absolute path
            $readMe = $path. "/readme.txt";                 
            $key  = array_search($readMe, $pizza_files); 
            if($key !== false){ 

                unset($pizza_files[$key]);
            }
            return $pizza_files;
        } 
        else{
            $arr = [];
            return $arr;
        } 
        
    }
    
    function mainController(){
        $view = (isset($_REQUEST['a']) && in_array($_REQUEST['a'], ['edit', 'detail', 'confirm'])) ? $_REQUEST['a'] . "Controller" : 'menuView';
        $view();
        
    }

    function editController(){

    }

    function detailController(){
        $pizza_name = $_GET['pizza-name'];
        $pizza_file = getPizzaFile($pizza_name); //get the pizza text file associated with the pizza name
        $file = fopen($pizza_file, "r");
        $arr = unserialize(fgets($file));       //get the unseralized array from the single line
        detailView($arr);
    }

    function confirmController(){
        $pizza_name = $_GET['pizza-name'];
        echo("piiza: " . $pizza_name);
        confirmView($_GET);
        
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
                            $arr = getAllPizzaFiles();
                            if(!count($arr)){
                                echo("Empty array");
                            }
                            else{
                                foreach($arr as $f){            //for each path file
                                    $file = fopen($f, "r");      //open the file
                                    $line = fgets($file);       //gets the seralized array
                                    $arr = unserialize($line); 
                                    $pizza_name =$arr['pizza-name'];
                                    $pizza_price = $arr['pizza-price'];
                                    $ingredients = $arr['ingredients'];
                                    $viewCounts = $arr['viewCounts']; // ==> not found in the array for some reason
                                    ?>
                                    <tr>
                                        <td> <a href ="index.php?a=detail&pizza-name=<?=$pizza_name?>&pizza-price=<?=$pizza_price?>"> <?=$pizza_name ?> </a>
                                            </td>
                                        <td> $<?=$pizza_price ?> </td>
                                        <td>
                                        <?php
                                        //    since we are getting data from the text file, it stays as 0 even though we visited the page because it is not beign written to file
                                            $str = "";
                                            for($i = 0; $i < $viewCounts && $i < 5; $i++){
                                                    //fix for log5
                                                    $str .= "💗" ;
                                            }
                                            echo($str);
                                        ?>
                                        </td>
                                        
                                        <td><button type='submit'> <a name='edit' value ='edit' href="index.php?a=edit&pizza-name<?=$pizza_name?>">✏️</a></button>
                                        <button type='submit'><a name='confirm' value='confirm' href ="index.php?a=confirm&pizza-name=<?=$pizza_name?>&pizza-price=<?=$pizza_price?>">🗑️</button>
                                        </td>
                                    </tr>
                                <?php
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
            if($_POST['pizza-name'] == null || $_POST['pizza-price'] == null){  //EDIT THIS TO TAKE USER BACK TO CUSTOMIZATION PAGE
                echo("Cannot enter pizza without a name AND price");
            }
            else{
                $pizza_name = $_POST['pizza-name'];
                $pizza_price = $_POST['pizza-price'];       
                $ingredients = $_POST['ingredients'];        
                $arr = ['pizza-name' => $pizza_name, 'pizza-price' => $pizza_price, 'ingredients' => $ingredients, "viewCounts" => 0];
                
                $arr_serialized = serialize($arr);
                $hash = md5($pizza_name);
                $file = fopen($hash . ".txt", "w");
                fwrite($file, $arr_serialized);

                fclose($file);
                detailView($arr);
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
        $pizza_name = $data['pizza-name'];
        $pizzaHash = md5($pizza_name);

        if(isset($_GET['delete'])){
            if(unlink($pizza_name . ".txt")){
                echo("Succesfully Deleted");
            }
            else{
                echo("failed to delete");
            }
            
        }
        else{
            echo('not set');
        }
        
        ?>
            <h1> <a href="index.php"> Original Pizza Place <a /> </h1>
            <p>Are you sure you want to delete the bookmark: <?=$data['pizza-name'] ?> </p>
    
            <button type ='submit' name='delete' value='delete'> <a href='index.php?delete=delete'> Confirm </button> 
            <button type ='submit' name='cancel' value = 'cancel'> <a href="index.php"> Cancel  </a></button>
        <?php
    }
     

    ?>
</body>

</html>