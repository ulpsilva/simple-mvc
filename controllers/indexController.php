<?php

class IndexController extends Controller {

    function __construct(){
        Parent::__construct();
    }

    function index() {
        $this->view->render("index/index");
    }
}