<?php   
use Firebase\JWT\JWT as JWTJWT;

class System_model{
    private $db;
    public static $key = "asdasdasdasdasdaaaaaaaaaaa";
    public function __construct()
    {
        
        $this->db = new Database();


    }
    public function getUser(){
        $query = "SELECT * FROM user";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result();
    }
    public function cekLogin($data){
        $query = "SELECT * FROM user where username = :username";
        $this->db->query($query);
        $this->db->bind("username",$data['username']);
        $this->db->execute();
        $result = $this->db->result();
        if($result['username'] = $data['username'] && $result['pass'] = $data['pass']){
            $payload = [
                "username" => $data['username'],
                "level" => $result['level']
            ];
            // Encode Menggunakan JWT
            $jwt =JWTJWT::encode($payload, System_model::$key, 'HS256');
            setcookie("mrp-l", $jwt);
            return true;
        }
        else{
            return false;
        }

    }
    public function keluar(){
        setcookie("mrp-l","");
    }
}