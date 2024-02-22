<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('ROOT', 'http://localhost:8080/belajar-php/mvc/public');
} else {
    define('ROOT', 'https://www.yourweb.com');
}
