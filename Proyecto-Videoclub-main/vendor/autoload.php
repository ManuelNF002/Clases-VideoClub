<?php
spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', '/', $class) . '.php';

    if (file_exists($classPath)) {
        include_once $classPath;
    }
});