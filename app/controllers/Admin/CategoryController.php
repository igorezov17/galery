<?php 

namespace app\controllers\Admin;

use app\controllers\Controller;
use app\components\models\Category;

class CategoryController extends Controller
{
    private $categModel;

    public function __construct(Category $category)
    {
        parent::__construct();
        $this->categModel = $category;
    }


    public function index()
    {
        $categor = $this->database->getAll('category');
        echo $this->view->render("admin/category/index", ['categories' => $categor]);
    }

    public function edit($id)
    {
        echo $this->view->render("admin/category/edit", ["id" => $id]);
    }

    public function create()
    {

        echo $this->view->render("admin/category/create");
    }


    public function createNew()
    {
        $data = $_GET;
        $this->database->create('category', $data);
        redirect('/admin/category');
    }

    public function update($id)
    {

        $this->categModel->update('category', $id);
        redirect('/admin/category');
    }

    public function delete($id)
    {
        $this->database->delete('category', $id);
        redirect('/admin/category');
    }


}