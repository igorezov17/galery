<?php 

namespace app\controllers;

use app\Controllers\Controller;
use JasonGrimes\Paginator;
use app\components\models\Image;

class ImageController extends Controller
{
    private $imageModel;

    public function __construct(Image $imageModel)
    {
        parent::__construct();
        $this->imageModel = $imageModel;
    }

    //моя галерея
    public function index()
    {
        $userId = $this->auth->getUserId();
        $imageFromUser = $this->database->findAllForUser('photos', $userId);
        $userid = $this->auth->getUserId();
        echo $this->view->render('image/index', ['imagesFromUser' => $imageFromUser, 'iduser' => $userId]);
    }

    // форма создания новой картинки
    public function create()
    {
        $categories = $this->database->getAll('category');
        echo $this->view->render('image/create', ['categories' => $categories]);
    }

    // добавление новой картинки в БД
    public function store()
    {
        $data = [
            'title' => $_GET['name'],
            'description' => $_GET['desc'],
            'user_id' => $this->auth->getUserId(),
            'category_id' => $_GET['category_id'],
            'image' => $_GET['resume']
        ];
        $newimage = $this->database->create('photos', $data);
        //flash()->success(['Изображение успешно добавлено']);
        flash()->warning(['Изображение успешно добавлено']);
        //print_r ($this->auth->getUserId());
        redirect('/photos/create');
    }

    public function deleteImage($id)
    {
        //dd("Вот вы на месте");

        $this->imageModel->delete('photos', $id);
        redirect('/myimages');
    }
}