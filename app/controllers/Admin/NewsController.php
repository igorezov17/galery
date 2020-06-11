<?php 

namespace app\controllers\Admin;

use app\components\NewsService;
use app\Controllers\Controller;

class NewsController extends Controller
{
    public $newsService;

    public function __construct(NewsService $newsService)
    {
        parent::__construct();
        $this->newsService = $newsService;
    }

    public function index()
    {
        $posts = $this->newsService->getAllNews();
        echo $this->view->render('admin/news/index', ['news' => $posts]);
    }

    public function create()
    {
        echo $this->view->render('admin/news/create');
    }

    public function edit()
    {

        echo $this->view->render('admin/news/edit');
    }
}