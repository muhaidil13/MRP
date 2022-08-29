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
        $data['cat'] =$this->model("Product_model")->getCategory();
        $this->view("tamplate/head", $data);
        $this->view("product/add_product",$data);
        $this->view("tamplate/footer");
    }
    public function category(){
        if($this->model("Product_model")->addCategory($_POST) > 0){
            Flasher::setFlash("Berhasil", "Di Tambah ", "success ");
            header("Location: " . BASE_URL . "/product/tambah_product");
            exit;
        }
    }
    public function add_product(){
        // print_r($_POST);
        if($this->model("Product_model")->addProduct($_POST) > 0){
            Flasher::setFlash("Berhasil", "Di Tambah ", "success ");
            header("Location: " . BASE_URL . "/product");
            exit;
        }
    }
}