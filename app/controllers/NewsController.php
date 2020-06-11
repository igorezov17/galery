<?php

namespace app\controllers;


//require_once "../../vendor/electrolinux/phpquery/phpQuery/phpQuery.php";
use app\components\Database;
use League\Plates\Engine;
use app\components\NewsService;
use PhpQuery\PhpQuery;

//include 'phpQuery-onefile.php';


class NewsController 
{
    public $database;
    public $views;
    public $newservice;
    public $phpQuery;

    public function __construct(Engine $views, Database $database, NewsService $newservice)
    {
        $this->database = $database;
        $this->views = $views;
        $this->newservice = $newservice;
        $this->phpQuery = new PhpQuery;
    }


    public function index()
    {
        $posts = $this->newservice->getAllNews();
        echo $this->views->render('news', ['news' => $posts]);
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
        $url = "https://iz.ru/1013670/video/uchenye-rasskazali-o-neobychnom-zelenom-snege-v-antarktide";
        $html = file_get_contents($url);
        //$html = htmlspecialchars($html);*/
        //dd($this->phpQuery);

        $html = htmlspecialchars($html);

        //dd($html);
        $pattern = '<meta name="twitter:description" content="(.*)" \/>';
        
        //'/<div itemprop="articleBody">(.*)<\/a><\/p><div class="more_style_three">/';
        preg_match($pattern, $html, $match);


        echo $this->views->render('news', ["str" => $match]);
    }

}