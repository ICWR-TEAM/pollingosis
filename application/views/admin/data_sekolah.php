<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
            <h4>Data sekolah</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data sekolah</li>
            </ul>
            </div>
        </header>
        <!-- main box -->
        <div class="col-12">
            <section class="main__box border-0 shadow">
                <form class="" action="" method="post">
                    <h3>Identitas Sekolah</h3>
                    <hr>
                    <ul>
                        <li><strong>NPSN:</strong> <input type="text" name="npsn" value="<?php echo $view_dsekolah->npsn ?>" placeholder="NPSN" class="form-control"> </li><br>
                        <li><strong>NAMA SEKOLAH:</strong> <input type="text" name="nama_sekolah" value="<?php echo $view_dsekolah->nama_sekolah ?>" placeholder="Nama sekolah" class="form-control"> </li><br>
                        <li><strong>ALAMAT SEKOLAH: </strong> <input type="text" name="alamat" value="<?php echo $view_dsekolah->alamat_sekolah ?>" placeholder="Alamat sekolah" class="form-control"> </li><br>
                        <li><strong>Desa / Kelurahan</strong> <input type="text" name="desa_kelurahan" value="<?php echo $view_dsekolah->desa_kelurahan ?>" placeholder="Desa / Kelurahan" class="form-control"> </li><br>
                        <li><strong>Kecamatan</strong> <input type="text" name="kecamatan" value="<?php echo $view_dsekolah->kecamatan ?>" placeholder="Kecamatan" class="form-control"> </li><br>
                        <li><strong>Kota / Kabupaten</strong> <input type="text" name="kota_kabupaten" value="<?php echo $view_dsekolah->kota_kabupaten ?>" placeholder="Kota / Kabupaten" class="form-control"> </li><br>
                    </ul>
                    <hr class="bg-dark">
                    <h3>Identitas Kepala Sekolah</h3>
                    <ul>
                        <li> <strong>Nama Kepala Sekolah: </strong><input type="text" name="nama_kepsek" value="<?php echo $view_dsekolah->nama_kepsek ?>" placeholder="Nama kepala sekolah" class="form-control"> </li>
                        <br>
                        <li><strong>NIP:</strong> <input type="text" name="nip" value="<?php echo $view_dsekolah->nip ?>" class="form-control" placeholder="NIP"> </li>
                    </ul>
                    <hr class="bg-dark">
                    <h3>Tahun Pelaksanaan</h3>
                    <ul>
                        <li class="mt-3"> <strong>Tahun pelajaran: </strong><input type="text" name="tahun" value="<?php echo $view_dsekolah->tahun_pelajaran ?>" placeholder="Tahun Pelajaran..." class="form-control"> </li>
                    </ul>
                    <input type="submit" name="submit" value="Update data" class="btn btn-success mt-3 col-md-12">
                </form>
                <?php
                if ($this->session->flashdata("berhasil_edit")) {
                    ?>
                    <div class="alert alert--success mt-3">
                        <div class="alert__icon">
                            <span class="fa fa-check-circle"></span>
                        </div>
                        <div class="alert__description">
                            <p>Sukses perbarui data.</p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                    <?php
                }
                 ?>
            </section>
        </div>
    </div><!-- row -->
</main>
