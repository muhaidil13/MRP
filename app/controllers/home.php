<?php
class Home extends Controller{
    public function index(){
        $data['title'] = 'home';
        $this->view('tamplate/head', $data);
        $this->view('dashboard/home');
        $this->view('tamplate/footer');

    }
}