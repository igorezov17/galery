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
}