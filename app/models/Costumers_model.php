<?php
class Costumers_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function get_Costumers(){
        $query = "SELECT * FROM costumers";
        $this->db->query($query);
        return $this->db->result();
    }
    public function tambahCostumers($data){
        $query = "INSERT INTO costumers (costumers_nama, brand_nama, costumers_telp, costumers_email, costumers_alamat, keterangan) VALUES (:costumers_nama, :brand_nama, :costumers_telp, :costumers_email, :costumers_alamat, :keterangan)";
        $this->db->query($query);
        $this->db->bind('costumers_nama', $data['costumers_nama']);
        $this->db->bind('brand_nama', $data['brand_nama']);
        $this->db->bind('costumers_email', $data['costumers_email']);
        $this->db->bind('costumers_telp', $data['costumers_telp']);
        $this->db->bind('costumers_alamat', $data['costumers_alamat']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function DeleteCos($id){
        $query = "DELETE FROM costumers WHERE costumers_id = :costumers_id";
        $this->db->query($query);
        $this->db->bind("costumers_id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function Updatecos($data){
        $query = "UPDATE costumers SET 
                costumers_nama = :costumers_nama,
                brand_nama = :brand_nama,
                costumers_email = :costumers_email,
                costumers_alamat = :costumers_alamat,
                costumers_telp = :costumers_telp,
                keterangan = :keterangan 
                WHERE costumers_id = :costumers_id
                ";
        $this->db->query($query);
        $this->db->bind('costumers_id', $data['costumers_id']);
        $this->db->bind('costumers_nama', $data['costumers_nama']);
        $this->db->bind('brand_nama', $data['brand_nama']);
        $this->db->bind('costumers_email', $data['costumers_email']);
        $this->db->bind('costumers_telp', $data['costumers_telp']);
        $this->db->bind('costumers_alamat', $data['costumers_alamat']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();

    }
    
}