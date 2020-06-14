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

    public function getAll($table, $limite = null)
    {
       
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from($table)
            ->limit($limite);

            $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
            $sth->execute($select->getBindValues());

            // get the results back as an associative array
            return $sth->fetchAll(PDO::FETCH_ASSOC);


    }

    public function getImageAndCategory()
    {
        //dd($this->queryFactory);
        $sql = 'SELECT photos.id, photos.title, photos.image,  photos.date, category.title as catname FROM photos 
        INNER JOIN category ON photos.category_id = category.id';

        $sth = $this->pdo->prepare($sql);
        $sth->execute();
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

    public function getOne($id, $table)
    {
        
        $select = $this->queryFactory->newSelect();
        $select
            ->cols(['*'])
            ->from($table)
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



    public function getCount($table, $row, $value)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where("$row = :$row")
            ->bindValue($row, $value);


        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return count($sth->fetchAll(PDO::FETCH_ASSOC));
    }

    public function create($table, $data)
    {
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues()); 

        $name = $insert->getLastInsertIdName('id');
        
        return $this->pdo->lastInsertId($name);
    }

    public function findAllForUser($table, $id)
    {
        $select = $this->queryFactory->newSelect();
        $select
            ->cols([
                'id',
                'image'
                ])
            ->from($table)
            ->bindvalues([':id' => $id])
            ->where('user_id = :id');

        $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
        $sth->execute($select->getBindValues());

            // get the results back as an associative array
        return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllForCategory($id)
    {

        $sql = 'SELECT photos.id AS photoid, photos.title AS phototitle, photos.image AS photosimg, photos.date AS photodt, category.id AS catid, category.title AS cattitle FROM photos INNER JOIN category ON photos.category_id = category.id WHERE category.id = :id';

        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    public function role($table, $id, $role)
    {

        $update = $this->queryFactory->newUpdate();
        $update
        ->table($table)                  // update this table
        ->cols([                        // bind values as "SET bar = :bar"
            'status' => $role,
        ])
           // raw value as "(ts) VALUES (NOW())"
        ->where('id = :id')      // bind this value to the condition
        ->bindValues([                  // bind these values to the query
            ':id' => $id,

        ]);

        // prepare the statement
        $sth = $this->pdo->prepare($update->getStatement());
            
        // execute with bound values
        return $sth->execute($update->getBindValues());
    }


    public function updateUser($table, $id)
    {

        $update = $this->queryFactory->newUpdate();
        $update
        ->table($table)                  // update this table
        ->cols([                        // bind values as "SET bar = :bar"
            'email' => $_POST['email'],
            'username' =>  $_POST['username'],
            'image' => $_POST['image']
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

    public function insertImage($image, $table)
    {
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($image);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues()); 
        dd($sth);
        $name = $insert->getLastInsertIdName('id');
        
        return $this->pdo->lastInsertId($name);
    }

    public function delete($table,$id)
    {
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValue('id', $id);

        $sth = $this->pdo->prepare($delete->getStatement());

        $sth->execute($delete->getBindValues());
    }
}