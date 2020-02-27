<?php

$fileName = "log";

function checkFile() {
    $fileName = "log";
    if (file_exists($fileName)) {
        echo "File exists <br><br><br>";
    } else {
        echo "File is missing";
    }
}

function insertIntofile($firstname ,$lastname,$email,$gender,$subscribe) {
    $fileName = "log";
    $fileHandler= @fopen($fileName,'a') or die ('Unable to open file');
    $text = $firstname .",". $lastname .",". $email .",". $gender .",". $subscribe .PHP_EOL;
    fwrite($fileHandler,$text);
    fclose($fileHandler);
}

?>