<?php

class Home extends Controller {
    public function index() {
        $model = new Model;
        $arr['name'] = "Putra";
        $arr['age'] = 29;

        $result = $model->update(2, $arr);

        $this->view('home');
    }
}