<?php   

class System_model{
    private $db;
    public function __construct()
    {
        
        $this->db = new Database();


    }
    public function register($data){
        $query = "INSERT INTO user (nama_user , username, password_akun, email) VALUES (:nama_user, :username, :password_akun, :email)";
        $this->db->query($query);
        $this->db->bind("nama_user", $data['nama_user']);
        $this->db->bind("username", $data['username']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("password_akun", $data['password_akun']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getUser(){
        $query = "SELECT * FROM user";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result();
    }
    public function findbyEmail($data){
        $query = "SELECT * FROM user WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function login($data){
        $password = $data['password_user'];
        $query = "SELECT * FROM user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind("username", $data['username']);
        $row = $this->db->single();
        $hashpass = $row->password_akun;
        if(password_verify($password, $hashpass)){
            return $row;
        }
        else{
            return false;
        }
    }

    public function keluar(){
        setcookie("mrp-l","");
    }
}