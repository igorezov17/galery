<?php

namespace app\controllers\Admin;

use app\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        dd($this->view);
    }
}