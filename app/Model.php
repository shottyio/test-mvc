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

    private function getProperties()
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $getProperties = [];

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $getProperties[$propertyName] = $this->$propertyName;
        }
        return $getProperties;
    }

    public function save()
    {
        print_r($this);
//        $this->insert($this->getProperties());
    }

    private function insert(array $getProperties)
    {
        $properties = array_filter($getProperties);

        $data = [];

        $columns = [];

        foreach ($properties as $column => $value) {
            $data[$column] = $value;
            $columns[] = ':' . $column;
        }

        $fields = implode(', ', array_keys($data));

        $columns = implode(', ', $columns);

//        return $this->query("INSERT INTO " . $this->table() . " ($fields) VALUES ($columns)", $data);
    }
}