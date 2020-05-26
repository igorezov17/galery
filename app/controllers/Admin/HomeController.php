<?php

namespace app\controllers\Admin;

use app\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->view->render('admin/dashboard');
    }
}