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


        try {

            $rememberDuration = null;

            if (isset($_POST['remember'])) {
                // keep logged in for one year
                $rememberDuration = (int) (60 * 60 * 24 * 365.25);
            }

            $this->auth->login($_POST['login'], $_POST['password'], $rememberDuration);
        
            redirect('/');
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['Неверный адрес электронной почты']);
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error(['Неверный паароль']);
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error(['Email not verified']);
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['Слишком много попыток']);
        }
        redirect ('/login');
    }

    public function logout()
    {
        $this->auth->logout();
        redirect("/");
    }
}