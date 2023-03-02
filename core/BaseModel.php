<?php

namespace core;

abstract class BaseModel
{
    public object $db;

    protected string $tableName;

    abstract public function getTableName(): string;
    abstract public function setTableName(string $tableName = null): void;
    abstract public function all(): bool|array;
    abstract public function one(int $id): bool|array;
    abstract public function create(array $data): bool;
    abstract public function update(int $id): bool|array;
    abstract public function delete(int $id): bool|array;
}