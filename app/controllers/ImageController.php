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

        //dd($_GET);
        if ($_GET['name'] == 0 || $_GET['desc'] == 0 || $_GET['resume'])
        {
            flash()->error(["Вы заполнили не все поля"]);
            redirect('/photos/create');
        } else {
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

    }

    public function edit($id)
    {
        echo $this->view->render('image/edit', ['id' => $id]);
    }

    public function update($id)
    {
        if ($_GET['name'] == 0 || $_GET['desc'] == 0 || $_GET['resume'])
        {
            flash()->error(["Вы заполнили не все поля"]);
            redirect('/photos/create');
        } else {
            $data = [
                'title' => $_GET['name'],
                'description' => $_GET['desc'],
                'user_id' => $this->auth->getUserId(),
                'category_id' => $_GET['category_id'],
                'image' => $_GET['resume']
            ];
            $newimage = $this->imageModel->update('photos', $data);
            //flash()->success(['Изображение успешно добавлено']);
            flash()->warning(['Изображение успешно добавлено']);
            //print_r ($this->auth->getUserId());
            redirect('/photos/create');
        }
    }

    public function deleteImage($id)
    {
        //dd("Вот вы на месте");

        $this->imageModel->delete('photos', $id);
        redirect('/myimages');
    }

    public function rotate($id)
    {
        $image = $this->database->getOne($id, 'photos');

        $path = './uploads/'.$image['image'];
  

        $filename = $image['image'];


        $source = imagecreatefromjpeg($path);

       $a=  imagerotate($source, 90, 0);

        imagejpeg($a, $path);
        redirect('/myimages');

$img = imagecreatefromjpeg($image);    // Картинка
    $degrees = 90;                         //Наклон картинки
    $imgRotated = imagerotate($img, $degrees, 0);
    imagejpeg($imgRotated, $new_image, 90); 
    }
}