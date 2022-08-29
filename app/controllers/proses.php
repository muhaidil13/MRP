<?php
class Proses extends Controller{
    public function index(){
        $data['title'] = "MRP";
        $this->view("tamplate/head", $data);
        $this->view("mrp/tampil_mrp");
        $this->view("tamplate/footer");
    }
}