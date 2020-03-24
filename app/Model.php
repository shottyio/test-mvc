<?php

namespace App;

use PDO;

class Model
{
    private $pdo;

    public function __construct()
    {
        $db = require __DIR__ . '/../config/db.php';
        try {
            $this->pdo = new PDO($db['dsn'], $db['username'], $db['password']);
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query($sql, $params = [])
    {
        $query = $this->pdo->prepare($sql);

        if ($params[':limit'] > 0) {
            $query->bindValue(':start', (int)$params[':start'], PDO::PARAM_INT);
            $query->bindValue(':limit', (int)$params[':limit'], PDO::PARAM_INT);
            $query->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        }

        $query->execute($params);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}