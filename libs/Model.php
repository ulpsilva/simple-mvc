<?php

class Model {

    public $connection;

    function __construct() {
        //database
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection failed");
        }
    }

    public function query($sql) {
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    public function escape_string($string) {
        return mysqli_real_escape_string($this->connection,$string);
    }

    public function instantiation($obj, $the_record) {
        foreach ($the_record as $the_attribute => $value) {
            if ($obj->has_the_attribute($the_attribute)) {
                $obj->$the_attribute = $value;
            }
        }

        return $obj;
    }

    public function has_the_attribute($the_attribute) {
        $obj_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $obj_properties);
    }
}