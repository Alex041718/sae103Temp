<?php

// Write in a file

$file = fopen("../dataExtracted/test.dat", "w");

fwrite($file, "test\n");
echo("done");

?>