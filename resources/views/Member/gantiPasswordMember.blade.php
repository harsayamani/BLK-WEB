<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ganti Password - {{$member->nama_lengkap}} | SIBLK</title>
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

                    <form class="form-validate" method="POST" action="/gantiPassword/proses/{{$member->kd_pengguna}}">
                      {{ csrf_field() }}
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" id="password_lama" name="password_lama" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" id="password_baru" name="password_baru" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Ulang Password Baru</label>
                        <input type="password" id="password_baru_ulang" name="password_baru_ulang" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>
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
  </body>
</html>
