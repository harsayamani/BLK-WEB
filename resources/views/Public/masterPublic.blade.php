<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
    <link rel="1" href="/public/images/1.png"> 

    <!-- Design fonts -->
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/public/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="/public/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="/public/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="/public/css/colors.css" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="/public/css/version/tech.css" rel="stylesheet">

    {{-- [if lt IE 9]
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    [endif] --}}

</head>
<link rel="shortcut icon" href="/images/manderserlogo.png">
<body>
    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/images/version/logo_public.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/profilLembaga">Profil Lembaga</a>

                            </li>
                            <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pelatihan</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                        <div class="container">
                                            <div class="mega-menu-content clearfix"> 
                                                <div class="tab">
                                                    <button class="tablinks" onclick="#">Alur Pelatihan</button>
                                                    <a href="/programPelatihan"><button class="tablinks" onclick="#">Program Pelatihan</button></a>
                                                    <a href="/jadwalPelatihan"><button class="tablinks" onclick="#">Jadwal Pelatihan</button></a>
                                                    <a href="/login"><button class="tablinks" onclick="#">Pendaftaran Pelatihan</button></a>
                                                </div>
                                             </div><!-- end mega-menu-content -->
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/loker">Info Lowongan Kerja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/galeri">Galeri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/validasiSertifikat">Validasi Sertifikat</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        @yield('content')

        <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="widget">
                                <div class="footer-text text-left">
                                    <a href="index.html"><img src="/images/version/logo_public.png" alt="" class="img-fluid"></a>
                                    <p>
                                        Jl. Jend. Gatot Subroto No. 01 Indramayu 45216
                                        <br>
                                        (0234) 274382
                                        <br>
                                        support@blkindramayu.com
                                    </p>
                                    <div class="social">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    </div>
    
                                    <hr class="invis">
    
                                </div><!-- end footer-text -->
                            </div><!-- end widget -->
                        </div><!-- end col -->    
                    </div>
    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <br>
                            <div class="copyright">&copy; 2019 Dinas Ketenagakerjaan Kabupaten Indramayu</div>                        </div>
                    </div>
                </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="/public/js/jquery.min.js"></script>
    <script src="/public/js/tether.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/custom.js"></script>
    <script>
        $('#myModal').modal('show')
    </script>

</body>
</html>
