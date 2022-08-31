<?php
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $db_name = DB_NAME;

    
    private $dbh;
    private $stmt;
    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
        ];
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // Menyiapkan tambahan ketika user mau menambahkan perintah tambahan
    public function bind($params, $value, $type=null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }   
        }
        $this->stmt->bindValue($params, $value, $type);
    }
    
    public function execute(){
        $this->stmt->execute();
    }
    
    public function result(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function fetch_array ($res) {
		try {
			return $res->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			$this->error = $e->getMessage();
		}
	}
    public function last_id(){
        return $this->dbh->lastInsertId();
    }
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}