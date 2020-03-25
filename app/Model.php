<?php

namespace App;

use PDO;

abstract class Model
{
    abstract protected function table();

    private function connect()
    {
        $db = require __DIR__ . '/../config/db.php';
        try {
            return new PDO($db['dsn'], $db['username'], $db['password']);
        } catch (\PDOException $e) {
            print $e->getMessage();
            die();
        }
    }

    public function query($sql, array $params = [])
    {
        $query = $this->connect()->prepare($sql);

        $query->execute($params);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function all()
    {
        return $this->query("SELECT * FROM " . $this->table());
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM " . $this->table() . " WHERE id = :id", ['id' => $id]);
    }

    public function save()
    {
        $data = [];

        $columns = [];

        foreach ($this as $key => $value) {
            $data[$key] = $value;
            $columns[] = ':' . $key;
        }

        $fields = implode(', ', array_keys($data));

        $columns = implode(', ', $columns);

        return $this->query("INSERT INTO " . $this->table() . " ($fields) VALUES ($columns)", $data);
    }
}