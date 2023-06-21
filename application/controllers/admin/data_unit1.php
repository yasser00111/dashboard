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
    
    public function excel()
    {
        if(isset($_FILES["file"]["name"])){
              // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for($row=4; $row<=$highestRow; $row++){
    
                    $nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $jenis = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $merk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $merk = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                    $data[] = array(
                        'nama'          => $nama,
                        'jenis'          =>$jenis,
                        'merk'         =>$merk,
                        'kategori'      => $kategori,
                    );
    
                } 
    
            }
    
            $this->db->insert_batch('tb_unit1', $data);
    
            $message = array(
                'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('admin/data_unit1/create');
        }
        else
        {
             $message = array(
                'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('admin/data_unit1');
        }
    }

}


?>