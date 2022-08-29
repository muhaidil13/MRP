<?php
class Costumers extends Controller{
    public function index(){
        $data['cos'] = $this->model('Costumers_model')->get_Costumers();
        $data['title'] = "Data Costumers";
        $this->view('tamplate/head', $data);
        $this->view('costumers/data_costumers', $data);
        $this->view('tamplate/footer');   
    }
    public function tambah_cos(){
        $data['title'] = "Tambah Costumers";
        $this->view('tamplate/head', $data);
        $this->view('costumers/add_cos');
        $this->view('tamplate/footer');
    }
    public function add_costumers(){
        if($this->model("Costumers_model")->tambahCostumers($_POST) > 0){
            Flasher::setFlash("Berhasil", "Ditambahkan ", "success ");
            header("Location: " . BASE_URL . "/costumers");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "Ditambahkan", "danger ");
            header("Location: " . BASE_URL . "/costumers");
            exit;
        }
    }
    public function hapus_cos($id){
        if($this->model("Costumers_model")->DeleteCos($id) > 0){
            Flasher::setFlash("Berhasil", "DiDelete ", "success ");
            header("Location: " . BASE_URL . "/costumers");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "DiDelete", "danger ");
            header("Location: " . BASE_URL . "/costumers");
            exit;
        
        }
    }
    public function edit_costumers(){
        if($this->model("Costumers_model")->Updatecos($_POST) > 0){
            Flasher::setFlash("Berhasil", "DiUpdate ", "success ");
            header("Location: " . BASE_URL . "/costumers");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "DiUpdate ", "danger ");
            header("Location: " . BASE_URL . "/costumers");
            exit;
        }
    }
    
}