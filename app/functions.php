<?php

use App\components\Database;
//use App\Services\Roles;
use Delight\Auth\Auth;
use JasonGrimes\Paginator;
use app\controllers\Controller;
use app\components\ImageManager;

function debug($obt)
{
    echo "<pre>";
    print_r($obt);
    echo "</pre>";
}


function components($name)
{
    global $container;
    return $container->get($name);
}

function auth()
{
    global $container;
    return $container->get(Auth::class);
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


/*function getAllCategory()
{
    return $this->database->getAll();
}

/*function includeAuth()
{
    $pdo = new PDO("mysql:host=localhost; dbname=tests; charset=utf8", "root", "");
    $auth = new Auth($pdo);
    return $auth;
}*/

function error404()
{
   return $this->view->render("errors/404");
   //echo $this->view->render("login/loginView");
}

function paginate($count, $page, $perPage, $url)
{
    $totalItems = $count;
    $itemsPerPage = $perPage;
    $currentPage = $page;
    $urlPattern = $url;

    $paginator =  new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    return $paginator;

}

function getAllCategory()
{
    global $container;
    $queryFactory = $container->get('Aura\SqlQuery\QueryFactory');
    $pdo = $container->get('PDO');
    $database = new Database($pdo, $queryFactory);
    return $database->getAll('category');
}

/*function getImage($image) {
    return (new \app\components\ImageManager())->getImage($image);
}*/
