<?php

$files = glob("data/english/*.txt");            //returns an array of .txt files
$words = [];                                    //word array to hold all the words found inside the text file
$associatedWords = [];                          //
foreach($files as $f){
    $contents = file_get_contents($f);
    $string = str_replace(['?', '.', '!'], "", $contents);
    echo($string);
    $rawTextArray = explode(" ", $string);
    $textArrayLowercase = array_map('strtolower', $rawTextArray);
    $allUniqueWords = array_unique($textArrayLowercase);


    $length = count($textArrayLowercase);


    foreach($allUniqueWords as $word){
        $fivegram = [];
        for($a = 0; $a < $length; $a++){
            if($textArrayLowercase[$a] == $word){
                for($b = $a - 2; $b <= $a + 2; $b++){
                    if($b < 0 || $b >= $length){
                        array_push($fivegram, "Null");
                    }
                    else{
                        array_push($fivegram, $textArrayLowercase[$b]);
                    }
                }
            }
        }
        //['the' => fiveGram]
        $num = count($fivegram) / 5;
        $associatedWords[$word] = array($num, $fivegram);
    }
   
    
    $words = array_merge($words, $rawTextArray);
}
// $results = array_count_values(array_map("strtolower", $words));
// print_r($results);
print_r($associatedWords);
