<?php
/**
 * Author: Kotowicz 17018747
 */

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'sql103.epizy.com',
        'user' => 'epiz_25696524',
        'password' => 'Kijciwoko123',
        'database' => 'epiz_25696524_tutorials'
    ),
    'cookie' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 2629746
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
);

spl_autoload_register(function($class)
{
    $sources = array(
        "Core/$class.php",
        "Validation/$class.php",
        "Helpers/$class.php",
        "DomainModels/Implementations/$class.php",
        "DomainModels/Interfaces/$class.php",
        "MVC/Models/$class.php",
        "MVC/Controllers/$class.php",
        "MVC/Views/$class.php",
        "DataLayer/$class.php",
        "DataLayer/Mappers/$class.php",
    );

    foreach ($sources as $source)
        if(file_exists($source))
            require_once $source;

});

require_once 'Helpers/sanitise.php';
session_start();
