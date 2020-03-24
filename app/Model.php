<?php

namespace App;

use PDO;

class Model
{
    private $pdo;

    protected $table;

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

        $query->execute($params);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function all()
    {
        return $this->query("SELECT * FROM $this->table");
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM $this->table WHERE id = :id", ['id' => $id]);
    }
}