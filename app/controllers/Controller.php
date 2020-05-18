<?php

namespace app\Controllers;


use app\components\Database;
use Delight\Auth\Auth;
use League\Plates\Engine;
use Aura\SqlQuery\QueryFactory;
use PDO;

class Controller
{
    protected $auth;
    protected $view;
    protected $database;

    public function __construct()
    {
        $this->auth = components(Auth::class);
        $this->view = components(Engine::class);
        $this->database = components(Database::class);
    }


}