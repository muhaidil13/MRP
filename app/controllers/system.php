<?php
class System extends Controller{
    public function index(){
        
    }
    public function login(){
        $data['title'] = "Halaman Login";
        $this->view("system/login",$data);
    }
    public function cek_login(){
    //    var_dump($_POST);
       if($this->model("System_model")->cekLogin($_POST)){
            Flasher::setFlash("Berhasil", "Login ", "success ");
            header("Location: " . BASE_URL . "/home");
            exit;
        }
    }
    public function signup(){
        $data['title'] = "Halaman Signup";
        $this->view("system/signup",$data);
    }
    public function list(){
        $data['user'] = $this->model("System_model")->getUser();
        $data['title'] = "List User";
        $this->view("tamplate/head", $data);
        $this->view("system/list_user", $data);
        $this->view("tamplate/footer");
    }
    public function keluar(){
        $this->model("System_model")->keluar();
        Flasher::setFlash("Berhasil", "Log out ", "success ");
        header("Location: " . BASE_URL . "/system/login");
        exit;
    }
}