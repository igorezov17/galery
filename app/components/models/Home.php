<?php 


namespace app\components\models;

use Aura\SqlQuery\QueryFactory;
use PDO;

class Home
{
    private $pdo;
    private $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }


    public function getImageAndUser()
    {
        $sql = 'SELECT  photos.id AS photid, 
                        photos.description AS photodesc, 
                        photos.image AS photimg, 
                        photos.date AS phtdat, 
                        users.username AS usrname, 
                        users.id AS usrid, 
                        category.id AS catid, 
                        category.title AS cattitl 
                FROM users 
                    INNER JOIN photos ON users.id = photos.user_id 
                    LEFT JOIN category ON category.id = photos.category_id LIMIT 4';
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}