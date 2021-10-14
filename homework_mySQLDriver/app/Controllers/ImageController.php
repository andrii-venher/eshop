<?php

namespace App\Controllers;

use DateTime;

class FileManagerController {
    private $storagePath = __DIR__ . '/../../storage/fileManager/';

    public function index() {
        return renderView('fileManager', ['files' => array_slice(scandir($this->storagePath), 2)]);
    }

    public function create() {
        if(!empty($_FILES['image']) && !empty($_FILES['image']['name'])) {
            for ($i=0; $i < count($_FILES['image']['name']); $i++) { 
                $extension = pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);
                $fileName = pathinfo($_FILES['image']['name'][$i], PATHINFO_FILENAME);
                $timestamp = (new DateTime())->getTimestamp();
                $image = "{$fileName}_{$timestamp}.{$extension}";
                $filePath = $this->storagePath . $image;
                move_uploaded_file($_FILES['image']['tmp_name'][$i], $filePath);
            }
        }
        
        redirect('/fileManager');
    }

    public function delete() {
        unlink($this->storagePath . $_POST['file']);
        
        redirect('/fileManager');
    }

    public function update() {
        $oldFileName = $_POST['file'];
        $extension = pathinfo($oldFileName, PATHINFO_EXTENSION);
        $timestamp = (new DateTime())->getTimestamp();
        $fileName = "{$_POST['name']}_{$timestamp}.{$extension}";

        rename($this->storagePath . $oldFileName, $this->storagePath . $fileName);
        
        redirect('/fileManager');
    }
}