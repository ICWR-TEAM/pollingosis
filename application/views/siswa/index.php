<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Dashboard Siswa - Polling Osis</title>
    <style>
    .jumbotron{
        padding: 2rem 1rem;
        background-color: #74BFF2;
    }
    .auto-image{
        width: 50%;
        height: 100%;
        object-fit: cover;
    }
    .btn-custom{
         /* background-color:#ffc93c; */
         border: 2px solid #ffc93c;
    }
    .btn-custom:hover{
        transition: 0.5s;
        background-color: #ffc93c;
        color: white;
        -webkit-box-shadow: 0px 16px 32px -17px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 16px 32px -17px rgba(0,0,0,0.75);
        box-shadow: 0px 16px 32px -17px rgba(0,0,0,0.75);
    }
    body{
        font-family: georgia;
    }
    </style>
  </head>
  <body>
      <section class="jumbotron">
          <h1 class="text-center display-5 text-white">Selamat Datang, <?php echo explode("-",$this->session->userdata("nama"))[0]; ?></h1>
      </section>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#74BFF2" fill-opacity="1" d="M0,64L34.3,74.7C68.6,85,137,107,206,133.3C274.3,160,343,192,411,197.3C480,203,549,181,617,165.3C685.7,149,754,139,823,133.3C891.4,128,960,128,1029,133.3C1097.1,139,1166,149,1234,149.3C1302.9,149,1371,139,1406,133.3L1440,128L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
      <div class="container pb-5">
          <div class="row pb-5">
              <?php foreach ($calon_osis as $var){ ?>
                  <div class="col-xl-6 col-md-6 mb-4 container">
                      <div class="card border-0 shadow">
                          <img src="<?php echo base_url("assets/img/".$var->foto) ?>" class="card-img-top" style="object-fit: cover; width: 100%; height: 250px;">
                          <div class="card-body">
                              <h3 class="card-title text-center mb-0"> <b> <?php echo $var->nama_calon_osis ?> </b> </h3>
                              <hr>
                              <div class="card-text text-black-50">
                                  <p>
                                      <?php echo $var->visi_misi ?>
                                  </p>
                              </div>
                              <hr>
                              <form class="" method="post">
                                  <input type="hidden" name="value_calon" value="<?php echo $var->no_calon_osis ?>">
                                  <input type="submit" name="submit" value="Pilih '<?php echo $var->nama_calon_osis; ?> '" class="btn col-md-12 col-12 btn-custom">
                              </form>
                          </div>
                      </div>
                  </div>
              <?php } ?>
          </div>


      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#74BFF2" fill-opacity="1" d="M0,64L30,74.7C60,85,120,107,180,96C240,85,300,43,360,74.7C420,107,480,213,540,218.7C600,224,660,128,720,112C780,96,840,160,900,176C960,192,1020,160,1080,122.7C1140,85,1200,43,1260,48C1320,53,1380,107,1410,133.3L1440,160L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
      <section style="background-color: #74BFF2;">
          <div style="padding:50px" class="text-center text-white">
              Copyright &copy; 2021 By Billy <br> Assisted with the components around
          </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
