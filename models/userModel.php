<?php

class UserModel extends Model {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    function __construct() {
        Parent::__construct();
    }

    public function findAll() {
        $result_set = $this->query("SELECT * FROM users");
        $the_obj_array = array();

        if ($result_set) {
            while ($row = mysqli_fetch_array($result_set)) {
                $the_obj_array[] = $this->instantiation(new UserModel(), $row);
            }
            return $the_obj_array;
        } else {
            return false;
        }


    }

    public function findById($id) {
        $result_set = $this->query("SELECT * FROM users WHERE id = $id LIMIT 1");
        if ($result_set) {
            $found_user = mysqli_fetch_array($result_set);
            return $this->instantiation(new UserModel(), $found_user);
        } else {
            return false;
        }
    }

    public function create() {
        $query = "INSERT INTO `users`(`username`, `password`, `first_name`, `last_name`) VALUES ('"
            . $this->escape_string($this->username) . "','"
            . $this->escape_string(sha1($this->password)) . "','"
            . $this->escape_string($this->first_name) . "','"
            . $this->escape_string($this->last_name) . "')";

        return $this->query($query);
    }

    public function login() {
        $result_set = $this->query("SELECT * FROM users WHERE username = '" . $this->username . "' AND password = '" . sha1($this->password) . "' LIMIT 1");
        if ($result_set) {
            $found_user = mysqli_fetch_array($result_set);
            $_SESSION['user_id'] = $found_user['id'];
            return true;
        } else {
            return false;
        }

    }
}