<?php
class Material_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getMaterial(){
        $query = "select A.material_sku, A.lead_time, B.material_code, B.material_name, C.category_name from ((material as A inner join material_item as B on A.material_code = B.material_code) inner join material_category as C on B.category_id = C.category_id);";
        $this->db->query($query);
        return $this->db->result();
    }
    public function getCategory(){
        $query = "SELECT * FROM material_category";
        $this->db->query($query);
        return $this->db->result();
    }
    public function getSatuan(){
        $query = "SELECT * FROM material_satuan";
        $this->db->query($query);
        return $this->db->result();
    }
    public function Tambahsatuan($data){
        $query = "SELECT unit FROM material_satuan WHERE unit = :unit";
        $this->db->query($query);
        $this->db->bind("unit", $data['unit']);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            Flasher::setFlash("Gagal", "Ditambahkan", "danger ");
            header("Location: " . BASE_URL . "/material/tambah_material");
            exit;
        }
        else{
            $query = "INSERT INTO material_satuan (unit) VALUES (:unit)";
            $this->db->query($query);
            $this->db->bind("unit", $data['unit']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function Tambahcategory($data){
        $query = "SELECT category_name FROM material_category WHERE category_name = :category_name";
        $this->db->query($query);
        $this->db->bind("category_name", strtolower($data['name_category']));
        $this->db->execute();
        $this->db->result();
        if($this->db->rowCount() > 0){
            Flasher::setFlash("Gagal", "Ditambahkan", "danger ");
            header("Location: " . BASE_URL . "/material/tambah_material");
            exit;
        }
        else{
            $query = "INSERT INTO material_category (category_name) VALUES (:category_name)";
            $this->db->query($query);
            $this->db->bind("category_name",strtolower($data['name_category']));
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function Tambahmaterial($data){

        try{
            $query = "INSERT INTO material_item (category_id, material_name, material_brand, material_unit) VALUES (:category_id, :material_name, :material_brand, :material_unit)";
        
            $this->db->query($query);
            $this->db->bind("category_id", $data['category_id']);
            $this->db->bind("material_name", $data['material_name']);
            $this->db->bind("material_brand", $data['material_brand']);
            $this->db->bind("material_unit", $data['material_unit']);
            
            $this->db->execute();
            
            $id = $this->db->last_id();
            
            $query1 = "INSERT INTO material (material_code, material_sku, material_price, stok_awal, lead_time) VALUES (:material_code, :material_sku, :material_price, :stok_awal, :lead_time)";
            $this->db->query($query1);
            $this->db->bind("material_code", $id);
            $this->db->bind("material_sku", $data['material_sku']);
            $this->db->bind("material_price", $data['material_price']);
            $this->db->bind("stok_awal", $data['stok_awal']);
            $this->db->bind("lead_time", $data['lead_time']);
            $this->db->execute();
            return $this->db->rowCount();
        }
        catch (Exception $e){
            Flasher::setFlash("Gagal", "Ditambahkan ", "warning ");
            header("Location: " . BASE_URL . "/material/tambah_material");
            exit;
            
        }
    }
    public function Hapusmaterial($id){
        $query = "DELETE FROM material_item where material_code = :material_code";
        $this->db->query($query);
        $this->db->bind("material_code", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}