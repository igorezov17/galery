<?php 

namespace app\components\models;

use Aura\SqlQuery\QueryFactory;
use PDO;

class model
{
    protected $pdo;
    protected $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }
}