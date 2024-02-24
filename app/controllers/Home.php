<?php

class Home extends Controller {
    public function index() {
        $model = new Model;
        $arr['id'] = 1;
        $arr['name'] = "Rifki";

        $result = $model->selectWhere($arr);

        $this->view('home');
    }
}