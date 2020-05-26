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

    public function getImageAndCategory($limite = null)
    {

        $sql = 'SELECT photos.id, photos.title, photos.image,  photos.date, category.title as catname FROM photos INNER JOIN category ON photos.category_id = category.id';
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);

        /*$select = $this->queryFactory->newSelect();
        $select
            ->cols([
                'photos.id',
                'photos.title',
                'photos.date',
                'category.title as catname' 
            ])
            ->from('photos')
            ->limit($limite)
            ->join(
                'INNER',
                'category as category',
                'photos.category_id = category.id'
            );

            $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
            $sth->execute($select->getBindValues());

            // get the results back as an associative array
            return $sth->fetchAll(PDO::FETCH_ASSOC);*/


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

    public function getPaginatedFrom($table,$row, $id, $page = 1, $rows = 1)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where("$row = :row")
            ->bindValue(':row', $id)
            ->page($page)
            ->setPaging($rows);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
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
        /*$select = $this->queryFactory->newSelect();
        $select
            ->cols([
                'id',
                'title',
                'image',
                'date'
                ])
            ->from($table)
            ->bindvalues([':id' => $id])
            ->where('category_id = :id');

        $sth = $this->pdo->prepare($select->getStatement());

            // bind the values and execute
        $sth->execute($select->getBindValues());

            // get the results back as an associative array
        return $result = $sth->fetchAll(PDO::FETCH_ASSOC);*/
        $sql = 'SELECT photos.id AS photoid, photos.title AS phototitle, photos.image AS photosimg, photos.date AS photodt, category.id AS catid, category.title AS cattitle FROM photos INNER JOIN category ON photos.category_id = category.id WHERE category.id = :id';

        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}