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

    public function update($table, $data, $id)
    {


        $update = $this->queryFactory->newUpdate();
        $update
        ->table($table)                  // update this table
        ->cols([                        // bind values as "SET bar = :bar"
            'title' => $data['name'],
            'description' =>  $data['username'],

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
