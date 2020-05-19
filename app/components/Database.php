<?php

namespace app\components;

use Aura\SqlQuery\QueryFactory;
use PDO;


class Database
{
    private $pdo;
    private $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
    }

    public function getAll()
    {
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from('photos');

            $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
            $sth->execute($select->getBindValues());

            // get the results back as an associative array
            return $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getVerify($id)
    {
        $update = $this->queryFactory->newUpdate();
        $update
            ->table('users')                  // update this table
            ->cols(['verified'])
            ->set('verified', '1') 
            ->bindValues(['id' => $id])           // raw value as "(ts) VALUES (NOW())"
            ->where('id = :id'); 

            // prepare the statement
            $sth = $this->pdo->prepare($update->getStatement());

            // execute with bound values
            $sth->execute($update->getBindValues());
    }

    public function getOne($id)
    {
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from('photos')
            ->bindValues([':id' => $id])
            ->where('id = :id');

            $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
            $sth->execute($select->getBindValues());

            // get the results back as an associative array
            return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function verify($id)
    {
        $update = $this->queryFactory->newUpdate();
        $update
            ->table('users')
            ->set('verified', 1) 
            ->bindValues(['id' => $id])
            ->where('id = :id'); 
    }
}