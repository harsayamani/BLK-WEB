<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_bar')</title>
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
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>

  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="#" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><img src="/images/logo_blk.png" width="30px" height="30px"> <span>SI</span><strong>BLK</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications-->
                <li class="nav-item"><a href="/gantiPassword/{{Session::get('kd_pengguna')}}" class="nav-link logout"><span class="d-none d-sm-inline">Ganti Password</span><i class="fa fa-exchange"></i></a></li>

                <!-- Logout    -->
                <li class="nav-item"><a href="/logout" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <h5>Halo, @yield('member_name')</h5>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
            <ul class="list-unstyled">
              <li class="@yield('active1')"><a href="/member/dashboard"> <i class="icon-home"></i>Dashboard</a></li>
              <li class="@yield('active2')"><a href="#"> <i class="fa fa-calendar"></i>Jadwal Pelatihan </a></li>
              <li class="@yield('active3')"><a href="#"> <i class="icon-padnote"></i>Pendaftaran</a></li>
              <li class="@yield('active4')"><a href="/member/akun"> <i class="fa fa-user"></i>Akun</a></li>
              <li class="@yield('active5')"><a href="/member/sertifikat"> <i class="fa fa-certificate"></i>Sertifikat</a></li>
            </ul>
        </nav>

        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">@yield('title_page')</h2>
            </div>
          </header>

          @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          @if (session()->has('alert success'))
              <div class="alert alert-success" role="alert">
                  {{session()->get('alert success')}}
              </div>
          @endif

          @if (session()->has('alert danger'))
              <div class="alert alert-danger" role="alert">
                  {{session()->get('alert danger')}}
              </div>
          @endif

          @if (session()->has('alert warning'))
              <div class="alert alert-warning" role="alert">
                  {{session()->get('alert warning')}}
              </div>
          @endif

          @yield('section')

          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>&copy; Dinas Ketenagakerjaan Kabupaten Indramayu <?php echo date("Y"); ?></p>
                </div>
                <div class="col-sm-6 text-right">
                </div>
              </div>
            </div>
          </footer>
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
    <script src="/member/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="/member/js/front.js"></script>

  </body>
</html>
