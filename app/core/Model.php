<?php

Trait Model {
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
    
    public function insert($data) {
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (". implode(",", $keys) .") VALUES (:". implode(", :", $keys) .")";
        $this->query($query, $data);
        return false;
    }

    public function update($id, $data, $id_column = 'id') {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }
        // Dilakukan untuk menghapus tanda ", " yang berada di akhir query
        $query = trim($query, ", ");

        $query .= " WHERE $id_column = :$id_column";

        $data[$id_column] = $id;
        $this->query($query, $data);

        return false;
    }
    
    public function delete($id, $id_column = 'id') {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";
        $this->query($query, $data);
        return false;
    }
}