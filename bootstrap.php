<?php
function autoloader($classname)
{
    $directory = ['lib', 'src'];
    foreach ($directory as $dic) {
        $file = str_replace("\\", DIRECTORY_SEPARATOR,
            __DIR__ . DIRECTORY_SEPARATOR . $dic . DIRECTORY_SEPARATOR . $classname . '.php');
        if (file_exists($file)) {
            break;
        }
    }
    include($file);
}

spl_autoload_register('autoloader');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
'a';