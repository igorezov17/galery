<?php 

namespace app\controllers\Admin;

use app\Controllers\Controller;
use app\components\models\Users;
use app\components\RegisterModel;

class UserController extends Controller
{
    public $userModel;
    public $regModel;

    public function __construct(Users $user, RegisterModel $regModel)
    {
        parent::__construct();
        $this->userModel = $user;
        $this->regModel = $regModel;
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

    public function edit($id)
    {
        $users = $this->database->getOne($id, 'users');
        echo $this->view->render('admin/users/edit', ['user' => $users]);
    }

    public function update($id)
    {

        if (isset($_POST['username']) && isset($_POST['email']) && $_POST['image'])
        {
            $this->database->updateUser('users', $id);
            flash()->success(['Пользователь изменен']);
            redirect('/admin/users');
        } else {
            flash()->error(["Заполните все поля"]);
            redirect('/admin/users');
        }
    }
    
    public function getrole($id)
    {

        if ($_POST['name'] == 'activ')
        {
            $this->database->role('users', $id, 1);
        } else {

            $this->database->role('users', $id, 0);
        }

        redirect('/admin/users');
        
    }

    public function createUser()
    {
        if (!empty($_POST))
        {
            try {

                $userId = $this->regModel->make($_POST['email'], $_POST['password'], $_POST['username']);
                $this->database->getVerify($userId);
                $this->database->insertImage($_POST['image'], 'users');
                redirect('/admin/users');
                }
                
                catch (\Delight\Auth\InvalidEmailException $e) {
                    flash()->error(['Неправильный email']);
                }
                catch (\Delight\Auth\InvalidPasswordException $e) {
                    flash()->error(['Неправильный пароль']);
                }
                catch (\Delight\Auth\UserAlreadyExistsException $e) {
                    flash()->error(['Пользователь уже существует']);
                }
                catch (\Delight\Auth\TooManyRequestsException $e) {
                    flash()->error(['Слишком много раз пытаетесь зарегаться']);
                }
                    
 

                redirect('/admin/users');
        } else {
            flash()->error(['Вы заполнили не все поля']);
            redirect('/admin/users');
        }

    }


    public function delete($id)
    {
        $this->database->delete('users', $id);
        redirect('/admin/users');
    }
}