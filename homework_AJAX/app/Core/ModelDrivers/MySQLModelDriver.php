<?php

namespace App\Core\ModelDrivers;

use mysqli;

class MySQLModelDriver implements Contract 
{
    private $connection;
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->connection = new mysqli('127.0.0.1:3306', 'root', null, 'eshop');
    }

    public function getAll(): array
    {
        $res = $this->connection->query("SELECT * FROM {$this->table}");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    
    public function insert($data) : bool
    {
        $keys = '';
        $values = '';
        foreach($data as $key => $value) {
            $keys .= "{$key}, ";
            $values .= "'{$value}', ";
        } 
        $keys = substr($keys, 0, strlen($keys) - 2);
        $values = substr($values, 0, strlen($values) - 2);
        return $this->connection->query("INSERT INTO {$this->table}({$keys}) VALUES ({$values})");
    }

    public function update($id, $data) : bool
    {
        $set = '';
        foreach($data as $key => $value) {
            $set .= "{$key} = '{$value}', ";
        } 
        $set = substr($set, 0, strlen($set) - 2);
        return $this->connection->query("UPDATE {$this->table} SET {$set} WHERE id = {$id}");
    }

    public function delete($id) : bool
    {
        return $this->connection->query("DELETE FROM {$this->table} WHERE id = {$id}");
    }

    public function where($field, $condition, $value)
    {
        $res = $this->connection->query("SELECT * FROM {$this->table} WHERE {$field} {$condition} {$value}");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getTableName() 
    {
        return $this->table;
    }
}