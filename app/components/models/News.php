<?php 

namespace app\components\models;

use PDO;
use Aura\SqlQuery\QueryFactory;
use app\components\Database;

class News
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


    public function update($table, $id)
    {
        //$id = auth()->getUserId();
        $update = $this->queryFactory->newUpdate();
        $update
        ->table($table)                  // update this table
        ->cols([                        // bind values as "SET bar = :bar"
            'title' => $_POST['title'],
            'description' =>  $_POST['description'],
            'image' => $_FILES['image']['name']
        ])
           // raw value as "(ts) VALUES (NOW())"
        ->where('id = :id')      // bind this value to the condition
        ->bindValues([                  // bind these values to the query
            ':id' => $id
        ]);

        // prepare the statement
        $sth = $this->pdo->prepare($update->getStatement());

        // execute with bound values
        return $sth->execute($update->getBindValues());
            
    }
}
