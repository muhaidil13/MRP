<?php
class Product_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getProduct(){
        $query = "SELECT A.product_name, A.product_code, A.product_brand, B.product_sku, B.sales_price , C.category_name FROM ((product as A inner join product_category as C on A.category_id = C.category_id) inner join product_sku as B on A.product_code = B.product_code)";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result();
    }
    public function hapusProduct($id){
        $query = "DELETE FROM product WHERE product_code = :product_code";
        $this->db->query($query);
        $this->db->bind("product_code", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getCategory(){
        $query = "SELECT * FROM product_category";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result();
    }
    public function addCategory($data){
        $query = "SELECT * FROM product_category WHERE category_name = :category_name";
        $this->db->query($query);
        $this->db->bind("category_name", $data['name_category']);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            Flasher::setFlash("Gagal", "Ditambahkan", "danger ");
            header("Location: " . BASE_URL . "/product/tambah_product");
            exit;
        }
        else{
            $query = "INSERT INTO product_category (category_name) VALUES (:category_name)";
            $this->db->query($query);
            $this->db->bind("category_name", $data["name_category"]);
            $this->db->execute();
            return $this->db->rowCount();
        }       
    }
    public function addProduct($data){
        $query = "INSERT INTO product (category_id, product_name, product_brand, unit) VALUES (:category_id, :product_name, :product_brand, :unit)";
        $this->db->query($query);
        $this->db->bind("category_id", $data['category_id']);
        $this->db->bind("product_name", $data['product_name']);
        $this->db->bind("product_brand", $data['product_brand']);
        $this->db->bind("unit", $data['unit']);
        $this->db->execute();
        $id = $this->db->last_id();
        $query = "INSERT INTO product_sku (product_sku, sales_price, product_code) VALUES (:product_sku, :sales_price, :product_code)";
        $this->db->query($query);
        $this->db->bind("product_sku", $data['product_sku']);
        $this->db->bind("sales_price", $data['sales_price']);
        $this->db->bind("product_code", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}