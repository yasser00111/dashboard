<?php 

class model_unit1 extends CI_Model{
    public function tampil_data(){
       return $this->db->get('tb_unit1');
    }
    public function tambah_unit1($data, $table){
        $this->db->insert($table, $data);
    }
}
?>