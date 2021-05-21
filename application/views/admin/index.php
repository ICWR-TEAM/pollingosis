<?php
 // error_reporting(0);
 ?><!-- main -->
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
            <h4>Dashboard</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
            </div>
        </header>
        <!-- main box -->
        <div class="col-12">
            <section class="main__box border-0 shadow">
                <?php if($cek_setting->atur=="berjalan"){ ?>
                  <div class="row">
                    <div class="col-md-6 mt-3">
                      <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="text-center">
                                <strong><u>Calon osis</u></strong>
                                <h5 class="mt-3"><?php echo $var_data_calon_osis ?></h5>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mt-3 mb-2">
                      <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="text-center">
                                <strong> <u>Calon pemilih</u> </strong>
                                <h5 class="mt-3"><?php echo $var_data_calon_pemilih ?></h5>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 mt-3">
                          <section class="chart shadow border-0">
                              <div class="chart__header">
                                  <h6>Grafik pemilihihan ketua osis 2020</h6>
                              </div>
                              <div class="chart__body">
                                  <canvas id="doughnut_chart"></canvas>
                              </div>
                          </section>
                      </div>
                  </div>
                  <form class="" method="post">
                      <input type="submit" name="restart_app" value="Hapus Semua Data / Kembali Dari Awal" class="mt-5 btn btn-danger col-md-12 shadow-sm" onclick="return confirm('Apakah Anda Yakin Untuk Mengulangi Dari Awal???')">
                  </form>
              <?php
              }else{
                  ?>
                  <div class="card">
                      <div class="card-body">
                          <p class="display-4 text-center">
                              Belum ada kegiatan pemilihan osis
                              <div class="alert alert--info">
                                  <!-- <div class="alert__icon">
                                      <i class="fas fa-info-circle"></i>
                                  </div> -->
                                  <div class="alert__description text-center mb-3 mt-3">
                                      <p>Apakah anda ingin membuat pemilihan osis?</p>
                                      <form class="" action="<?php echo base_url("Dash_admin/buat_polling") ?>" method="post">
                                          <input type="hidden" name="ya">
                                          <input type="submit" name="submit" value="Ya!" class="btn btn-success">
                                      </form>
                                  </div>
                              </div>
                          </p>
                      </div>
                  </div>
                  <?php
              }
               ?>
            </section>
        </div>
    </div><!-- row -->
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script type="text/javascript">
    // Doughnut Chart///////////////////////////////////////////
    const doughnutChart = document.querySelector("#doughnut_chart").getContext('2d');
    let configDoughnutChart = {
        type: 'doughnut',
        data: {
            labels: ['Siswa Telah Memilih','Siswa Belum Memilih'],
            datasets: [{
                data: [<?php echo $val_data_osis_hadir ?>,<?php echo $val_data_osis_belum_hadir; ?>],
                backgroundColor: [
                    "#1bd741",
                    "#dd2525"
                ]
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: true
            },
            tooltips: {
                titleFontFamily: 'sans-serif',
                bodyFontFamily: 'sans-serif',
                backgroundColor: '#fff',
                titleFontColor: '#333',
                bodyFontColor: '#333',
                borderColor: '#e2e2e2',
                borderWidth: '1',
            }
        }
    }
    new Chart(doughnutChart, configDoughnutChart);
</script>
