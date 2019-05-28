<?php

$myfile = fopen("Dutchdict.txt", "r") or die("Unable to open file!");
$woordenlijst = fread($myfile, filesize("Dutchdict.txt"));
fclose($myfile);

$woordenArray5 = array();

$woordenArray = explode("\n", $woordenlijst);

// remove all linebreaks at the end of the words
for ($i = 0; $i < count($woordenArray); $i++){
    $woordenArray[$i] = substr($woordenArray[$i],0, strlen($woordenArray[$i])-1 );
}

echo "De woordenlijst is " . count($woordenArray) . "<br>";

for ($i = 0; $i < count($woordenArray); $i++) {
    if (strlen($woordenArray[$i]) == 5) {
        array_push($woordenArray5, $woordenArray[$i]);
    }
}

$myfile = fopen("woordenlijst5.txt", "w") or die("Unable to open file!");

for ($i = 0; $i < count($woordenArray5); $i++) {
    fwrite($myfile, $woordenArray5[$i] . PHP_EOL);
}

fclose($myfile);
