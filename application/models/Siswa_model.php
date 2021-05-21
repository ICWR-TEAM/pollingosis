<?php
/**
 *
 */
class Siswa_model extends CI_Model
{
    function login($data){
        return $this->db->get_where("data_calon_pemilih",$data);
    }

    function view_all_calsis(){
        return $this->db->get("data_calon_osis")->result();
    }

    function input_coblos($id,$val){
        return $this->db->update("data_calon_pemilih",$val,$id);
    }

    function view_calon_osis($value){
        return $this->db->get_where("data_calon_osis",$value)->row();
    }

    function update_suara_osis($id,$value){
        return $this->db->update("data_calon_osis",$value,$id);
    }

    function cek_coblosan($id){
        return $this->db->get_where("data_calon_pemilih",["nisn"=>$id])->row();
    }
}

 ?>
