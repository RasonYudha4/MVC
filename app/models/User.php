<?php

class User {
    use Model;

    protected $table = 'users';

    // Digunakan untuk menentukan kolom yang dapat di edit
    protected $allowedColumns = [
        'name', 
        'age',
    ];
}