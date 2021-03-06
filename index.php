<?php

require_once 'vendor/autoload.php';

// Define the routes table
$routes = [
    // '/\/hello\/(.+)/' => array('HelloController', 'helloAction'),    
    '/getAverage' => array('HomeController', 'getAverage'),    
    '/index' => array('HomeController', 'index'),  
    '/' => array('HomeController', 'index'),      
];

// Decide which route to run
foreach ($routes as $url => $action) {
    
    // See if the route matches the current request
    $host = $_SERVER['REQUEST_URI'];
    $matches = ($url==$host);

    // If it matches...
    if ($matches) {

        // Run this action, passing the parameters.
        $controller = new $action[0];
        $controller->{$action[1]}();

        break;
    } 
}