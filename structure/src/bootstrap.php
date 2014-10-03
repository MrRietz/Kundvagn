<?php
/**
 * Default exception handler.
 *
 */

session_name('shoppingcart');
session_start();
        
function myExceptionHandler($exception) 
{
    echo "PageBurn: Uncaught exception: <p>" .
            $exception->getMessage() . "</p><pre>" .
            $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');
 
 
/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) 
{
    $path = __DIR__ . "/../src/{$class}/{$class}.php";
    if(is_file($path)) {
        include($path);   
    } else {
        throw new Exception("Classfile '{$class}' does not exists.");    
    }
}
spl_autoload_register('myAutoloader');


function dump($array) 
{
    echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}
