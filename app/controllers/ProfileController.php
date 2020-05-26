<?php

namespace app\controllers;

use app\Controllers\Controller;

class ProfileController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function showInfo()
    {
        echo $this->view->render('profile/info');
    }
}