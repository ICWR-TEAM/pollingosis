<?php

/**
 *
 */
class Hadir extends CI_Controller
{

    function __construct()
    {
        // $this->load->library("form_validation");
        parent::__construct();
        if ($this->session->userdata("status")!=="login") {
            redirect(base_url());
            exit;
        }
    }

    public function index()
    {
        $this->load->view("admin/hadir");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
        exit;
    }
}


 ?>
