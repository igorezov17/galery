<?php

namespace app\controllers;

use app\components\Database;
use League\Plates\Engine;
use app\components\NewsService;


class NewsController
{
    public $database;
    public $views;
    public $newservice;

    public function __construct(Engine $views, Database $database, NewsService $newservice)
    {
        $this->database = $database;
        $this->views = $views;
        $this->newservice = $newservice;
    }

    public function getPost()
    {
        $data = $this->newservice->newPost();
        dd($data);
    }

}