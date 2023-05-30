<?php

// methode  1 : helper function registred in composer.json autoload 'file' ( used in testcontroller and view.form_test.blade.php)
if (!function_exists('example_helper')) {
    function example_helper($string)
    {
        return 'Hello ' . $string;
    }
}