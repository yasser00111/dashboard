<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Import extends CI_Controller {

        public function index()
        {
            $data['title'] = 'Import Excel';
            $data['tb_unit1'] = $this->db->get('tb_unit1')->result();
            $this->load->view('admin/index', $data);
        }

        public function create()
        {
            $data['title'] = "Upload File Excel";
            $this->load->view('admin/create', $data);
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
                   
                    for($row=2; $row<=$highestRow; $row++){
                        $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
                        if($this->isEmptyRow(reset($rowData))) { continue; } // skip empty row

                        $nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $jenis = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $merk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $kategori = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $status = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $bg_color = null;
                        if ($status == 'R') {
                            $bg_color = '#FF0101';
                        }
                        // print_r($bg_color);
                        // exit();
                        $data[] = array(
                            'nama'          => $nama,
                            'jenis'          =>$jenis,
                            'merk'           =>$merk,
                            'kategori'      =>$kategori,
                            'fill'      =>$bg_color,
                        );
                    } 
        
                }



                $this->db->insert_batch('tb_unit1' ,$data);
        
                $message = array(
                    'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('admin/data_unit1');
            }
            else
            {
                 $message = array(
                    'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('admin');
            }
        }

        function isEmptyRow($row) {
            foreach($row as $cell){
                if (null !== $cell) return false;
            }
            return true;
        }

        public function export()
        {
            $data['title'] = 'Export Excel';
            $data['tb_unit1'] = $this->db->get('tb_unit1')->result();
            $this->load->view('admin/export', $data);
        }

    }