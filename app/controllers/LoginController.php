<?php

namespace app\controllers;

use app\components\Database;
use League\Plates\Engine;
use app\Controllers\Controller;
use Delight\Auth\Auth;

class LoginController 
{

    private $view;
    private $database;
    public $auth;

    public function __construct(Database $database, Engine $view, Auth $auth)
    {
        //parent::__construct();
        $this->auth = $auth;
        $this->database = $database;
        $this->view = $view;
        
    }

    public function login()
    {
        //var_dump($this->auth);
         echo $this->view->render("login/loginView");
    }


    public function loginin()
    {
        //dd("Мы внутри loginIn()");
        /*if ($this->auth->login($_POST['email'], $_POST['password']))
        {
            echo 'User is logged in';
        } else {
            echo "нет";
        }*/


        try {
            $this->auth->login($_POST['login'], $_POST['password']);
        
            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
        
    }
}