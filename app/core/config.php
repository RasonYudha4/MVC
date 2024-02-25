<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('DBNAME', 'mvcquickprogramming');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('ROOT', 'http://localhost:8080/belajar-php/mvc/public');
} else {
    define('ROOT', 'https://www.yourweb.com');
}

// Berfungsi untuk menunjukkan error ketika bernilai true dan false ketika ingin dijalankan pada live server
define('DEBUG', true);