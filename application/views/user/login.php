<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background: url(<?php echo base_url("assets/statis/bg-login-siswa.jpg") ?>);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            font-family: georgia;
        }
        @media only screen and (min-width: 200px) {
            .pede {
                margin-top:50%;
                margin-bottom:50%;
            }
        }
        @media only screen and (min-width: 600px) {
            .pede {
                margin-top:150px;
                margin-bottom:150px;
            }
        }
        @media only screen and (min-width: 700px) {
            .pede {
                margin-top:150px;
                margin-bottom:150px;
            }
        }
        .bg-bordere{
            background-color: #FBFBFB;
        }
    </style>
    <title>Login Siswa!</title>
  </head>
  <body class="bg-secondary">

      <div class="container">
          <div class="card border-dark pede bg-bordere p-3 border-0 shadow">
              <div class="card-body">
                  <h3 class="text-center">Login Siswa</h3>
                  <hr>
                  <form class="" method="post">
                      <label for="nisn"><strong>NISN:</strong></label>
                      <input type="text" name="nisn" value="<?php echo set_value('nisn') ?>" placeholder="NISN" class="form-control <?php echo form_error("nisn")?"is-invalid":"" ?>" id="nisn">
                      <div class="invalid-feedback">
                          <?php echo form_error("nisn") ?>
                      </div>
                      <label for="token" class="mt-3"> <strong>Tanggal Lahir:</strong> </label>
                      <input type="text" name="tgl_lahir" value="<?php echo set_value('tgl_lahir') ?>" placeholder="HH-BB-TTTT" class="form-control <?php echo form_error("tgl_lahir")?"is-invalid":"" ?>" id="token">
                      <div class="invalid-feedback">
                          <?php echo form_error("tgl_lahir") ?>
                      </div>
                      <input type="submit" name="submit" value="Login" class="col-md-12 btn btn-primary mt-3">
                  </form>
                  <?php if ($this->session->flashdata("gagal_login")): ?>
                      <?php echo $this->session->flashdata("gagal_login") ?>
                  <?php endif; ?>
              </div>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/636e70ca39.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
