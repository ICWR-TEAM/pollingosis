<?php
/**
 *
 */
class Admin_model extends CI_Model
{
  function login($data){
    $username=$this->db->escape($data['username']);
    $password=$this->db->escape($data['password']);
    return $this->db->query("SELECT * FROM login_admin where binary username=$username AND password=$password")->num_rows();
  }

  function cek_pengaturan(){
      return $this->db->get_where("settings",["id"=>"1"])->row();
  }

  function setting_buat($data){
      return $this->db->update("settings",['atur'=>$data],['id'=>"1"]);
  }

  function input_data_sekolah($data){
      if ($this->db->get("data_sekolah")->num_rows()===0) {
          $this->db->insert("data_sekolah",$data);
      }else {
          return $this->db->update("data_sekolah",$data,['id'=>"1"]);
      }
  }

  function input_kelas($data){
      return $this->db->insert("data_kelas",$data);
  }

  function view_table_kelas(){
      return $this->db->get("data_kelas")->result();
  }

  function tambah_data_calon_osis($data){
      return $this->db->insert("data_calon_osis",$data);
  }

  function cek_id_calon_osis($id){
      return $this->db->get_where("data_calon_osis",$id)->num_rows();
  }

  function hapus_calsis($id){
      return $this->db->delete("data_calon_osis",$id);
  }

  function tampil_kelas(){
      return $this->db->get("data_kelas")->result();
  }

  function tambah_calon_pemilih_1_1($data){
      return $this->db->insert("data_calon_pemilih",$data);
  }

  function hapus_semua_calon_pemilih(){
      return $this->db->empty_table("data_calon_pemilih");
  }

  function cocok_data_calon_pemilih($id){
      return $this->db->get_where("data_calon_pemilih",['id'=>$id])->num_rows();
  }

  function hapus_calon_pemilih_id($id){
      return $this->db->delete("data_calon_pemilih",['id'=>$id]);
  }

  function view_data_sekolah(){
      return $this->db->get_where("data_sekolah",['id'=>"1"])->row();
  }

  function restart_app(){
      $this->db->empty_table('data_calon_pemilih');
      $this->db->empty_table('data_calon_osis');
      $this->db->empty_table('data_sekolah');
      $this->db->empty_table('data_kelas');
      $this->db->update("settings",["atur"=>"tahap_input_data_sekolah"],['id'=>"1"]);
      return true;
  }

  function view_data_calon_osis(){
      return $this->db->get("data_calon_osis");
  }

  function view_data_calon_pemilih(){
      return $this->db->get("data_calon_pemilih");
  }

  function cek_data_calon_osis(){
      return $this->db->get("data_calon_osis");
  }

  function data_pemilih(){
      return $this->db->get("data_calon_pemilih");
  }

  function view_id_calon_osis($id){
      return $this->db->get_where("data_calon_osis",$id)->row();
  }

  function index_view_data_pemilih($value){
      if ($value==="semua") {
          return $this->db->get("data_calon_pemilih")->num_rows();
      }elseif ($value==="hadir") {
          return $this->db->get_where("data_calon_pemilih",["set"=>"hadir"])->num_rows();
      }elseif ($value==="belum_hadir") {
          return $this->db->get_where("data_calon_pemilih",["set"=>"belum hadir"])->num_rows();
      }
  }

  function cek_daftar_hadir($value){
      if($value==="semua"){
          return $this->db->get("data_calon_pemilih")->num_rows();
      }elseif ($value==="hadir") {
          return $this->db->get_where("data_calon_pemilih",['set'=>"hadir"])->num_rows();
      }
  }

  function lihat_hasil_pdf_laki($value){
      if ($value==="semua") {
          return $this->db->get_where("data_calon_pemilih",["jenkel"=>"Laki-laki"])->num_rows();
      }elseif ($value==="hadir") {
          return $this->db->get_where("data_calon_pemilih",["set"=>"hadir","jenkel"=>"Laki-laki"])->num_rows();
      }elseif ($value==="belum_hadir") {
          return $this->db->get_where("data_calon_pemilih",["set"=>"belum hadir","jenkel"=>"Laki-laki"])->num_rows();
      }
  }

  function lihat_hasil_pdf_perempuan($value){
      if ($value==="semua") {
          return $this->db->get_where("data_calon_pemilih",["jenkel"=>"Perempuan"])->num_rows();
      }elseif ($value==="hadir") {
          return $this->db->get_where("data_calon_pemilih",["set"=>"hadir","jenkel"=>"Perempuan"])->num_rows();
      }elseif ($value==="belum_hadir") {
          return $this->db->get_where("data_calon_pemilih",["set"=>"belum hadir","jenkel"=>"Perempuan"])->num_rows();
      }
  }

  function lihat_pdf_hasilnya($value){
      if ($value==="paslon") {
          return $this->db->get_where("data_calon_osis")->result();
      }
  }

  function update_cetak_hasil(){
      $no_osis=$this->db->get("data_calon_osis")->result();
  }

  public function hapus_kelas($value)
  {
      return $this->db->delete("data_kelas",$value);
  }

  function lihat_data_sekolah_pdf(){
      return $this->db->get_where("data_sekolah",['id'=>1])->row();
  }

  function view_user(){
      return $this->db->get("login_admin")->result();
  }

  function tambah_user($value){
      return $this->db->insert("login_admin",$value);
  }

  function cocok_id_user($id){
      return $this->db->get_where("login_admin",$id)->num_rows();
  }

  function hapus_user($id){
      return $this->db->delete("login_admin",$id);
  }
}


 ?>
