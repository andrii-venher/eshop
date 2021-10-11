<?php

class Model {
    protected $fileName = null;
    protected $fields = [];

    public function all() {
        $path = __DIR__ . "/../db/{$this->fileName}.json";
        if(file_exists($path)) {
            $output = json_decode(file_get_contents($path), true);
            return $output ?? [];
        }
        return [];
    }

    public function save() {
        $path = __DIR__ . "/../db/{$this->fileName}.json";
        $array = $this->all($path);
        $array[] = $this->fields;
        file_put_contents($path, json_encode($array));
    }

    public function delete() {
        $path = __DIR__ . "/../db/{$this->fileName}.json";
        $array = $this->all($path);
        $newArray = [];
        $deleted = false;
        foreach($array as $product) {
            $counter = count($product);
            foreach($product as $key => $value) {
                if($product[$key] === $this->fields[$key]) {
                    $counter--;
                }
            }
            if($counter == 0 && !$deleted) {
                $deleted = true;
                if($product['image']) {
                    unlink(__DIR__ . '/../storage/' . $product['image']);
                }
                continue;
            }
            $newArray[] = $product;
        }
        file_put_contents($path, json_encode($newArray));
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