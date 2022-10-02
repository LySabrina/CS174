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
        $string = "the quick brown fox";

        function reverse($str){
            if(strlen($str) == 0){
                print("Not valid string length");
                return ;
            }
            else{
                $arr = explode(" ", $str);
                for($element = count($arr)-1; $a >= 0; $a--){
                    print strtoupper($arr[$x][0]).substr($arr[$x], 1)." ";
                }
                print($arr);
            }
        }
        reverse($string);
    ?>
</body>
</html>