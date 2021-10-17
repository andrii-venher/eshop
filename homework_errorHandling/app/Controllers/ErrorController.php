<?php

namespace App\Controllers;

class ErrorController {
    public function index() {
        return renderView('error');
    }
}