<?php

// Read a file
$path = "../ressources_client/Textes/Bretagne.txt";

$file = fopen($path, "r") or die("Unable to open file!");

echo fread($file,filesize($path));

fclose($file);

echo("done");

?>