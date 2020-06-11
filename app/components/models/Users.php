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

    public function getOne($id)
    {
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from('users')
            ->bindValues([':id' => $id])
            ->where('id = :id');

            $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
            $sth->execute($select->getBindValues());

            // get the results back as an associative array
            return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function update($table)
    {

        $id = auth()->getUserId();
        $update = $this->queryFactory->newUpdate();
        $update
        ->table($table)                  // update this table
        ->cols([                        // bind values as "SET bar = :bar"
            'email' => $_POST['email'],
            'username' =>  $_POST['username'],
            'image' => $_FILES['name']
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