<?php

$dir = '../ressources_client/Textes';

$files = array_diff(scandir($dir), array('.', '..','.DS_Store','.gitkeep'));

foreach ($files as $file) {
    echo $file . "\n";
    $file = substr($file,0, strpos($file, '.'));
    $fileEncoded = urlencode($file);
    include "script.php?param=" . $fileEncoded;
}

?>