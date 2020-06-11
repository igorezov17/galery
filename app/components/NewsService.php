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

    public function getAllNews()
    {
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from('news');


            $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
            $sth->execute($select->getBindValues());

            // get the results back as an associative array
            return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
