<?php

class ErrorController extends Controller {

    function __construct(){
        Parent::__construct();
    }

    function index() {
        $this->view->render("error/error");
    }
}