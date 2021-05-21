<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>awok</title>
        <style>
         /* table{
          border:silver 1px solid;
         }
         table td{
          border-bottom:silver 1px solid;
          border-right:silver 1px solid;
          padding:0 0 0 5px;
         } */
        </style>

        <!-- <style media="screen">
            body{
                /* text-align:auto; */

            }
        </style> -->
    </head>
    <body>
        <h1 align="center">Laporan Pemilihan Osis</h1>
        <h4 align="center" style="margin-top:-10px;">Tahun Ajaran <?php echo $data_sekolah->tahun_pelajaran; ?></h4>
        <hr>
        <div style="font-size: 16px; margin-top:20px">
            <h3 style="margin-top: -10px;">Data sekolah:</h3>
            <div style="margin-left: 25px;">
                Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->nama_sekolah; ?>
                <br>
                NPSN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->npsn; ?>
                <br>
                Alamat Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->alamat_sekolah; ?>
                <br>
                Kota&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->kota_kabupaten; ?>
                <br>
                Kecamatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->kecamatan; ?>
                <br>
                Desa / Kelurahan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->desa_kelurahan; ?>
                <br>
                Tahun Ajaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->tahun_pelajaran; ?>
            </div>
            <h3>Data Kepala Sekolah: </h3>
            <div style="margin-left: 25px;">
                Nama Kepala Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->nama_kepsek; ?>
                <br>
                NIP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_sekolah->nip; ?>
            </div>
        </div>
        <div style="font-size: 16px; margin-top:10px">
            <h3 text-align="center">Menyatakan laporan bahwa:</h3>

            <table border="0.5px" cellpadding="0" cellspacing="0" >
                <thead>
                    <tr>
                        <th width="185" bgcolor="#ccc" align="center" style="padding-top: 10px; padding-bottom: 10px;">Keterangan</th>
                        <th width="185" bgcolor="#ccc" align="center" style="padding-top: 10px; padding-bottom: 10px;">Pemilih terdaftar</th>
                        <th width="185" bgcolor="#ccc" align="center" style="padding-top: 10px; padding-bottom: 10px;">Telah memilih</th>
                        <th width="185" bgcolor="#ccc" align="center" style="padding-top: 10px; padding-bottom: 10px;">Tidak hadir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr align="center">
                        <th bgcolor="#ccc" style="padding-top: 10px; padding-bottom: 10px;">L</th>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_semua_laki; ?></td>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_hadir_laki; ?> </td>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_belum_hadir_laki; ?> </td>

                    </tr>
                    <tr align="center">
                        <th bgcolor="#ccc" style="padding-top: 10px; padding-bottom: 10px;">P</th>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_semua_perempuan; ?></td>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_hadir_perempuan; ?> </td>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_belum_hadir_perempuan; ?> </td>

                    </tr>
                    <tr align="center">
                        <th bgcolor="#ccc" style="padding-top: 10px; padding-bottom: 10px;">Jumlah</th>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_semua_laki+$hasil_pdf_siswa_semua_perempuan; ?></td>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_hadir_laki+$hasil_pdf_siswa_hadir_perempuan; ?></td>
                        <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $hasil_pdf_siswa_belum_hadir_laki+$hasil_pdf_siswa_belum_hadir_perempuan; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="font-size: 16px; margin-top:10px">

            <h3 align="center">Dengan hasil suara:</h3>
            <table border="0.5px" cellpadding="0" cellspacing="0" >
                <thead>
                    <tr>
                        <th width="247" bgcolor="#ccc" align="center" style="padding-top: 10px; padding-bottom: 10px;">No Paslon</th>
                        <th width="247" bgcolor="#ccc" align="center" style="padding-top: 10px; padding-bottom: 10px;">Nama</th>
                        <th width="247" bgcolor="#ccc" align="center" style="padding-top: 10px; padding-bottom: 10px;">Jumlah Suara</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lihat_pdf_hasilnya_paslon as $value) {
                        ?>
                        <tr align="center">
                            <td bgcolor="#ccc" style="padding-top: 10px; padding-bottom: 10px;"><?php echo $value->no_calon_osis ?></td>
                            <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $value->nama_calon_osis ?></td>
                            <td style="padding-top: 10px; padding-bottom: 10px;"><?php echo $value->jumlah_suara ?></td>
                        </tr>
                        <?php
                    }

                     ?>
                </tbody>
            </table>
        </div>
        <div style="font-size: 15px; margin-top: 20px;" align="center">
            <b>
                Menyatakan bahwa website polling ini menghasilkan keputusan diatas yang sesuai dan seadil-adilnya dan keputusan tersebut tidak boleh diganggu gugat dengan alasan apapun.
                <!-- Laporan diatas adalah hasil tetap dan tidak boleh digangu gugat dalam alasan apapung. -->
            </b>
        </div>
        <div style="font-size: 16px; margin-top: 20px;">
            <div style="margin-left: 470px">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                echo $data_sekolah->kota_kabupaten; ?>,
                <?php
                function bulanIndo () {
                    $bulan = array (
            			1=>'Januari',
            			2=>'Februari',
            			3=>'Maret',
            			4=>'April',
            			5=>'Mei',
            			6=>'Juni',
            			7=>'Juli',
            			8=>'Agustus',
            			9=>'September',
            			10=>'Oktober',
            			11=>'November',
            			12=>'Desember'
            		);
                    return $bulan[(int)date("m")];
                }
                echo date("d ").bulanIndo().date(" Y");
                ?>

            </div>
            <div style="margin-left: 470px; margin-top: 50px;">
                <p style="font-weight: bold;">
                    <?php echo $data_sekolah->nama_kepsek; ?>
                    <br>
                    NIP: <?php echo $data_sekolah->nip; ?>
                </p>

            </div>
        </div>
    </body>
</html>
