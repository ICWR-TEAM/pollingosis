<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- main -->
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
            <h4>Cek Daftar Hadir Pemilih</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Cek Daftar Hadir</li>
            </ul>
            </div>
        </header>
        <!-- main box -->

            <div class="col-12">

                <div class="card border-0 shadow mb-3">
                    <div class="card-body">
                        <h5><b>HASIL</b></h5>
                        <hr>
                        Jumlah siswa: <?php echo $res_semua; ?>
                        <br>
                        Siswa yang hadir: <?php echo $res_hadir; ?>
                        <br>
                        Siswa yang belum hadir: <?php echo $res_semua-$res_hadir; ?>
                    </div>
                    <a href="<?php echo base_url("dash_admin/cetak_hasil"); ?>" class="btn btn-primary col-md-12 text-center" style="border-radius: 0px 0px 5px 5px;">Cetak Hasil</a>
                </div>

                <div class="card border-0 shadow">
                    <div class="card-body">
                        <table id="table" class="display col-md-12" cellspacing="0" width="100%">
                            <thead>
                                <tr><th>Nama</th><th>NISN</th><th>Kelas</th><th>Jenis Kelamin</th> <th>Kehadiran</th> </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row -->
</main>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

var save_method;
var table;

    table = $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": '<?php echo site_url('dash_admin/json_hasil_coblos'); ?>',
            "type": "POST"
        },
        pageLength: 10,
        paging: true,
        responsive: true,
        lengthMenu: [10,25,50,100,1000],
        "columns": [
            {"data": "nama",width:300},
            {"data": "nisn",width:150},
            {"data": "kelas",width:150},
            {"data": "jenkel",width:100},
            {"data": "set",width:100}

        ]

    });
</script>
