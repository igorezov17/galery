<?php 

namespace app\controllers\Admin;

use app\components\NewsService;
use app\Controllers\Controller;
use Respect\Validation\Exceptions\WritableException;
use app\components\models\News;

class NewsController extends Controller
{
    public $newsService;
    private $newsModel;

    public function __construct(NewsService $newsService, News $news)
    {
        parent::__construct();
        $this->newsService = $newsService;
        $this->newsModel = $news;
    }

    public function index()
    {
        $posts = $this->newsService->getAllNews();
        echo $this->view->render('admin/news/index', ['news' => $posts]);
    }

    public function createView()
    {
        echo $this->view->render('admin/news/create');
    }

    public function edit($id)
    {
        echo $this->view->render('admin/news/edit', ['id' => $id]);
    }

    public function updateNew($id)
    {

        $this->newsModel->update('news', $id);
        redirect('/admin/news');
    }

    public function create()
    {
        $data = $_GET;
        if (isset($_GET['title']) && isset($_GET['description']))
        {
            $this->database->create('news', $data);
            redirect('/news');
        } else {
            redirect('/news');
        }

    }

    public function deleteNew($id)
    {
        $this->database->delete('news' ,$id);
        return back();
    }
}