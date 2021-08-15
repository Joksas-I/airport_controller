<?php

namespace Airport;

class LoginController {
    public static $loged = false;
    
    public function index()
    {
        return App::view('index');
    }

    public function login() {
        Json::getJson()->showUsers(); 
        App::redirect('');        
    }

    public function logout() {
        unset($_SESSION['logged'], $_SESSION['name']);
        App::setMessage('Logged off succesfully.');
        App::redirect('');
    }

}