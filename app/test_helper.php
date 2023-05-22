<?php


// methode  2 : helper function registred in app.php autoload provider ( used in test controller )

if (!function_exists('example_helper')) {
    function example_helper($string)
    {
        return 'Hello ' . $string;
    }
}