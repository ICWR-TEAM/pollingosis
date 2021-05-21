<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
            <h4>Data kelas</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data kelas</li>
            </ul>
            </div>
        </header>
        <!-- main box -->
        <div class="col-12">
            <section class="main__box border-0 shadow">
                <h3>Tambah Kelas</h3>
                <hr>
                <form class="" action="" method="post">
                    <label for="kelas"><strong>Kelas:</strong></label>
                    <input type="text" name="kelas" value="" placeholder="Kelas" class="form-control <?php echo form_error("kelas")?'is-invalid':'' ?>" id="kelas">
                    <div class="invalid-feedback">
						<?php echo form_error('kelas') ?>
					</div>
                    <input type="submit" name="submit" value="Tambah" class="btn btn-primary mt-3 col-md-12">
                    <?php if($cek_setting->atur!=="berjalan"){ ?>
                    <input type="submit" name="selesai" value="Selesai menambahkan kelas / tahap selanjutnya" class="btn btn-success col-md-12 mt-3">
                    <?php } ?>
                </form>
                <?php
                if($this->session->flashdata("berhasil")){
                    ?>
                    <div class="alert alert--success mt-3">
                        <div class="alert__icon">
                            <span class="fa fa-check-circle"></span>
                        </div>
                        <div class="alert__description">
                            <p>Berhasil tambah kelas.</p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                    <?php
                } ?>
            </section>
            <section class="main__box mt-3 border-0 shadow">
                <h3>Daftar kelas</h3>
                <hr>
                <pre>
                    <table class="table table-boardered">
                        <thead>
                            <tr>
                                <th width="70px">No</th>
                                <th width="">Kelas</th>
                                <th width="50px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($table_kelas as $var) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $var->kelas; ?></td>
                                    <td> <a href="<?php echo base_url("dash_admin/hapus_kelas/".$var->id); ?>" onclick="return confirm('Yakin ingin menghapus??')" class="btn btn-danger text-white btn-sm">Hapus</a> </td>
                                </tr>
                                <?php
                            }
                             ?>
                        </tbody>
                    </table>
                </pre>
                <?php if ($this->session->flashdata("berhasil_hapus")): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata("berhasil_hapus"); ?>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </div><!-- row -->
</main>
