<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('judul_tab')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<body> 
<!-- /#left-panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="@yield('active_menu_dashboard')">
                        <a href="/admin/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                    <li class="menu-title">Data Member</li><!-- /.menu-title -->
                    <li class="@yield('active_menu_kelola_akun')">
                        <a href="/admin/dataMember/akunMember"><i class="menu-icon fa fa-male"></i>Akun Member</a>
                    </li>
                    <li class="@yield('active_menu_kelola_sertifikat')">
                        <a href="/admin/dataMember/sertifikat"><i class="menu-icon fa fa-certificate"></i>Sertifikat</a>
                    </li>

                    <li class="menu-title">Data Konten Web</li><!-- /.menu-title -->
                
                    <li class="@yield('active_menu_kelola_konten')">
                        <a href="/admin/dataKonten/konten"><i class="menu-icon fa fa-rocket"></i>Konten</a>
                    </li>
                    <li class="@yield('active_menu_kelola_kategori_konten')">
                        <a href="/admin/dataKonten/kategoriKonten"><i class="menu-icon fa fa-bars"></i>Kategori Konten</a>
                    </li>
                    <li class="@yield('active_menu_kelola_galeri')"> 
                        <a href="/admin/dataKonten/galeri"><i class="menu-icon fa fa-picture-o"></i>Galeri</a>
                    </li>
                    <li class="@yield('active_menu_kelola_loker')">
                        <a href="/admin/dataKonten/loker"><i class="menu-icon fa fa-file-text"></i>Lowongan Pekerjaan</a>
                    </li>
                    <li class="@yield('active_menu_kelola_profil_dinas')">
                        <a href="/admin/dataKonten/profil"><i class="menu-icon fa fa-book"></i>Profil Dinas</a>
                    </li>
                    <li class= "@yield('active_menu_kelola_link')">
                        <a href="/admin/dataKonten/link"><i class="menu-icon fa fa-link"></i>Link Dinas Terkait</a>
                    </li>

                    <li class="menu-title">Data Pelatihan</li><!-- /.menu-title -->
                    <li class="@yield('active_menu_kelola_program')">
                        <a href="/admin/dataPelatihan/program"><i class="menu-icon fa fa-tasks"></i>Program Pelatihan</a>
                    </li>
                    <li class="@yield('active_menu_kelola_skema')">
                        <a href="/admin/dataPelatihan/skema"><i class="menu-icon fa fa-tasks"></i>Skema Pelatihan</a>
                    </li>
                    <li class="@yield('active_menu_kelola_gelombang')">
                        <a href="/admin/dataPelatihan/gelombang"><i class="menu-icon fa  fa-calendar"></i>Gelombang</a>
                    </li>
                    <li class="@yield('active_menu_pendaftaran_pelatihan')">
                        <a href="/admin/dataPelatihan/pendaftaran"><i class="menu-icon fa fa-file-text"></i>Pendaftaran Pelatihan</a>
                    </li>

                    <li class="menu-title">Tambahan</li><!-- /.menu-title -->
                    <li class="@yield('active_menu_pesan')">
                        <a href="#"><i class="menu-icon fa fa-envelope"></i>Pesan</a>
                    </li>
                    <li class="@yield('active_menu_log_sistem')">
                        <a href="#"><i class="menu-icon fa fa-book"></i>Log Sistem</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">

            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="/images/logo_admin.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="/images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/boss.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/admin/gantiPassword"><i class="fa fa-power -off"></i>Ganti Password</a>
                            <a class="nav-link" href="/admin/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /#header -->

        <!-- Content -->
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

        @yield('content')
        <!-- /.content -->

        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2019 Dinas Ketenagakerjaan Kabupaten Indramayu 
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>

    <!-- /#right-panel -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="/assets/js/init/datatables-init.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="/assets/js/init/fullcalendar-init.js"></script> 
</body>
</html>
