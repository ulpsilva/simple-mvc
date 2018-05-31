<?php
require "models/userModel.php";

class UserController extends Controller {

    function __construct(){
        Parent::__construct();
    }

    function index() {

    }

    function register() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new UserModel();
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];

            if ($user->create()) {
                if ($user->login()) {
                    header("Location: " . URL );
                }
            } else {
                $this->view->failed = "User registration failed.";
                $this->view->render("user/register");
            }
        } else {
            $this->view->render("user/register");
        }
    }

    function login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new UserModel();
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];

            if ($user->login()) {
                header("Location: " . URL );
            } else {
                $this->view->failed = "Username / Password invalid";
                $this->view->render("user/login");
            }
        } else {
            $this->view->render("user/login");
        }
    }

    function logout() {
        unset($_SESSION['user_id']);
        header("Location: " . URL . "index/index");
    }
}