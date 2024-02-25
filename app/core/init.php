<?php

// Sebuah function untuk melakukan pemanggilan ketika kelas tidak ada pada initialize
spl_autoload_register(function($classname){
    require '../app/models/'. $classname . '.php';
});

require 'config.php';
require 'function.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';