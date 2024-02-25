<?php

class Home extends Controller {
    public function index() {
        $user = new User;
        $arr['name'] = "Putra";
        $arr['age'] = 29;

        $result = $user->insert($arr);

        $this->view('home');
    }
}