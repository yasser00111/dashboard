<?php 

class Data_unit1 extends CI_Controller{
    public function index(){
        $data['unit1'] = $this->model_unit1->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_unit1', $data);
        $this->load->view('templates_admin/footer');
    
    }
    public function tambah(){
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $merk = $this->input->post('merk');
        $kategori = $this->input->post('kategori');

    $data = array(
        'nama' => $nama,
        'jenis' => $jenis,
        'merk' => $merk,
        'kategori' => $kategori
);
$this->model_unit1->tambah_unit1($data, 'tb_unit1');
redirect('admin/data_unit1/');
    }
    public function create()
    {
        $data['title'] = "Upload File Excel";
        // $this->load->view('import/create', $data);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_unit1', $data);
        $this->load->view('templates_admin/footer');
    }
    
   public function edit($id){
    $where = array('id_unit' => $id);
    $data['unit1'] = $this->model_unit1->edit_unit1($where,'tb_unit1')->result();
    $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_unit1', $data);
        $this->load->view('templates_admin/footer');
   }
   public function update(){
    $id              = $this->input->post('id_unit');
    $nama            = $this->input->post('nama');
    $jenis           = $this->input->post('jenis');
    $merk            = $this->input->post('merk');
    $kategori        = $this->input->post('kategori');


    $data = array(
        'nama'     => $nama,
        'jenis'    => $jenis,
        'merk'     => $merk,
        'kategori' => $kategori
    );
    $where = array(
        'id_unit' => $id
    );
    $this->model_unit1->update_data($where, $data, 'tb_unit1');
    redirect('admin/data_unit1/index/');
   }
   public function hapus($id){
    $where = array('id_unit'=> $id);
    $this->model_unit1->hapus_data($where, 'tb_unit1');
    redirect('admin/data_unit1/index/');

   }
}


?>