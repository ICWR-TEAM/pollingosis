<?php
/**
 *
 */
class Dash_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata("level")!=="admin") {
      redirect(base_url("admin"));
      // show_404();
      exit();
    }
    $this->load->model("Admin_model");
  }


  private function _upload_img(){
      $config["upload_path"]    ="./assets/img/";
      $config["allowed_types"]  ="jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF";
      $config["file_name"]      =$this->input->post("nama_calon_osis")."-".$this->input->post("nisn");
      $config["overwrite"]      =true;
      $config["max_size"]       =3000;

      $this->load->library("upload",$config);
      if ($this->upload->do_upload("foto_calon_osis")) {
          return $this->upload->data("file_name");
      }else{
          return false;
      }
  }

  public function index()
  {
      $data['cek_setting']=$this->Admin_model->cek_pengaturan();

      $data['var_data_calon_osis']=$this->Admin_model->view_data_calon_osis()->num_rows();
      $data['var_data_calon_pemilih']=$this->Admin_model->view_data_calon_pemilih()->num_rows();

      $data["val_data_osis_semua"]=$this->Admin_model->index_view_data_pemilih("semua");
      $data["val_data_osis_hadir"]=$this->Admin_model->index_view_data_pemilih("hadir");
      $data["val_data_osis_belum_hadir"]=$this->Admin_model->index_view_data_pemilih("belum_hadir");


      if ($this->input->post("restart_app")) {
          if ($this->Admin_model->restart_app()) {
              redirect(base_url("dash_admin"));
          }
      }

      $cekin_setting=$this->Admin_model->cek_pengaturan()->atur;
      if ($cekin_setting==="tahap_input_data_sekolah") {
          redirect(base_url("dash_admin/data_sekolah"));
      }elseif ($cekin_setting==="tahap_input_data_kelas") {
          redirect(base_url("dash_admin/data_kelas"));
      }elseif ($cekin_setting==="tahap_input_calon_osis") {
          redirect(base_url("dash_admin/calon_osis"));
      }elseif ($cekin_setting==="tahap_input_calon_pemilih") {
          redirect(base_url("dash_admin/calon_pemilih"));
      }

      $this->load->view("admin/header",$data);
      $this->load->view("admin/index",$data);
      $this->load->view("admin/footer");
  }

  public function buat_polling()
  {
      if ($this->input->post("submit")) {
          $this->Admin_model->setting_buat("tahap_input_data_sekolah");
          // $this->session->set_flashdata("tahap1","Berhasil menjalankan polling, silahkan ke tahap selanjutnya(mengisi identitas sekolah)");
          redirect(base_url("dash_admin/data_sekolah"));
      }
  }

  public function data_sekolah()
  {
      error_reporting(0);
      $data['cek_setting']=$this->Admin_model->cek_pengaturan();
      $data['view_dsekolah']=$this->Admin_model->view_data_sekolah();
      if ($this->Admin_model->cek_pengaturan()->atur==="tahap_input_data_sekolah" || $this->Admin_model->cek_pengaturan()->atur==="berjalan") {

          if ($this->input->post("submit")) {
              $datane=[
                  "id"=>"1",
                  "npsn"=>htmlentities($this->input->post("npsn")),
                  "nama_sekolah"=>htmlentities($this->input->post("nama_sekolah")),
                  "alamat_sekolah"=>htmlentities($this->input->post("alamat")),
                  "desa_kelurahan"=>htmlentities($this->input->post("desa_kelurahan")),
                  "kecamatan"=>htmlentities($this->input->post("kecamatan")),
                  "kota_kabupaten"=>htmlentities($this->input->post("kota_kabupaten")),
                  "nama_kepsek"=>htmlentities($this->input->post("nama_kepsek")),
                  "nip"=>htmlentities($this->input->post("nip")),
                  "tahun_pelajaran"=>htmlentities($this->input->post("tahun"))
              ];
              if($this->Admin_model->cek_pengaturan()->atur!=="berjalan"){
                  if ($this->Admin_model->setting_buat("tahap_input_data_kelas")) {
                      $this->Admin_model->input_data_sekolah($datane);
                      redirect(base_url("dash_admin/data_kelas"));
                  }
              }else{
                  $this->Admin_model->input_data_sekolah($datane);
                  $this->session->set_flashdata("berhasil_edit","sukses");
                  redirect(base_url("dash_admin/data_sekolah"));
              }
          }
          $this->load->view("admin/header",$data);
          $this->load->view("admin/data_sekolah",$data);
          $this->load->view("admin/footer");
      }else {
          // show_404();
          $cekin_setting=$this->Admin_model->cek_pengaturan()->atur;
          if ($cekin_setting==="tahap_input_data_sekolah") {
              redirect(base_url("dash_admin/data_sekolah"));
          }elseif ($cekin_setting==="tahap_input_data_kelas") {
              redirect(base_url("dash_admin/data_kelas"));
          }elseif ($cekin_setting==="tahap_input_calon_osis") {
              redirect(base_url("dash_admin/calon_osis"));
          }elseif ($cekin_setting==="tahap_input_calon_pemilih") {
              redirect(base_url("dash_admin/calon_pemilih"));
          }
      }

  }

  public function data_kelas()
  {
      $data['cek_setting']=$this->Admin_model->cek_pengaturan();
      if ($this->Admin_model->cek_pengaturan()->atur==="tahap_input_data_kelas"  || $this->Admin_model->cek_pengaturan()->atur==="berjalan") {

          if ($this->input->post("submit")) {
              $datane=[
                  "kelas"=>htmlentities($this->input->post("kelas"))
              ];
              if($this->form_validation->set_rules("kelas","Kelas","required")->run()){
                  if ($this->Admin_model->input_kelas($datane)) {
                      $this->session->set_flashdata("berhasil","Berhasil input kelas");
                      redirect(base_url("dash_admin/data_kelas"));
                  }
              }
          }

          if ($this->input->post("selesai")) {
              $this->Admin_model->setting_buat("tahap_input_calon_osis");
              redirect(base_url("dash_admin/calon_osis"));
              // header("location: ".base_url("dash_admin/calon_osis"));
          }
//////errorrrr
          $data['table_kelas']=$this->Admin_model->view_table_kelas();

          $this->load->view("admin/header",$data);
          $this->load->view("admin/data_kelas",$data);
          $this->load->view("admin/footer");
      }else {
          $cekin_setting=$this->Admin_model->cek_pengaturan()->atur;
          if ($cekin_setting==="tahap_input_data_sekolah") {
              redirect(base_url("dash_admin/data_sekolah"));
          }elseif ($cekin_setting==="tahap_input_data_kelas") {
              redirect(base_url("dash_admin/data_kelas"));
          }elseif ($cekin_setting==="tahap_input_calon_osis") {
              redirect(base_url("dash_admin/calon_osis"));
          }elseif ($cekin_setting==="tahap_input_calon_pemilih") {
              redirect(base_url("dash_admin/calon_pemilih"));
          }
      }
  }

  public function hapus_kelas($id=null)
  {

      if ($id) {
          if ($this->Admin_model->hapus_kelas(["id"=>$id])) {
              $this->session->set_flashdata("berhasil_hapus","Berhasil hapus kelas.");
              redirect(base_url("dash_admin/data_kelas"));
          }
      }else {
          show_404();
      }

  }

  public function calon_osis()
  {
      if ($this->Admin_model->cek_pengaturan()->atur==="tahap_input_calon_osis" || $this->Admin_model->cek_pengaturan()->atur==="berjalan") {
          $data["cek_setting"]=$this->Admin_model->cek_pengaturan();
          $data["cek_data_calon_osis"]=$this->Admin_model->cek_data_calon_osis()->num_rows();
          $data['view_data_calon_osis']=$this->Admin_model->cek_data_calon_osis()->result();

          $datane=[
              "no_calon_osis"=>htmlentities($this->input->post("no_calon_osis")),
              "nisn"=>htmlentities($this->input->post("nisn")),
              "nama_calon_osis"=>htmlentities($this->input->post("nama_calon_osis")),
              "foto"=>$this->_upload_img(),
              "visi_misi"=>$this->input->post("visi_misi"),
              "jumlah_suara"=>0
          ];

          $rules_form=[
              [
                  "field"=>"no_calon_osis",
                  "label"=>"Nomor Calon Osis",
                  "rules"=>"required"
              ],
              [
                  "field"=>"nisn",
                  "label"=>"NISN",
                  "rules"=>"required"
              ],
              [
                  "field"=>"nama_calon_osis",
                  "label"=>"Nama Calon Osis",
                  "rules"=>"required"
              ]
          ];

          if ($this->input->post("submit")) {
              if($this->form_validation->set_rules($rules_form)->run()){
                      if ($this->_upload_img()) {
                          if ($this->Admin_model->tambah_data_calon_osis($datane)) {
                              $this->session->set_flashdata("berhasil_tambah_calon_osis","<div class='alert alert-success mt-3'>Calon osis sukses ditambahkan</div>");
                              redirect(base_url("dash_admin/calon_osis"));
                          }
                      }else{
                          $this->session->set_flashdata("berhasil_upload","<div class='alert alert-warning mt-3'>Ukuran foto tak boleh melebihi 2MB dan format file yang diizinkan JPG,PNG,GIF,JPEG. Silahkan cek ulang!</div>");
                          redirect(base_url("dash_admin/calon_osis"));
                      }
              }
          }

          if ($this->input->post("selanjutnya_calon_pemilih")) {
              if ($this->Admin_model->setting_buat("tahap_input_calon_pemilih")) {
                  redirect(base_url("dash_admin/calon_pemilih"));
              }
          }

          $this->load->view("admin/header",$data);
          $this->load->view("admin/calon_osis",$data);
          $this->load->view("admin/footer");
      }else {
          $cekin_setting=$this->Admin_model->cek_pengaturan()->atur;
          if ($cekin_setting==="tahap_input_data_sekolah") {
              redirect(base_url("dash_admin/data_sekolah"));
          }elseif ($cekin_setting==="tahap_input_data_kelas") {
              redirect(base_url("dash_admin/data_kelas"));
          }elseif ($cekin_setting==="tahap_input_calon_osis") {
              redirect(base_url("dash_admin/calon_osis"));
          }elseif ($cekin_setting==="tahap_input_calon_pemilih") {
              redirect(base_url("dash_admin/calon_pemilih"));
          }
      }
  }

  public function calon_pemilih()
  {
      // $this->load->library("excel_reader");
      include APPPATH.'third_party/PHPExcel/PHPExcel/PHPExcel.php';

      $data['data_pemilih']=$this->Admin_model->tampil_kelas();
      $data['cek_setting']=$this->Admin_model->cek_pengaturan();
      if ($this->Admin_model->cek_pengaturan()->atur==="tahap_input_calon_pemilih" || $this->Admin_model->cek_pengaturan()->atur==="berjalan") {
          //tampil Kelas
          $data['d_kelas']=$this->Admin_model->tampil_kelas();

          if ($this->input->post("submit")) {
              $rulese1=[
                  [
                      "field"=>"nama",
                      "label"=>"Nama",
                      "rules"=>"required"
                  ],
                  [
                      "field"=>"nisn",
                      "label"=>"NISN",
                      "rules"=>"required|integer"
                  ],
                  [
                      "field"=>"kelas",
                      "label"=>"Kelas",
                      "rules"=>"required"
                  ],
                  [
                      "field"=>"jenkel",
                      "label"=>"Jenis Kelamin",
                      "rules"=>"required"
                  ],
                  [
                      "field"=>"tgl_lahir",
                      "label"=>"Tanggal Lahir",
                      "rules"=>"required"
                  ]
              ];
              if($this->form_validation->set_rules($rulese1)->run()){
                  $datane_1_1=[
                      "nama"=>htmlentities($this->input->post("nama")),
                      "nisn"=>htmlentities($this->input->post("nisn")),
                      "kelas"=>htmlentities($this->input->post("kelas")),
                      "jenkel"=>htmlentities($this->input->post("jenkel")),
                      "tgl_lahir"=>htmlentities($this->input->post("tgl_lahir")),
                      "set"=>"belum hadir",
                      "coblos_nomor"=>"belum coblos"
                  ];
                  if ($this->Admin_model->tambah_calon_pemilih_1_1($datane_1_1)) {
                      $this->session->set_flashdata("berhasil_tambah_calon_pemilih1","Berhasil Tambah Calon Pemilih.");
                      redirect(base_url("dash_admin/calon_pemilih"));
                  }
              }
          }

          if ($this->input->post("tambah_file")) {
              $config['upload_path'] = realpath('assets/excel');
              $config['allowed_types'] = 'xlsx|xls|csv';
              $config['max_size'] = '70000';
              $config['encrypt_name'] = true;

              $this->load->library("upload",$config);

              if (!$this->upload->do_upload("file")) {
                  // $datane_upload=$this->upload->data();
                  // unlink(realpath('assets/excel/'.$datane_upload['encrypt_name']));
                  $this->session->set_flashdata("gagal_upload_excel","Gagal Tambah Data Massal");
                  redirect(base_url("dash_admin/calon_pemilih"));
              }else{

                  $data_upload = $this->upload->data();

                  $excelreader     = new PHPExcel_Reader_Excel2007();
                  $loadexcel         = $excelreader->load('assets/excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
                  $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

                  $data = array();

                  $numrow = 1;
                  foreach($sheet as $row){
                                  if($numrow > 1){
                                      array_push($data, array(
                                          'nama' => $row['A'],
                                          'nisn' => $row['B'],
                                          'kelas' => $row['C'],
                                          'jenkel' => $row['D'],
                                          'tgl_lahir' => $row['E'],
                                          "set"=>"belum hadir",
                                          "coblos_nomor"=>"belum coblos"
                                      ));
                          }
                      $numrow++;
                  }
                  $this->db->insert_batch('data_calon_pemilih', $data);
                  //delete file from server
                  unlink(realpath('assets/excel/'.$data_upload['file_name']));

                  //upload success
                  $this->session->set_flashdata('berhasil_tambah_calon_pemilih_massal', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
                  //redirect halaman
                  redirect(base_url("dash_admin/calon_pemilih/"));

              }

          }

          if ($this->input->post("hapus_semua_calon_pemilih2")) {
              if ($this->Admin_model->hapus_semua_calon_pemilih()) {
                  $this->session->set_flashdata("sukses_hapus_semua_calon_pemilih","Sukses Hapus Semua Calon Pemilih");
                  redirect(base_url("dash_admin/calon_pemilih"));
              }
          }

          if ($this->input->post("selesai")) {
              $this->Admin_model->setting_buat("berjalan");
              redirect(base_url("dash_admin"));
          }

          $this->load->view("admin/header",$data);
          $this->load->view("admin/calon_pemilih",$data);
          $this->load->view("admin/footer",$data);
      }else {
          $cekin_setting=$this->Admin_model->cek_pengaturan()->atur;
          if ($cekin_setting==="tahap_input_data_sekolah") {
              redirect(base_url("dash_admin/data_sekolah"));
          }elseif ($cekin_setting==="tahap_input_data_kelas") {
              redirect(base_url("dash_admin/data_kelas"));
          }elseif ($cekin_setting==="tahap_input_calon_osis") {
              redirect(base_url("dash_admin/calon_osis"));
          }elseif ($cekin_setting==="tahap_input_calon_pemilih") {
              redirect(base_url("dash_admin/calon_pemilih"));
          }
      }
  }

  public function download_token($id=null)
  {
      include(APPPATH."third_party/PHPExcel/PHPExcel/PHPExcel.php");



      $object = new PHPExcel();
      $object->setActiveSheetIndex(0);
      $kolom= ['ID','Nama','Tanggal Lahir','Pekerjaan','Email','Alamat'];
      $column = 0;
      foreach($kolom as $field)
      {
          $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
          $column++;
      }
      $db = $this->load->database();
      $builder = $db->table('data_calon_pemilih');
      $query = $builder->get();
      $excel_row = 2;
      foreach ($query->getResult('array') as $row){
          $hasil = array_values($row);
          $kolom = sizeof($row);
          for($i=0;$i<$kolom;$i++){
              $object->getActiveSheet()->setCellValueByColumnAndRow($i, $excel_row, $hasil[$i]);
          }
          $excel_row++;
      }

      $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="DataPegawai.xlsx"');
      $writer->save('php://output');

  }

  public function hapus_calon_pemilih($id=null)
  {
      if (!$id) {
          show_404();
      }else {
          $cocok_data=$this->Admin_model->cocok_data_calon_pemilih($id);
          if ($cocok_data===1) {
              if ($this->Admin_model->hapus_calon_pemilih_id($id)) {
                  $this->session->set_flashdata("sukses_hapus_calon_pemilih_id","sukses");
                  redirect(base_url("dash_admin/calon_pemilih"));
              }
          }else{
              show_404();
          }
      }
  }

  public function json_calon_pemilih()
  {
    header("Content-type: application/json");
    $no=1;
    $this->load->library('datatables');
    $this->datatables->select('id,nama,nisn,kelas,jenkel');
    $this->datatables->from('data_calon_pemilih');
    $this->datatables->add_column('action', '<a href="'.base_url("dash_admin/hapus_calon_pemilih/").'$1" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin menghapus pemilih?\')">Hapus</a>', 'id');
    print_r($this->datatables->generate());

  }

  public function hapus_calon_osis($id=null)
  {
      if ($id) {
          $cek_id=$this->Admin_model->cek_id_calon_osis(["id"=>$id]);
          if ($cek_id===1) {
              if(unlink("./assets/img/".$this->Admin_model->view_id_calon_osis(['id'=>$id])->foto)){
                  $this->Admin_model->hapus_calsis(["id"=>$id]);
                  $this->session->set_flashdata("berhasil_hapus_calon_osis","Berhasil Hapus calon osis");
                  redirect(base_url("dash_admin/calon_osis"));
              }
          }else{
              show_404();
          }
      }else {
          show_404();
      }
  }

  public function hasil()
  {
      // $data['']
      $data["cek_setting"]=$this->Admin_model->cek_pengaturan();
      $data['res_semua']=$this->Admin_model->cek_daftar_hadir("semua");
      $data["res_hadir"]=$this->Admin_model->cek_daftar_hadir("hadir");
      $this->load->view("admin/header",$data);
      $this->load->view("admin/hasil");
      $this->load->view("admin/footer");
  }

  public function json_hasil_coblos()
  {
    header("Content-type: application/json");
    $no=1;
    $this->load->library('datatables');
    $this->datatables->select('id,nama,nisn,kelas,jenkel,set');
    $this->datatables->from('data_calon_pemilih');

    print_r($this->datatables->generate());

  }


  public function cetak_hasil()
  {

      $this->Admin_model->update_cetak_hasil();
      ob_start();
      //cowo
      $data['hasil_pdf_siswa_semua_laki'] = $this->Admin_model->lihat_hasil_pdf_laki("semua");
      $data['hasil_pdf_siswa_hadir_laki'] = $this->Admin_model->lihat_hasil_pdf_laki("hadir");
      $data['hasil_pdf_siswa_belum_hadir_laki'] = $this->Admin_model->lihat_hasil_pdf_laki("belum_hadir");

      //cewe
      $data['hasil_pdf_siswa_semua_perempuan'] = $this->Admin_model->lihat_hasil_pdf_perempuan("semua");
      $data['hasil_pdf_siswa_hadir_perempuan'] = $this->Admin_model->lihat_hasil_pdf_perempuan("hadir");
      $data['hasil_pdf_siswa_belum_hadir_perempuan'] = $this->Admin_model->lihat_hasil_pdf_perempuan("belum_hadir");

      //hasilnya
      $data["lihat_pdf_hasilnya_paslon"]=$this->Admin_model->lihat_pdf_hasilnya("paslon");

      $data["data_sekolah"]=$this->Admin_model->lihat_data_sekolah_pdf();

      $this->load->view('admin/hasil_pdf',$data);
      $html = ob_get_contents();
      ob_end_clean();
      include_once APPPATH . '/third_party/html2pdf/vendor/autoload.php';
      $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
      $pdf->pdf->SetTitle("Laporan Polling Osis");
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan_polling.pdf');
  }

  public function users(){
      $data["cek_setting"]=$this->Admin_model->cek_pengaturan();

      $data["view_user"]=$this->Admin_model->view_user();

      if ($this->input->post("submit")) {
          $value=[
              "username"=>$this->input->post("username"),
              "password"=>sha1($this->input->post("password"))
          ];
          if ($this->Admin_model->tambah_user($value)) {
              $this->session->set_flashdata("berhasil","berhasil");
              redirect(base_url("dash_admin/users/"));
          }
      }

      $this->load->view("admin/header",$data);
      $this->load->view("admin/users",$data);
      $this->load->view("admin/footer");
  }

  public function hapus_user($id=null)
  {
      if (!$id) {
          show_404();
      }else{
          $id=["id"=>$id];
          if ($this->Admin_model->cocok_id_user($id)===1) {
              if ($this->Admin_model->hapus_user($id)) {
                  $this->session->set_flashdata("berhasil_hapus","berhasil");
                  redirect(base_url("dash_admin/users/"));
              }else {
                  $this->session->set_flashdata("gagal_hapus","gagal");
                  redirect(base_url("dash_admin/users/"));
              }
          }else {
              show_404();
          }
      }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url("admin"));
  }
}
 ?>
