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
}