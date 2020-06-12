<?php

use DI\Container;
use DI\ContainerBuilder;
use Aura\SqlQuery\QueryFactory;
use League\Plates\Engine;
use Delight\Auth\Auth;
use FastRoute\RouteCollector;
use PhpQuery\PhpQuery;



$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    Engine::class => function() {
        return new Engine('../app/views');
    },

    PDO::class => function() {
        return new PDO("mysql:host=localhost;dbname=tests;charset=utf8", "admin", "123");

    },
    QueryFactory::class  =>  function() {
        return new QueryFactory('mysql');
    },
    Delight\Auth\Auth::class   =>  function($container) {
        return new Auth($container->get('PDO'));
    },
    Swift_Mailer::class => function() {
        $transport = (new Swift_SmtpTransport(
            config('mail.smtp'),
            config('mail.port'),
            config('mail.encryption')
        ))
        ->setUsername(config('mail.email'))
        ->setPassword(config('mail.password'));
    return new Swift_Mailer($transport);
    }
]);

$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->get('/', ["app\controllers\HomeController", "index"]);
    // {id} must be a number (\d+)
    $r->get('/show/{id}',  ["app\controllers\HomeController", "show"]);

    $r->get('/login', ["app\controllers\LoginController", "login"]);
    $r->post('/loginin', ["app\controllers\LoginController", "loginIn"]);

    $r->get('/register',  ["app\controllers\RegisterController", "showForm"]);
    $r->post('/registerin', ["app\controllers\RegisterController", "registerin"]);

    $r->get('/profile/info', ["app\controllers\ProfileController", 'showInfo']);
    $r->get('/profile/security', ["app\controllers\ProfileController", 'securiti']);
    $r->post('/profile/update', ["app\controllers\ProfileController", 'updateProfile']);
    $r->post('/profile/postSecurity', ["app\controllers\ProfileController", 'postSecurity']);

    $r->get('/logout', ["app\controllers\LoginController", "logout"]);

    $r->get('/news', ["app\controllers\NewsController", "index"]);


    $r->get('/photos/create', ["app\controllers\ImageController", "create"]);
    $r->get('/photo/store', ["app\controllers\ImageController", "store"]);
    $r->get('/image/{id}/edit', ["app\controllers\ImageController", "edit"]);
    $r->get('/category/{id}', ["app\controllers\HomeController", "category"]);
    $r->get('/images/delete/{id}', ["app\controllers\ImageController", "deleteImage"]);
    $r->get('/myimages', ["app\controllers\ImageController", "index"]);

    $r->get('/image/rotate/{id}', ["app\controllers\ImageController", "rotate"]);


    $r->addGroup('/admin', function (RouteCollector $r) {
        $r->get('/', ["app\Controllers\Admin\HomeController", 'index']);

        $r->get('/category', ["app\Controllers\Admin\CategoryController", 'index']);
        $r->get('/category/{id}/edit', ["app\Controllers\Admin\CategoryController", 'edit']);
        $r->get('/category/create', ["app\Controllers\Admin\CategoryController", 'create']);
        $r->get('/category/createNew', ["app\Controllers\Admin\CategoryController", 'createNew']);
        $r->get('/category/delete/{id}', ["app\Controllers\Admin\CategoryController", 'delete']);
        $r->get('/category/update/{id}', ["app\Controllers\Admin\CategoryController", 'update']);

        $r->get('/photos', ["app\Controllers\Admin\PhotosController", 'index']);
        $r->get('/photos/{id}/edit', ["app\Controllers\Admin\PhotosController", 'edit']);
        $r->get('/photos/{id}/delete', ["app\Controllers\Admin\PhotosController", 'delete']);

        $r->get('/users', ["app\Controllers\Admin\UserController", 'index']);
        $r->get('/users/create', ["app\Controllers\Admin\UserController", 'create']);
        $r->get('/users/{id}/edit', ["app\Controllers\Admin\UserController", 'edit']);

        $r->get('/news', ["app\Controllers\Admin\NewsController", 'index']);
        $r->get('/news/createView', ["app\Controllers\Admin\NewsController", 'createView']);
        $r->get('/news/create', ["app\Controllers\Admin\NewsController", 'create']);
        $r->post('/news/updateNew/{id}', ["app\Controllers\Admin\NewsController", 'updateNew']);
        $r->get('/news/edit/{id}', ["app\Controllers\Admin\NewsController", 'edit']);
        $r->get('/news/delete/{id}', ["app\Controllers\Admin\NewsController", 'deleteNew']);

        
        

        });

    /*$r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');*/
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        dd(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        //call_user_func($handler, $vars);
        $container->call($handler, $vars);
        break;
}