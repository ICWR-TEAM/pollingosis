<?php
/**
 *
 */
class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Admin_model");
    if ($this->session->userdata("level")==="admin") {
      redirect(base_url("dash_admin"));
    }
  }

  public function index()
  {
    if ($this->input->post()) {
      $where=[
        "username"=>$this->input->post("username"),
        "password"=>sha1($this->input->post("password"))
      ];
      if ($this->Admin_model->login($where)===1) {
        $this->session->set_userdata(["username"=>$where['username'],"level"=>"admin"]);
        redirect(base_url("dash_admin"));
      }else{
        $this->session->set_flashdata("gagal_login","Gagal login, cek username/password ulang!");
        redirect(base_url("admin"));
      }
    }
    $this->load->view("admin/login");
  }
}

 ?>
