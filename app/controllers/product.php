<?php
class Product extends Controller{
    public function index(){
        $data['product'] = $this->model("Product_model")->getProduct();
        $data['title'] = "Product";
        $this->view("tamplate/head", $data);
        $this->view("product/data_product", $data);
        $this->view("tamplate/footer");
    }
    public function hapus_product($id){
        if($this->model("Product_model")->hapusProduct($id) > 0){
            Flasher::setFlash("Berhasil", "Di Delete ", "success ");
            header("Location: " . BASE_URL . "/product");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "Di Delete", "danger ");
            header("Location: " . BASE_URL . "/product");
            exit;
        }
    }
    public function tambah_product(){
        $data['title'] = "Tambah product";
        $this->view("tamplate/head", $data);
        $this->view("product/add_product");
        $this->view("tamplate/footer");
    }
}