<?php 

namespace app\components\models;

use PDO;
use Aura\SqlQuery\QueryFactory;
use app\components\Database;

class Users

{

    private $pdo;
    private $queryFactory;
    private $database;

    public function __construct(PDO $pdo, QueryFactory $queryFactory, Database $database)
    {
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
        $this->database = $database;
    }

    public function index()
    {
        $this->database->getAll('users', 6);
    }

}