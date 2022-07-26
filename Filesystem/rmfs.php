<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


echo "<pre>";

function remove_directory($path)
{
    $files = glob($path . '/*');
    foreach ($files as $file) {
        is_dir($file) ? remove_directory($file) : unlink($file);
    }
    printf("Removing folder %s\n", $path);

    rmdir($path);

    return;
}

remove_directory('.');

echo "</pre>";
