<?php


declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


use Monolog\Logger;
use Monolog\Handler\StreamHandler;



$logger = new Logger('info');
$logger->pushHandler(new StreamHandler(__DIR__.'/output.log', Logger::DEBUG));
$logger->info('Quizmaker Processing Start');


$files = glob("data/*",GLOB_ONLYDIR );      //gets an array of the subdirectories (e.xenglish, spanish)
//O(n^4)....
foreach($files as $f){

    $logger->info("Processing Folder: ", [$f]);

    echo("DIRECTORY: " . $f);
    //data/english
    $texts = glob($f ."/*.txt"); //data/english/fox.txt, data/english/zebra.txt
    
    foreach($texts as $t){
        
        $logger->info("Processing File:", [$t]);

        $contents = file_get_contents($t);
        $string = str_replace(['?', '.', '!', ',','(',')','[',']','{','}','-','_',':',';','"',], "", $contents);
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
                    
            $num = count($fivegram) / 5;
            $associatedWords[$word] = array($num, $fivegram);
                    
            uasort($associatedWords, function($a, $b){
                return $b[0] - $a[0]  ;
            });
        }

        $logger->info("Finished File");
        
    }
        
    echo("HERE IS THE NAME: " . $t . "\n");
    $type = explode("/", $f);
    $myFile = fopen("data/" . $type[1] . ".txt", "w");

    fwrite($myFile, serialize($associatedWords));
    print_r($associatedWords);
    unset($associatedWords);

    $logger->info("Finished Folder");
        
}