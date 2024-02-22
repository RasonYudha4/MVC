<?php

class App {
    private $controller = 'Home';
    private $method = 'index'; 

    private function splitURL() {
        // Menentukan default value dari url ketika tidak ada page yang dimasukkan
        // Nilai dari nama value 'url' didapat dari parameter url pada file .htaccess
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", $URL);
        return $URL;
    }
    
    public function loadController() {
        $URL = $this->splitURL();
        $filename = "../app/controllers/" . $URL[0] . ".php";
        if(file_exists($filename)) {
            require $filename;
            $this->controller = $URL[0];
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = '_404';
        }
        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }   
}