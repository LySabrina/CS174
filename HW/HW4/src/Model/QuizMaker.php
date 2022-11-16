<?php


$files = glob("data/english/*.txt");            //returns an array of .txt files
$words = [];                                    //word array to hold all the words found inside the text file

foreach($files as $f){
    $contents = file_get_contents($f);
    $string = preg_replace('/[^a-zA-Z]/', ' ', $contents);
    echo($string);
    $temp = explode(" ", $string);
    $words = array_merge($words, $temp);
}
$results = array_count_values(array_map("strtolower", $words));
unset($results['']);
print_r($results);


