<?php

namespace app\components;

use Delight\Auth\Auth;
use Aura\SqlQuery\QueryFactory;
use PDO;

class RegisterModel
{
    private $pdo;
    private $queryFactory;
    private $auth;

    public function __construct(PDO $pdo, QueryFactory $queryFactory, Auth $auth)
    {
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
        $this->auth = $auth;
    }

    public function make($email, $password, $username)
    {
        $userId = $this->auth->register($email, $password, $username, function ($selector, $token) use($email) {
            // send `$selector` and `$token` to the user (e.g. via email
        });

        return $userId;
    }

}
