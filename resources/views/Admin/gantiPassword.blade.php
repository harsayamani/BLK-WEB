<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ganti Password - Admin BLK</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
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
                    <form method="POST" action="/admin/gantiPasswordPost">
                        
                        {{ csrf_field()}}
                        
                        <div class="form-group">
                            <label>User Name</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="User Name" value="{{$username}}" readonly>
                        </div>
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
                        
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>

</body>
</html>
