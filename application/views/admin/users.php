<!-- main -->
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
            <h4>Pengguna</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pengguna</li>
            </ul>
            </div>
        </header>
        <div class="col-12">
            <section class="main__box border-0 shadow">
                <h3>Pengguna</h3>
                <hr>
                <form class="" method="post">
                    <label for="username"> <strong>Username: </strong> </label>
                    <input type="text" name="username" value="" placeholder="Username..." class="form-control">
                    <label for="password" class="mt-3"> <strong>Password: </strong> </label>
                    <input type="text" name="password" value="" placeholder="Password..." class="form-control">
                    <input type="submit" name="submit" value="Tambah Pengguna" class="btn btn-success col-md-12 mt-3">
                </form>
                <?php if ($this->session->flashdata("berhasil")): ?>
                    <div class="alert alert--success mt-3">
                        <div class="alert__icon">
                            <span class="fa fa-check-circle"></span>
                        </div>
                        <div class="alert__description">
                            <p>Berhasil tambah pengguna.</p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata("berhasil_hapus")): ?>
                    <div class="alert alert--success mt-3">
                        <div class="alert__icon">
                            <span class="fa fa-check-circle"></span>
                        </div>
                        <div class="alert__description">
                            <p>Berhasil hapus pengguna.</p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata("gagal_hapus")): ?>
                    <div class="alert alert--danger mt-3">
                        <div class="alert__icon">
                            <span class="fa fa-ban"></span>
                        </div>
                        <div class="alert__description">
                            <p>Gagal hapus pengguna.</p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        </div>
        <!-- main box -->
        <div class="col-12 mt-3">
            <section class="main__box border-0 shadow">
                <h3>Daftar Pengguna</h3>
                <hr>
                <pre>
                    <table class="table table-boardered">
                        <thead>
                            <tr>
                                <th width="100px">No</th>
                                <th>Username</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($view_user as $var):
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $var->username; ?></td>
                                    <td> <a href="<?php echo base_url('dash_admin/hapus_user/'.$var->id) ?>" class="btn btn-danger text-white" onclick="return confirm('Yakin ingin menghapus pengguna tersebut??')">Hapus</a> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </pre>
            </section>
        </div>
    </div><!-- row -->
</main>
