<?php

namespace App\Controllers;

class BaseController {

    protected $conn;

    public function __construct($conn) {

        $this->conn = $conn;
    }

    protected function validate($text){
        return htmlspecialchars(trim($text));
    }
    public function render(string $view, $data = []){

        extract($data);

        require __DIR__ ."/../../views/layout.php";
    }
}