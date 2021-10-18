<?php

namespace App\Models;

use App\Core\ModelDrivers\MySQLModelDriver;

class Model
{
    protected static $table = null;
    protected $fields = [];
    protected $fillable = null;

    protected static function getDriver() 
    {
        static $driver = null;
        if(!is_null($driver)) {
            return $driver;
        }
        $driver = new MySQLModelDriver(static::$table);
        return $driver;
    }

    public function __construct($fields = [])
    {
        $this->fields = $fields;
    }

    public static function all()
    {
        $rows = static::getDriver()->getAll();
        $output = [];
        if($rows) {
            foreach($rows as $row) {
                $output[] = new static($row);
            }
        }
        return $output;
    }

    public function save()
    {
        $fields = [];
        foreach ($this->fillable as $fillable) {
            if(in_array($fillable, array_keys($this->fields))) {
                $fields[$fillable] = $this->fields[$fillable];
            }
        }
        static::getDriver()->insert($fields);
    }

    public function getFields()
    {
        return $this->fields;
    }

    public static function allAsArray()
    {
        $output = [];
        $all = static::all();
        if ($all) {
            foreach($all as $obj) {
                $output[] = $obj->getFields();
            }
        }

        return $output;
    }

    public function delete() {
        static::getDriver()->delete($this->fields['id']);
    }

    public function __set($name, $value) 
    {
        $this->fields[$name] = $value;
    }

    public function __get($name) 
    {
        return $this->fields[$name] ?? null;
    }
}