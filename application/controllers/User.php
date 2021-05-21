<?php
/**
 *
 */
class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library("form_validation");
    $this->load->model("Siswa_model");
    if ($this->session->userdata("status")==="login") {
        redirect(base_url("dash_siswa"));
        exit;
    }
  }

  public function index()
  {
      /////////////////////export token
      if ($this->input->post("submit")) {
          $rul=[
              [
                  "field"=>"nisn",
                  "label"=>"NISN",
                  "rules"=>"required|integer"
              ],
              [
                  "field"=>"tgl_lahir",
                  "label"=>"Tanggal Lahir",
                  "rules"=>"required"
              ]
          ];
          if($this->form_validation->set_rules($rul)->run()){
              $datane=[
                  "nisn"=>$this->input->post("nisn"),
                  "tgl_lahir"=>$this->input->post("tgl_lahir")
              ];
              $cocok_data=$this->Siswa_model->login($datane)->row();
              if ($this->Siswa_model->login($datane)->num_rows()===1) {
                  $ses=[
                      "nama"=>$cocok_data->nama."-".$datane['nisn'],
                      "status"=>"login"
                  ];
                  $this->session->set_userdata($ses);
                  redirect(base_url("dash_siswa/"));
              }else {
                  $this->session->set_flashdata("gagal_login","<div class='alert alert-warning mt-3 border border-warning'>Gagal Login, Cek Username Dan Password Kembali</div>");
                  redirect(base_url());
              }
          }
      }
      $this->load->view("user/login");
  }
}

 ?>
