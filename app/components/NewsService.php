<?php

namespace app\components;

use Aura\SqlQuery\QueryFactory;
use PDO;

class NewsService
{
    
    public $pdo;
    public $queryFactory;

    public function __construct(QueryFactory $queryFactory, PDO $pdo)
    {
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }

    public function newPost()
    {
        return 'New Post';
    }
}
