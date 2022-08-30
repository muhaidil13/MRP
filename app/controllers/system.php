<?php
class System extends Controller{
    public function index(){
        
    }
    public function login(){
        $data['title'] = "Halaman Login";
        $this->view("system/login",$data);
    }
    public function cek_login(){
        var_dump($_POST);
    }
    public function signup(){
        $data['title'] = "Halaman Signup";
        $this->view("system/signup",$data);
    }
}