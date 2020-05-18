<?php

namespace app\controllers;

use app\components\Database;
use League\Plates\Engine;

class HomeController
{
    private $view;
    private $database;

    public function __construct(Engine $views, Database $database)
    {
        $this->view = $views;
        $this->database = $database;
    }

    public function index()
    {

        $photos = $this->database->getAll();


        echo $this->view->render('home', ['images' => $photos]);
    }

    public function show($id)
    {
        $photo = $this->database->getOne($id);
        echo $this->view->render('image/show', ['image' => $photo]);
    }
}