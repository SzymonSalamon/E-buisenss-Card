<?php

require_once "AppController.php";

class DefaultController extends AppController{

    public function index(){
       $this->render('start');
    }
    public function register(){
        $this->render('register');
    }
    public function logout(){
        session_start();
        session_destroy();
        $this->render('start');
    }
}