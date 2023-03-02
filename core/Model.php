<?php

namespace core;

class Model extends BaseModel
{
    public object $db;

    protected string $tableName;

    public function __construct()
    {
        $this->db = new Db();
        $this->setTableName();
    }

    /**
     * @param string|null $tableName
     */
    public function setTableName(string $tableName = null): void
    {
        if ($tableName === null) {
            $modelName = (new \ReflectionClass($this))->getShortName();
            $this->tableName = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $modelName));
        } else {
            $this->tableName = $tableName;
        }
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function all(): bool|array
    {
        return $this->db->row('SELECT * FROM ' . $this->tableName);
    }


    public function one(int $id): bool|array
    {
        return $this->db->row('SELECT * FROM ' . $this->tableName . ' WHERE id = :id', ['id' => $id]);
    }

    public function create(array $data): bool
    {
        $result = $this->db->row('INSERT INTO ' . $this->tableName .
            ' (`name`, `phone`, `email`, `message`) VALUES (:name, :phone, :email, :message)', $data);

        return is_array($result);
    }

    public function update(int $id): bool|array
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool|array
    {
        // TODO: Implement delete() method.
    }
}