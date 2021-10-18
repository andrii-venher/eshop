<?php

namespace App\Controllers;

use Exception;

class DebugController {
    public function index() {
        trigger_error('User error...', E_USER_ERROR);
        throw new Exception('Custom exception!');
    }
}