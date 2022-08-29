<?php
class Supplier extends Controller{
    public function index(){
        $data["title"] = "Supplier";
        $data['sup'] = $this->model('Supplier_model')->get_supplier();
        $this->view("tamplate/head",$data);
        $this->view("supplier/data_supplier", $data);
        $this->view("tamplate/footer");
    }
    public function tambah(){
        $data['title']="tambah Supplier";
        $this->view("tamplate/head", $data);
        $this->view("supplier/add_sup");
        $this->view("tamplate/footer");
    }
    public function add_supplier(){
        if($this->model("Supplier_model")->Tambahsupp($_POST) > 0){
            Flasher::setFlash("Berhasil", "Ditambahkan ", "success ");
            header("Location: " . BASE_URL . "/supplier");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "Ditambahkan", "danger ");
            header("Location: " . BASE_URL . "/supplier");
            exit;
        }
    }
    public function edit_supplier(){
        // var_dump($_POST);
        if($this->model("Supplier_model")->Editsupp($_POST) > 0){
            Flasher::setFlash("Berhasil", "Di Edit ", "success ");
            header("Location: " . BASE_URL . "/supplier");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "Di Edit", "danger ");
            header("Location: " . BASE_URL . "/supplier");
            exit;
        }
    }
    public function delete_supplier($id){
        if($this->model("Supplier_model")->Hapussupp($id) > 0){
            Flasher::setFlash("Berhasil", "Di Delete ", "success ");
            header("Location: " . BASE_URL . "/supplier");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "Di Delete", "danger ");
            header("Location: " . BASE_URL . "/supplier");
            exit;
        }
    }

}