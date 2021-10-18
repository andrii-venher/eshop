<?php

namespace App\Core\ModelDrivers;

interface Contract 
{
    public function __construct($tableName);
    public function getAll(): array;
    public function insert($data): bool;
    public function update($id, $data) : bool;
    public function delete($id) : bool;
    public function where($field, $condition, $value);
    public function getTableName();
}