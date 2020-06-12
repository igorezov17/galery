<?php 

namespace app\controllers\Admin;

use app\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $users = $this->database->getAll('users', 6);
        echo $this->view->render('admin/users/index', ['users' => $users]);
    }

    public function create()
    {

        echo $this->view->render('admin/users/create');
    }

    public function edit()
    {
        echo $this->view->render('admin/users/edit');
    }
}