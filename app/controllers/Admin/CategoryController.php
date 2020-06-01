<?php 

namespace app\controllers\Admin;

use app\controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $categor = $this->database->getAll('category');
        echo $this->view->render("admin/category/index", ['categories' => $categor]);
    }

    public function edit()
    {

        echo $this->view->render("admin/category/edit");
    }

    public function create()
    {

        echo $this->view->render("admin/category/create");
    }
}