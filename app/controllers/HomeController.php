<?php

namespace app\controllers;

use app\components\Database;
use League\Plates\Engine;
use app\components\models\Home;

class HomeController
{
    private $view;
    private $database;
    private $homeModel;

    public function __construct(Engine $views, Database $database, Home $homeModel)
    {
        $this->view = $views;
        $this->database = $database;
        $this->homeModel = $homeModel;
    }

    public function index()
    {
        $photos = $this->database->getImageAndCategory();


        echo $this->view->render('home', ['images' => $photos]);
    }

    public function show($id)
    {
        $photo = $this->database->getOne($id, 'photos');
        $ImageAndUsers = $this->homeModel->getImageAndUser();
        echo $this->view->render('image/show', ['image' => $photo, 'imagesandusers' => $ImageAndUsers]);
    }

    public function category($id)
    {
        $imagefromcategory = $this->database->findAllForCategory( $id);

        echo $this->view->render('category', ['images' => $imagefromcategory]);
    }

}