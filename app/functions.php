<?php



function debug($obt)
{
    echo "<pre>";
    print_r($obt);
    echo "</pre>";
}

/*function getImage($image) {
    return (new \App\Services\ImageManager())->getImage($image);
}*/

function components($name)
{
    global $container;
    return $container->get($name);
}
function config($field)
{
    $config = require '../app/config.php';
    return array_get($config, $field);
}

function redirect($path)
{

    header("Location: $path");
    exit;
}


/*function includeAuth()
{
    $pdo = new PDO("mysql:host=localhost; dbname=tests; charset=utf8", "root", "");
    $auth = new Auth($pdo);
    return $auth;
}*/
