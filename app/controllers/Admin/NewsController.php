<?php 

namespace app\controllers\Admin;

use app\Controllers\Controller;

class NewsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo $this->view->render('admin/news/index');
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