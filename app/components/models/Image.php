<?php 

namespace app\components\models;

use Aura\SqlQuery\QueryFactory;
use PDO;

class Image 
{
    protected $pdo;
    protected $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }


    public function update($table, $data, $id)
    {
        if ($_GET['name'] == 0 || $_GET['desc'] == 0 || $_GET['resume'])
        {
            flash()->error(["Вы заполнили не все поля"]);
            redirect('/photos/edit');
        } else {

            dd("ты на update");
            $update = $this->queryFactory->newUpdate();
            $update
                ->table('photos')                  // update this table
                ->cols(['verified'])
                ->set('verified', '1') 
                ->bindValues(['id' => $id])           // raw value as "(ts) VALUES (NOW())"
                ->where('id = :id'); 
    
                // prepare the statement
                $sth = $this->pdo->prepare($update->getStatement());
    
                // execute with bound values
                $sth->execute($update->getBindValues());
        }
    }

    public function delete($table, $id)
    {

        $delete = $this->queryFactory->newDelete();
        $delete
            ->from($table)                   // FROM this table
            ->where('id = :id')
            ->bindValues([':id' => $id]);  

            // prepare the statement
            $sth = $this->pdo->prepare($delete->getStatement());
            
            // execute with bound values
            return $sth->execute($delete->getBindValues());
    }

    public function getAll()
    {
        $sql = "SELECT 
                    photos.id AS phtId, 
                    photos.description AS phtName, 
                    photos.image AS phtImage,
                    category.title AS ctgTitle, 
                    users.username AS usrName 
                FROM photos 
                LEFT JOIN category ON photos.category_id = category.id 
                LEFT JOIN users ON photos.user_id = users.id";
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}