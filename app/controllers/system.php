<?php

use Firebase\JWT\JWT;

class System extends Controller{
    public static $key = "asdasdasdasdasdaaaaaaaaaaa";
    public function index(){
        
    }
    public function login(){
        $data['title'] = "Halaman Login";
        $this->view("system/login",$data);
    }
    public function cek_login(){
        if($_SERVER['REQUEST_METHOD'] = "POST"){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password_user' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            
            // Cek isi Username
            if(empty($data['username'])){
                $data['usernameError'] ="please Insert Username";
            }
            
            // Cek Password
            if(empty($data['password_user'])){
                $data['passwordError'] = "Please Insert password";
            }
            // Cek Jika Semua Error Kosong
            if(empty($data['usernameError']) && empty($data['passwordError'])){
                $loginuser = $this->model("System_model")->login($data);
                // var_dump($loginuser);
                if($loginuser){
                    $this->setCookieUsers($loginuser);
                    header("Location: " . BASE_URL . "/home");


                }
                else{
                    $data['passwordError'] = "Password or Username Error";
                    $this->view("system/login", $data);
                }
            }
        }
        else{
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ]; 
        }
        $this->view("system/login", $data);
    }

    public function setCookieUsers($user){
        $payload = [
            "username" => $user->username,
            "user_id" => $user->user_id  
        ];
        $jwt = JWT::encode($payload, System::$key, 'HS256');
        setcookie("Cookie-Mrp", $jwt);
    }
    public function tambah(){
        $data['title'] = "Buat User";
        $this->view("system/signup", $data);
    }


    public function signup(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $data=[
                'nama_user' => trim($_POST['nama_user']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'passwordconfirm' => trim($_POST['passwordconfirm']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'passwordconfirmError' => ''
            ];
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            if(empty($data['username'])){
                $data['usernameError'] = "Please Enter Username";
            }elseif(!preg_match($nameValidation, $data['username'])){
                $data['usernameError'] = "Only Letter And number";
            }

            if(empty($data['password'])){
                $data['passwordError'] = "Please Enter Password";
            }elseif(strlen($data['password']) < 6){
                $data['passwordError'] = "Length Min 7";
            }elseif(preg_match($passwordValidation, $data['password'])){
                $data['passwordError'] = "Must Contain last one number";
            }
            

            if(empty($data['email'])){
                $data['emailError'] = "Please Enter email";
            }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['emailError'] = "Correct Format";
            }else{
                // Jika email Sudah Ada
                if($this->model("System_model")->findbyEmail($data['email'])){
                    $data['emailError'] = 'Email is already taken.';
                }
            }

            if(empty($data['passwordconfirm'])){
                $data['passwordconfirmError'] = "Data Tidak Boleh Kodong";
            }elseif($data['passwordconfirm'] != $data['password']){
                $data['passwordconfirmError'] = "Password Tidak Kembar";
            }
            // var_dump($data);
            if(empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordconfirmError'])){
                $data['password_akun'] = password_hash($data['password'],PASSWORD_DEFAULT);
                var_dump($data);
                $this->model("System_model")->register($data);
                header("Location: " . BASE_URL . "/home");
                
            }
        }
        $data['title'] = "Buat User";
        $this->view("system/signup", $data);
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