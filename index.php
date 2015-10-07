<?php

//Open File
$my_file = fopen("datto.txt", "r") or die("Unable to open file!");

//Read content
$file = fread($my_file, filesize("file.txt"));

echo "Input: " . $file . "<br>";

//Change string to lowercase and accept only letters
$text = preg_replace("/[^a-z ]+/", "", strtolower($file));

//Getting all the words from the string
$array_input = explode(" ", $text);

$common_word = "";
$common_num = "";
$i = 0;
foreach ($array_input as $word) {

    //array with the count of each letter in word
    $word_array = count_chars($word,1);
    
    //largest letter count in word is larger than $common_num?
    if (!empty($word_array) && (max($word_array) > $common_num)) {
        $common_num = max($word_array);
        $common_word = $i;
    }
    $i++;
}


echo "Output: " . $array_input[$common_word];
