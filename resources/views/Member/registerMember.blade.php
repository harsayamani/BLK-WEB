<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Akun | SIBLK</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/member/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/member/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/member/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/member/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/member/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/member/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>UPTD - BALAI LATIHAN KERJA</h1>
                  </div>
                  <p>Dinas Tenaga Kerja Kabupaten Indramayu</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  
                  @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif

                  @if(Session::has('alert'))
                      <div class="form-group alert alert-danger">
                          <div>{{Session::get('alert')}}</div>
                      </div>
                  @endif

                  @if(Session::has('alert-success'))
                      <div class="form-group alert alert-success">
                          <div>{{Session::get('alert-success')}}</div>
                      </div>
                  @endif

                  <form class="form-validate" method="POST" action="/daftarAkun/proses">
                      {{ csrf_field() }}
                    <div class="form-group">
                      <input id="nama_lengkap" type="text" name="nama_lengkap" required data-msg="Masukkan nama lengkap" class="input-material">
                      <label for="nama_lengkap" class="label-material">Nama Lengkap</label>
                    </div>
                    <div class="form-group">
                      <input id="nik" type="text" name="nik" required data-msg="Masukkan NIK" class="input-material">
                      <label for="nik" class="label-material">NIK</label>
                    </div>
                    <div class="form-group">
                      <input id="email" type="email" name="email" required data-msg="Masukkan email yang valid" class="input-material">
                      <label for="email" class="label-material">Alamat Email</label>
                    </div>
                    <div class="form-group">
                        <input id="username" type="text" name="username" required data-msg="Masukkan username" class="input-material">
                        <label for="username" class="label-material">User Name</label>
                      </div>
                    <div class="form-group">
                      <input id="password" type="password" name="password" required data-msg="Masukkan password" class="input-material">
                      <label for="password" class="label-material">Password</label>
                    </div>
                    <div class="form-group">
                        <input id="repassword" type="password" name="repassword" required data-msg="Masukkan password ulang" class="input-material">
                        <label for="repassword" class="label-material">Password ulang</label>
                      </div>
                    <div class="form-group terms-conditions">
                      <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Anda telah menyetujui persyaratan yang berlaku" class="checkbox-template">
                      <label for="register-agree">Persetujuan aturan dan kebijakan</label>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                  </form><small>Sudah punya akun? </small><a href="/login" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="/member/vendor/jquery/jquery.min.js"></script>
    <script src="/member/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/member/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/member/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/member/vendor/chart.js/Chart.min.js"></script>
    <script src="/member/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="/member/js/front.js"></script>

    <script>
      $('#myModal').modal('show')
    </script>
  </body>
</html>
