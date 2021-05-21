<?php

/**
 *
 */
class Dash_siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("Siswa_model");
        if ($this->session->userdata("status")!=="login") {
            redirect(base_url());
            exit;
        }
        // echo "<script>alert('".explode("-",$this->session->userdata("nama"))."')</script>";
        $session_siswa=explode("-",$this->session->userdata("nama"));
        if ($this->Siswa_model->cek_coblosan(end($session_siswa))->set==="hadir") {
            redirect(base_url("hadir/"));
            exit;
        }
    }


    public function index()
    {
        $data['calon_osis']=$this->Siswa_model->view_all_calsis();
        if ($this->input->post("submit")) {
            $value_calon=$this->input->post("value_calon");
            $rul=[
                [
                    "field"=>"value_calon",
                    "label"=>"Value Calon",
                    "rules"=>"required|integer"
                ]
            ];
            if ($this->form_validation->set_rules($rul)->run()) {
                $val_input=[
                    "coblos_nomor"=>$value_calon,
                    "set"=>"hadir"
                ];
                $nisn=explode("-",$this->session->userdata("nama"));
                $val_id=[
                    "nisn"=>end($nisn)
                ];

                $lihat_jumlahpolling_osis=$this->Siswa_model->view_calon_osis(["no_calon_osis"=>$value_calon]);
                $lihat_jumlahpolling_osis=$lihat_jumlahpolling_osis->jumlah_suara;
                $id_calon_osis=[
                    "no_calon_osis"=>$value_calon
                ];
                $value_update_polling_osis=[
                    "jumlah_suara"=>(int)$lihat_jumlahpolling_osis+1
                ];

                if ($this->Siswa_model->input_coblos($val_id,$val_input) && $this->Siswa_model->update_suara_osis($id_calon_osis,$value_update_polling_osis)) {
                    $this->session->set_flashdata("berhasil","Berhasil Coblos!");
                    redirect(base_url("dash_siswa"));
                }
            }
        }
        $this->load->view("siswa/index",$data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }
}


 ?>
