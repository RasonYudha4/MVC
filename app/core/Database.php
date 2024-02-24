<?php

trait Database {
    private function connect() {
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $conn = new PDO($string, DBUSER, DBPASS);
        return $conn;
    }

    function query($query, $data = []) {
        $conn = $this->connect();
        $state = $conn->prepare($query);

        $check = $state->execute($data);
        if($check) {
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    function get_row($query, $data = []) {
        $conn = $this->connect();
        $state = $conn->prepare($query);

        $check = $state->execute($data);
        if($check) {
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
    }
}
