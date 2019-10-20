<!DOCTYPE html>
<html>
<head>
	<title>Lembar Pengesahan Sertifikat - {{$sertifikat->kd_sertifikat}}</title>
	<style type="text/css">
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}
			/* @page { size: with x height */
			/*@page { size: 20cm 9.5cm; margin: 0px; }*/
			@page {
				size: A4;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			/*body { border: 2px solid #000000;  }*/
	</style>
	<script type="text/javascript">
		var beforePrint = function() {
		};
		var afterPrint = function() {
			document.location.href = '/admin/dataMember/sertifikat';
		};
		if (window.matchMedia) {
			var mediaQueryList = window.matchMedia('print');
			mediaQueryList.addListener(function(mql) {
				if (mql.matches) {
					beforePrint();
				} else {
					afterPrint();
				}
			});
		}
		window.onbeforeprint = beforePrint;
		window.onafterprint = afterPrint;
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">   
                            <div class="card-header">
                            	<div class="lead">
                                    <center>
                            		    <img src="/images/logo_blk.png" width="50px" />
                            		    BALAI LATIHAN KERJA KABUPATEN INDRAMAYU
                                    </center>
                            	</div>
                            </div>
                            <div class="card-body">
                                <center>Lembar Pengesahan Sertikat</center>
                                <br>
                            	<center>
                                    <table cellpading="5">
                                        <tr>
                                            <td><h5>Kode Sertifikat</h5></td>
                                            <td>: {{$sertifikat->kd_sertifikat}}</td>
                                        </tr>
                                        <tr>
                                            <td><h5>Nama</h5></td>
                                            <td>: {{App\Member::where('kd_pengguna', $sertifikat->kd_pengguna)->value('nama_lengkap')}}</td>
                                        </tr>
                                        <tr>
                                            <td><h5>Program Pelatihan</h5></td>
                                            <td>: {{App\ProgramPelatihan::where('kd_program', $sertifikat->kd_program)->value('nama_program')}}</td>
                                        </tr>
                                        <tr>
                                            <td><h5>Tanggal Pengesahan</h5></td>
                                            <td>: {{$sertifikat->tgl_terbit}}</td>
                                        </tr>
                                        <tr>
                                            <td><h5>Tanggal Kedaluarsa</h5></td>
                                            <td>: {{$sertifikat->tgl_kadaluarsa}}</td>
                                        </tr>
                                    </table>
                                </center>
                            </div>
                        </div>
                    </div>

			    <div class="col-md-12">
                    <center>
			        <table cellpadding="10">
                            <td>
			        			<br>
						        <br>
						        <br>
						        <br>
						        <br>
			        			
			        	    </td>
			        		<td>
			        			<br>
						        <br>
						        <br>
						        <br>
						        <br>
			        			<table cellpadding="4">
					        	<tr>
									<td>&nbsp;</td>
									<td><div class="value">Balai Latihan Kerja</div>
									<br>
									<br>
									<br>
									</td>
								</tr>
					        	<tr>
									<td>&nbsp;</td>
									<td>____________________________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><div class="value"></div>
									<br>
									<br>
									<br>
									</td>
								</tr>
							</table>
			        	</td>
			        </table>
			    </div>
                </center>
            </div>
        </div>
	<hr>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			window.print();
		});
	</script>
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>