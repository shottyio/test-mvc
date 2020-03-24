<?php

namespace App;

use PDO;

abstract class Model
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

    abstract protected function table();

    public function query($sql, $params = [])
    {
        $query = $this->pdo->prepare($sql);

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

    public function getProperties()
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
}