<?php 
class Dashboard extends CI_Controller{
    public function index(){
        $data['unit1'] = $this->model_unit1->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');

    }
}
?>