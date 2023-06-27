<?php 

class model_unit1 extends CI_Model{
    public function tampil_data(){
       return $this->db->get('tb_unit1');
    }
    public function tambah_unit1($data, $table){
        $this->db->insert($table, $data);
    }
    public function edit_unit1($where, $table){
      return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>