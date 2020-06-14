<?php

namespace app\controllers;

use app\Controllers\Controller;
use app\components\models\Users;

class ProfileController extends Controller
{

    private $userModel;

    public function __construct(Users $userModel)
    {
        parent::__construct();
        $this->userModel = $userModel;
    }


    public function showInfo()
    {
        $id = auth()->getUserId();

        $user = $this->userModel->getOne($id);

        echo $this->view->render('profile/info', ['user' => $user]);
    }

    public function securiti()
    {
        echo $this->view->render('profile/security');
    }

    public function postSecurity()
    {


        if ($_POST['new_password'] == $_POST['second_new_password'])
        {
            try {
                $this->auth->changePassword($_POST['password'], $_POST['new_password']);
                flash()->success(['Пароль успешно изменен.']);
                // password has been changed
                return redirect('/profile/security');
            }
            catch (\Delight\Auth\NotLoggedInException $e) {
                // not logged in
                flash()->error(['Залогиньтесь!']);
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                // invalid password(s)
                flash()->error(['Неправильный пароль!']);
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                // too many requests
                flash()->error(['Куда ломишься!']);
            }
            return redirect('/profile/security');
        } else {
            flash()->error(['Новые пароли не совпадают']);
            return redirect('/profile/security');
        }
    }

    public function updateProfile()
    {


        if ($this->userModel->update('users'))
        {
            flash()->success(['Данные успешно обновлены']);
            redirect('/profile/info');

        } else {
            flash()->error(['Произошла ошибка']);
            redirect('/profile/info');
        }
    }
}
