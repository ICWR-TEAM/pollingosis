<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- main -->
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
            <h4>Calon Pemilih</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Calon Pemilih</li>
            </ul>
            </div>
        </header>
        <!-- main box -->
        <div class="col-12">
            <div class="row">
                <div class="col-md-8 mt-3">
                    <section class="main__box border-0 shadow">
                        <h4>Masukan data manual</h4>
                        <hr>
                        <form class="" method="post">
                            <label for="nama"><strong>Nama:</strong></label>
                            <input type="text" name="nama" value="<?php echo set_value("nama") ?>" placeholder="Nama..." class="form-control <?php echo form_error("nama")?"is-invalid":"" ?>" id="nama">
                            <div class="invalid-feedback">
                                <?php echo form_error("nama"); ?>
                            </div>
                            <label for="jenkel" class="mt-3"><strong>Jenis Kelamin</strong></label>
                            <select class="form-control  <?php echo form_error("jenkel")?"is-invalid":"" ?>" name="jenkel">
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error("jenkel"); ?>
                            </div>
                            <label for="kelas" class="mt-3"><strong>Kelas: </strong></label>
                            <select class="form-control  <?php echo form_error("kelas")?"is-invalid":"" ?>" name="kelas">
                                <option value="">Kelas</option>
                                <?php
                                foreach ($d_kelas as $kelas) {
                                    ?>
                                    <option value="<?php echo $kelas->kelas ?>"><?php echo $kelas->kelas ?></option>
                                    <?php
                                }
                                 ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error("kelas"); ?>
                            </div>
                            <label for="nisn" class="mt-3"> <strong>NISN:</strong> </label>
                            <input type="text" name="nisn" value="<?php echo set_value("nisn") ?>" placeholder="NISN..." class="form-control  <?php echo form_error("nisn")?"is-invalid":"" ?>" id="nisn">
                            <div class="invalid-feedback">
                                <?php echo form_error("nisn"); ?>
                            </div>
                            <label for="tgl_lahir" class="mt-3"> <strong>Tanggal lahir:</strong> </label>
                            <input type="text" name="tgl_lahir" value="<?php echo set_value("tgl_lahir") ?>" placeholder="Tanggal lahir" class="form-control  <?php echo form_error("tgl_lahir")?"is-invalid":"" ?>" id="tgl_lahir">
                            <div class="invalid-feedback">
                                <?php echo form_error("tgl_lahir"); ?>
                            </div>
                            <input type="submit" name="submit" value="Tambahkan" class="btn btn-primary mt-4 col-md-12">
                            <?php if($cek_setting->atur!=="berjalan"){ ?>
                            <input type="submit" name="selesai" value="Selesai / Tahap Selanjutnya" class="btn btn-success mt-3 col-md-12 mb-3">
                            <?php } ?>
                        </form>
                        <div class="border border-danger rounded mt-3 mb-3 p-3 text-danger">
                            <h4 class="text-danger">Catatan:</h4>
                            <ul>
                                <li>NISN harus diisi karena untuk username siswa.</li>
                                <li>Tanggal lahir harus diisi karena pengganti password siswa(format: hh-bb-tttt).</li>
                            </ul>
                        </div>
                        <?php if ($this->session->flashdata("berhasil_tambah_calon_pemilih1")): ?>
                            <div class="alert alert--success">
                                <div class="alert__icon">
                                    <span class="fa fa-check-circle"></span>
                                </div>
                                <div class="alert__description">
                                    <?php echo $this->session->flashdata("berhasil_tambah_calon_pemilih1"); ?>
                                </div>
                                <div class="alert__action">
                                    <a class="alert__close-btn">&times;</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </section>
                </div>
                <div class="col-md-4 mt-3">
                    <section class="main__box border-0 shadow">
                        <h4>Masukan Data Massal</h4>
                        <hr>
                        <form class="" method="post" enctype="multipart/form-data">
                            <label for=""> <strong>File:</strong> </label>
                            <input type="file" name="file" value="" class="mb-3">
                            <div class="border border-danger rounded mb-3 mt-3 p-3 text-danger">
                                <h4 class="text-danger">Catatan:</h4>
                                <ul>
                                    <li>File yang diizinkan xlsx / xls / csv</li>
                                </ul>
                            </div>
                            <input type="submit" name="tambah_file" value="Tambahkan" class="btn btn-primary col-md-12 mt-3">
                        </form>
                        <?php if ($this->session->flashdata("berhasil_tambah_calon_pemilih_massal")): ?>
                            <div class="alert alert--success mt-3">
                                <div class="alert__icon">
                                    <span class="fa fa-check-circle"></span>
                                </div>
                                <div class="alert__description">
                                    <p>Berhaasil Tambah Calon Massal</p>
                                </div>
                                <div class="alert__action">
                                    <a class="alert__close-btn">&times;</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata("gagal_upload_excel")): ?>
                            <div class="alert alert--danger mt-3">
                                <div class="alert__icon">
                                    <span class="fa fa-ban"></span>
                                </div>
                                <div class="alert__description">
                                    <p><?php echo $this->session->flashdata("gagal_upload_excel") ?></p>
                                </div>
                                <div class="alert__action">
                                    <a class="alert__close-btn">&times;</a>
                                </div>
                            </div>
                        <?php endif; ?>

                    </section>
                </div>
            </div>

            <div class="main__box mt-3 border-0 shadow">
                <h3>Data Calon Pemilih</h3>
                <hr>
                <form class="" method="post">
                    <input type="submit" name="hapus_semua_calon_pemilih2" value="Hapus Semua Calon Pemilih" class="btn btn-danger col-md-12 mb-3" onclick="return confirm('Apakah Anda Yakin Menghapusnya?')">
                </form>
                <?php if ($this->session->flashdata("sukses_hapus_semua_calon_pemilih")): ?>
                    <div class="alert alert--warning mb-3">
                        <div class="alert__icon">
                            <span class="fa fa-check-circle"></span>
                        </div>
                        <div class="alert__description">
                            <p>Berhasil Hapus Semua Data Calon Pemilih</p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata("sukses_hapus_calon_pemilih_id")): ?>
                    <div class="alert alert--warning mb-3">
                        <div class="alert__icon">
                            <span class="fa fa-check-circle"></span>
                        </div>
                        <div class="alert__description">
                            <p>Berhasil Hapus Data Calon Pemilih</p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- <table id="anu" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr><th>Nama</th><th>NISN</th><th>Kelas</th><th>Jenis Kelamin</th></tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> -->
                <table id="table" class="display col-md-12" cellspacing="0" width="100%">
                    <thead>
                        <tr><th>Nama</th><th>NISN</th><th>Kelas</th><th>Jenis Kelamin</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div><!-- row -->
</main>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

    var save_method; //for save method string
    var table;

    // $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": '<?php echo site_url('dash_admin/json_calon_pemilih'); ?>',
                "type": "POST"
            },
            //Set column definition initialisation properties.
            // dom: 'frtip',
            pageLength: 10,
            paging: true,
            responsive: true,
            lengthMenu: [10,25,50,100,1000],
            //Set column definition initialisation properties.
            "columns": [
                {"data": "nama",width:250},
                {"data": "nisn",width:150},
                {"data": "kelas",width:150},
                {"data": "jenkel",width:100},
                {"data": "action",width:90}
            ],

        });

    // });
</script>
