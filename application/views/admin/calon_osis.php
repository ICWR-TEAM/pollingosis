<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
            <h4>Calon osis</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Calon osis</li>
            </ul>
            </div>
        </header>
        <!-- main box -->
        <div class="col-12">
            <section class="main__box border-0 shadow">
                <h3>Calon osis</h3>
                <hr>
                <ul>
                    <form class="" method="post" enctype="multipart/form-data">
                        <li>
                            <strong>Nomor calon osis: *</strong> <input type="number" name="no_calon_osis" value="" placeholder="No Calon Osis" class="form-control <?php echo form_error("no_calon_osis")?'is-invalid':'' ?>" min="1">
                            <div class="invalid-feedback">
                                <?php echo form_error("no_calon_osis") ?>
                            </div>
                        </li><br>
                        <li>
                            <strong>NISN *</strong><input type="text" name="nisn" value="" placeholder="NISN" class="form-control <?php echo form_error("nisn")?'is-invalid':'' ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error("nisn") ?>
                            </div>
                        </li><br>
                        <li>
                            <strong>Nama: *</strong><input type="text" name="nama_calon_osis" value="" placeholder="Nama Calon Osis" class="form-control <?php echo form_error("nama_calon_osis")?'is-invalid':'' ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error("nama_calon_osis") ?>
                            </div>
                        </li><br>
                        <li>
                            <strong>Foto: *</strong> <input type="file" name="foto_calon_osis" value="">
                        </li><br>
                        <li>
                            <strong>Visi misi: *</strong>
                            <textarea name="visi_misi" rows="8" cols="80" class="ckeditor"></textarea>
                        </li>
                        <?php
                        if ($this->session->flashdata("berhasil_tambah_calon_osis")) {
                            echo $this->session->flashdata("berhasil_tambah_calon_osis");
                        }
                        if ($this->session->flashdata("berhasil_upload")) {
                            echo $this->session->flashdata("berhasil_upload");
                        }
                         ?>
                        <input type="submit" name="submit" value="Tambah Calon" class="btn btn-primary col-md-12 mt-4 mb-3">
                        <?php if($cek_setting->atur!=="berjalan"){ ?>
                        <input type="submit" name="selanjutnya_calon_pemilih" value="Selesai / Tahap selanjutnya" class="btn btn-success col-md-12">
                        <?php } ?>
                    </form>
                </ul>
            </section>
            <div class="mt-3">
                <div class="card border-0 shadow bg-info text-white">
                    <div class="card-body">
                        <div class="text-center">
                            <strong>Note:</strong>
                             Simbol ( * ) wajib diisi.
                        </div>
                    </div>
                </div>
            </div>
            <section class="main__box mt-3 border-0 shadow">
                <h3>Data Calon Osis</h3>
                <hr>
                <?php
                if ($this->session->flashdata("berhasil_hapus_calon_osis")) {
                    echo "<div class='alert alert-success mt-3 mb-3'>".$this->session->flashdata("berhasil_hapus_calon_osis")."</div>";
                }
                 ?>
                <?php if($cek_data_calon_osis>0){ ?>
                        <?php foreach ($view_data_calon_osis as $var): ?>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-3 mt-3">
                                        <strong><?php echo $var->no_calon_osis ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div id="accordion<?php echo $var->no_calon_osis; ?>">
                                        <div class="card">
                                            <div class="card-header" id="nama_heading<?php echo $var->no_calon_osis; ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#nama_coll<?php echo $var->no_calon_osis; ?>" aria-expanded="false" aria-controls="nama_coll<?php echo $var->no_calon_osis; ?>">
                                                        Nama Calon Osis
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="nama_coll<?php echo $var->no_calon_osis; ?>" class="collapse show" aria-labelledby="nama_heading<?php echo $var->no_calon_osis; ?>" data-parent="#accordion<?php echo $var->no_calon_osis; ?>">
                                                <div class="card-body">
                                                    <?php echo $var->nama_calon_osis ?>
                                                </div>
                                            </div>
                                        </div>
                                      <div class="card">
                                        <div class="card-header" id="nisn_heading<?php echo $var->no_calon_osis; ?>">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#nisn_coll<?php echo $var->no_calon_osis ?>" aria-expanded="false" aria-controls="nisn_coll<?php echo $var->no_calon_osis ?>">
                                              NISN
                                            </button>
                                          </h5>
                                        </div>

                                        <div id="nisn_coll<?php echo $var->no_calon_osis; ?>" class="collapse" aria-labelledby="nisn_heading<?php echo $var->no_calon_osis; ?>" data-parent="#accordion<?php echo $var->no_calon_osis; ?>">
                                          <div class="card-body">
                                              <?php echo $var->nisn ?>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="foto_heading<?php echo $var->no_calon_osis; ?>">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#foto_coll<?php echo $var->no_calon_osis; ?>" aria-expanded="false" aria-controls="foto_coll<?php echo $var->no_calon_osis; ?>">
                                                Foto
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="foto_coll<?php echo $var->no_calon_osis; ?>" class="collapse" aria-labelledby="foto_heading<?php echo $var->no_calon_osis; ?>" data-parent="#accordion<?php echo $var->no_calon_osis; ?>">
                                          <div class="card-body">
                                              <img src="<?php echo base_url("assets/img/".$var->foto) ?>" alt="Foto calon..." width="200px">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="visi_misi_heading<?php echo $var->no_calon_osis; ?>">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#visi_misi_coll<?php echo $var->no_calon_osis; ?>" aria-expanded="false" aria-controls="visi_misi_coll<?php echo $var->no_calon_osis; ?>">
                                                Visi Misi
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="visi_misi_coll<?php echo $var->no_calon_osis; ?>" class="collapse" aria-labelledby="visi_misi_heading<?php echo $var->no_calon_osis; ?>" data-parent="#accordion<?php echo $var->no_calon_osis; ?>">
                                          <div class="card-body">
                                              <?php echo $var->visi_misi ?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <a href="<?php echo base_url("dash_admin/hapus_calon_osis/".$var->id) ?>" class="btn btn-danger col-md-12 mt-4 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg> Hapus</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                <?php
                }else {
                    echo "<h2>Tidak ada calon osis untuk ditampilkan.</h2>";
                } ?>
            </section>
        </div>
    </div><!-- row -->
</main>
<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
