<?php

$files = glob("data/*",GLOB_ONLYDIR );      //gets an array of the subdirectories (e.xenglish, spanish)
//O(n^4)....
foreach($files as $f){
    echo("DIRECTORY: " . $f);
    //data/english
    $texts = glob($f ."/*.txt"); //data/english/fox.txt, data/english/zebra.txt
    
    foreach($texts as $t){
        
        $contents = file_get_contents($t);
        $string = str_replace(['?', '.', '!', ','], "", $contents);
            $rawTextArray = explode(" ", $string);
    // print_r($rawTextArray);
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
                    
                    $num = count($fivegram) / 5;
                    $associatedWords[$word] = array($num, $fivegram);
                    
                        uasort($associatedWords, function($a, $b){
                            return $b[0] - $a[0]  ;
                        });
                    
                    // print_r($fivegram);
                }
                // $words = array_merge($words, $rawTextArray);    //dont need?
            }
        
        echo("HERE IS THE NAME: " . $t . "\n");
        $type = explode("/", $f);
        $myFile = fopen("data/" . $type[1] . ".txt", "w");

        fwrite($myFile, serialize($associatedWords));
        print_r($associatedWords);
        unset($associatedWords);
        
    
}


// $files = glob("data/english/*.txt");            //returns an array of .txt files


// $words = [];                                    //word array to hold all the words found inside the text file
// $associatedWords = [];                          //
// foreach($files as $f){
//     $contents = file_get_contents($f);
//     $string = str_replace(['?', '.', '!', ','], "", $contents);
//     // echo($string);
//     $rawTextArray = explode(" ", $string);
//     // print_r($rawTextArray);
//     $textArrayLowercase = array_map('strtolower', $rawTextArray);
//     // print_r($textArrayLowercase);
//     $allUniqueWords = array_unique($textArrayLowercase);
//     // print_r($allUniqueWords);


//     $length = count($textArrayLowercase);


//     foreach($allUniqueWords as $word){
//         $fivegram = [];
//         for($a = 0; $a < $length; $a++){
//             if($textArrayLowercase[$a] == $word){
//                 for($b = $a - 2; $b <= $a + 2; $b++){
//                     if($b < 0 || $b >= $length){
//                         array_push($fivegram, "Null");
//                     }
//                     else{
//                         array_push($fivegram, $textArrayLowercase[$b]);
//                     }
//                 }
//             }
//         }
//         //['the' => fiveGram]
//         $num = count($fivegram) / 5;
//         $associatedWords[$word] = array($num, $fivegram);
        
//         // print_r($fivegram);
//     }
//     $words = array_merge($words, $rawTextArray);    //dont need?
// }


// // //How to order from most occuring to last
// // usort($associatedWords, function($a, $b){
// //     return $b[0] - $a[0]  ;
// // });


// // $myFile = fopen("englishQuiz.txt", )
// // print("<-------------- HERE ------------------->");

// // foreach(glob("data/*", GLOB_ONLYDIR) as $f){
// //     echo(substr($f, 5) . "\n");
// // }
// // $results = array_count_values(array_map("strtolower", $words));
// // print_r($results);
// print_r($associatedWords);
