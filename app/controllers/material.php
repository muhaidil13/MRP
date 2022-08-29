<?php
class Material extends Controller{
    public function index(){
        $data['title'] = "Material";
        $data['material'] = $this->model("Material_model")->getMaterial();
        $this->view("tamplate/head", $data);
        $this->view("material/data_material", $data);
        $this->view("tamplate/footer");
    }
    public function tambah_material(){
        $data['title'] = 'Tambah Material';
        $data['cat'] = $this->model("Material_model")->getCategory();
        $data['ukur'] = $this->model("Material_model")->getSatuan();
        $this->view("tamplate/head",$data);
        $this->view("material/tambah_material",$data);
        $this->view("tamplate/footer");
    }
    public function satuan(){
        if($this->model("Material_model")->Tambahsatuan($_POST) > 0){
            Flasher::setFlash("Berhasil", "Ditambahkan ", "success ");
            header("Location: " . BASE_URL . "/material/tambah_material");
            exit;
        }
    }
    public function category(){
        if($this->model("Material_model")->Tambahcategory($_POST) > 0){
            Flasher::setFlash("Berhasil", "Ditambahkan ", "success ");
            header("Location: " . BASE_URL . "/material/tambah_material");
            exit;
        }
    }
    public function add_material(){
        // print_r($_POST);
        if($this->model("Material_model")->Tambahmaterial($_POST) > 0){
            Flasher::setFlash("Berhasil", "Ditambahkan ", "success ");
            header("Location: " . BASE_URL . "/material");
            exit;   
        }
    }
    public function hapus_material($id){
        if($this->model("Material_model")->Hapusmaterial($id) > 0){
            Flasher::setFlash("Berhasil", "Di Delete ", "success ");
            header("Location: " . BASE_URL . "/material");
            exit;
        }
        else{
            Flasher::setFlash("Gagal", "Di Delete", "danger ");
            header("Location: " . BASE_URL . "/material");
            exit;
        }
    }
}