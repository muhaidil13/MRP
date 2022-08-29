<?php
class Supplier_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function Tambahsupp($data){
        $query = "INSERT INTO supplier (nama_supplier, email, owner_supplier, alamat, no_telp) VALUES (:nama_supplier, :email, :owner_supplier, :alamat, :no_telp)";
        $this->db->query($query);
        $this->db->bind("nama_supplier", $data['nama_supplier']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("owner_supplier", $data['owner_supplier']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("no_telp", $data['no_telp']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function get_supplier(){
        $query = "SELECT * FROM supplier";
        $this->db->query($query);
        return $this->db->result();
    }
    public function Editsupp($data){
        $query = "UPDATE supplier SET 
                nama_supplier = :nama_supplier, 
                email = :email,
                alamat = :alamat,
                owner_supplier = :owner_supplier,
                no_telp = :no_telp 
                WHERE id_supplier = :id_supplier";
        $this->db->query($query);
        $this->db->bind("nama_supplier", $data['nama_supplier']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("owner_supplier", $data['owner_supplier']);
        $this->db->bind("no_telp", $data['no_telp']);
        $this->db->bind("id_supplier", $data['id_supplier']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function Hapussupp($id){
        $query = "DELETE FROM supplier WHERE id_supplier = :id_supplier";
        $this->db->query($query);
        $this->db->bind("id_supplier", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}