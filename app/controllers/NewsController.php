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
        /*$ch = curl_init('https://yandex.ru');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);
         
        echo $html;*/

        echo $this->views->render('news');
    }

}