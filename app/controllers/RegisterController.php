<?php 

namespace app\controllers;

/*use League\Plates\Engine;
use app\components\Database;
use Delight\Auth\Auth;*/
use app\components\RegisterModel;
use app\controllers\Controller;

class RegisterController extends Controller
{
    public $regModel;

    public function __construct(RegisterModel $regModel)
    {
        parent::__construct();
        $this->regModel = $regModel;
        
    }

    public function showForm()
    {
        echo $this->view->render('register/registerView');
    }

    public function registerin()
    {

        try {

        $userId = $this->regModel->make($_POST['email'], $_POST['password'], $_POST['username']);
        $this->database->getVerify($userId);
        redirect('/login');
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
            
        return redirect('/register');

        
    }


}