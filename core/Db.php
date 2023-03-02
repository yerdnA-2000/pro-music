<?php

namespace core;

use PDO;

class Db
{
    protected PDO $db;

    public function __construct()
    {
        $config = require 'config/db.php';
        $this->db = new PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    public function query(string $sql, $params = []): bool|\PDOStatement
    {
        $statement = $this->db->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
        }
        $statement->execute();

        return $statement;
    }

    public function row(string $sql, $params = []): bool|array
    {
        return $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column(string $sql, $params = []): bool|array
    {
        return $this->query($sql, $params)->fetchColumn(PDO::FETCH_ASSOC);
    }

}