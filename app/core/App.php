<?php

class App {
    function splitURL() {
        // Menentukan default value dari url ketika tidak ada page yang dimasukkan
        // Nilai dari nama value 'url' didapat dari parameter url pada file .htaccess
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", $URL);
        return $URL;
    }
    
    function loadController() {
        $URL = $this->splitURL();
        $filename = "../app/controllers/" . $URL[0] . ".php";
        if(file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
        }
    }   
}