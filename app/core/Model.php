<?php

class Model {
    use Database;
    protected $table = 'users';

    public function selectWhere($data, $data_not = []) {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach($keys_not as $key) {
            $query .= " != :" . $key . " && "; 
        }

        // Dilakukan untuk menghapus tanda "&&" yang berada di akhir query
        $query = trim($query, " && ");
        // Dilakukan karena method query pada Database hanya menerima 2 parameter sehingga parameter data dan data_not harus digabungkan
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }

    public function select($data, $data_not = []) {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach($keys_not as $key) {
            $query .= " != :" . $key . " && "; 
        }

        // Dilakukan untuk menghapus tanda "&&" yang berada di akhir query
        $query = trim($query, " && ");
        // Dilakukan karena method query pada Database hanya menerima 2 parameter sehingga parameter data dan data_not harus digabungkan
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        
        if($result) {
            return $result[0];
        }

        return false;
    }

    public function update($id, $data, $id_column = 'id') {
        
    }
    
    public function delete($id, $id_column = 'id') {
        
    }
}