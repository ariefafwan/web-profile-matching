<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>APLIKASI METODE PROFILE MATCHING</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet"
		href="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet"
		href="https://gapv3.landmarkcode.com/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://gapv3.landmarkcode.com/assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- daterange picker -->
	<link rel="stylesheet"
		href="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet"
		href="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="https://gapv3.landmarkcode.com/assets/plugins/iCheck/all.css">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet"
		href="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="https://gapv3.landmarkcode.com/assets/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- Select2 -->
	<link rel="stylesheet"
		href="https://gapv3.landmarkcode.com/assets/bower_components/select2/dist/css/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="https://gapv3.landmarkcode.com/assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="https://gapv3.landmarkcode.com/assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="https://gapv3.landmarkcode.com/assets/table/css/dataTables.bootstrap.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

	<!-- Google Font -->
	<style type="text/css">
		body {}

		.bg {
			background-color: #4682B4;
		}
	</style>
	<script type="text/javascript">
		function getkey(e)
 {
  if (window.event)
   return window.event.keyCode;
 else if (e)
   return e.which;
 else
   return null;
}
function goodchars(e, goods, field)
{
  var key, keychar;
  key = getkey(e);
  if (key == null) return true;

  keychar = String.fromCharCode(key);
  keychar = keychar.toLowerCase();
  goods = goods.toLowerCase();

  if (goods.indexOf(keychar) != -1)
    return true; 
  if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;

 if (key == 13) {
  var i;
  for (i = 0; i < field.form.elements.length; i++)
    if (field == field.form.elements[i])
      break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
  }; 
  return false;
}
	</script>
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition fixed skin-blue sidebar-mini ">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="https://gapv3.landmarkcode.com/index.php/cpanel" class="logo ">
				<span class="logo-lg ">
      PT. MAJU MUNDUR 21      <!-- <img alt="Logo-saya" src="https://gapv3.landmarkcode.com/assets/images/logo.png" height="50" width="200" /> -->
    </b>   
  </span>
			</a>
			<nav class="navbar navbar-static-top ">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-user"></i>
								<span class="hidden-xs"> <small></small></span>

							</a>

							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="https://gapv3.landmarkcode.com/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

									<p> <small>Administrator</small>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-right">
										<a href="https://gapv3.landmarkcode.com/index.php/user/ubah_password"
											class="btn btn-default btn-flat">Pengaturan Akun</a>
									</div>

								</li>
							</ul>
						</li>
						<li>


							<a data-toggle="modal" href='#modal-idLogout'><i class="fa fa-sign-out"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>


		<div class="modal fade" id="modal-idLogout">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Apakah Anda Yakin Untuk Logout ?</h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
						<a class="btn btn-primary" href="https://gapv3.landmarkcode.com/index.php/login/logout"
							role="button">Ya</a>
					</div>
				</div>
			</div>
		</div>
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li><a href="https://gapv3.landmarkcode.com/index.php/cpanel"><i class="fa fa-home"></i>
							<span>DASHBOARD</span></a></li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-gear"></i> <span>PENGATURAN</span>
							<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
						</a>
						<ul class="treeview-menu">
							<li><a href="https://gapv3.landmarkcode.com/index.php/pengaturan/aplikasi"><i class="fa fa-circle-o"></i>
									PENGATURAN APLIKASI</a></li>
							<li><a href="https://gapv3.landmarkcode.com/index.php/user/ubah_password"><i class="fa fa-circle-o"></i>
									PENGATURAN AKUN</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-edit"></i> <span>MASTER DATA</span>
							<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
						</a>
						<ul class="treeview-menu">
							<li><a href="https://gapv3.landmarkcode.com/index.php/alternatif"><i class="fa fa-circle-o"></i>
									DATA ALTERNATIF</a></li>
							<li><a href="https://gapv3.landmarkcode.com/index.php/kriteria"><i class="fa fa-circle-o"></i>
									DATA ASPEK KRITERIA</a></li>
							<li><a href="https://gapv3.landmarkcode.com/index.php/subkriteria"><i class="fa fa-circle-o"></i>
									DATA SUB KRITERIA</a></li>
							<li><a href="https://gapv3.landmarkcode.com/index.php/bobot"><i class="fa fa-circle-o"></i>
									DATA BOBOT</a></li>
							<li><a href="https://gapv3.landmarkcode.com/index.php/selisih"><i class="fa fa-circle-o"></i>
									DATA SELISIH</a></li>
						</ul>
					</li>
					<li><a href="https://gapv3.landmarkcode.com/index.php/penilaian"
							class="active"><i class="fa fa-calculator"></i> <span>PENILAIAN</span></a></li>
					<li><a href="https://gapv3.landmarkcode.com/index.php/hasil"
							class="active"><i class="fa fa-sticky-note"></i> <span>HASIL PERHITUNGAN</span></a></li>
				</ul>
			</section>
		</aside>
		<div class="content-wrapper">
			<section class="content">
				<form action="https://gapv3.landmarkcode.com/index.php/penilaian/do_save" method="POST" role="form">
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">FORM INPUT PENILAIAN</h3>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-default">
												<table class="table table-bordered table-hover">
													<tbody>
														<tr>
															<td colspan="3" class="bg-success">
																BIODATA
																<a class="btn btn-primary btn-xs pull-right"
																	data-toggle="modal"
																	href='#modal-alternatif'><i class="fa fa-search"></i>
																	Cari Data</a>
															</td>
														</tr>
														<tr>
															<input type="hidden" name="id_alternatif" id="id_alternatif" class="form-control" required>
															<td width="30%">Nama</td>
															<td width="1%">:</td>
															<td><span id="nama"></span></td>
														</tr>
														<tr>
															<td>Keterangan</td>
															<td width="1%">:</td>
															<td><span id="ket"></span></td>
														</tr>
														<tr>
															<td>No Hp</td>
															<td width="1%">:</td>
															<td><span id="no_hp"></span></td>
														</tr>
														<tr>
															<td>Alamat</td>
															<td width="1%">:</td>
															<td><span id="alamat"></span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-md-6">


											<div class="panel panel-success">
												<div class="panel-heading">
													<h3 class="panel-title">Kriteria : Intelektual</h3>
												</div>
												<div class="panel-body">

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="1">
													<input type="hidden" name="id_sub[]"  class="form-control" value="1">
													<div class="form-group">
														<label for="input-id">Orientasi Pelayanan</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='1'>Sangat Baik</option><option value='2'>Baik dalam pelayanan</option><option value='3'>Cukup dalam pelayanan</option><option value='4'>Kurang dalam pelayanan</option><option value='5'>Buruk baik dalam pelayanan</option>  
                        
                      </select>
													</div>

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="1">
													<input type="hidden" name="id_sub[]"  class="form-control" value="2">
													<div class="form-group">
														<label for="input-id">Kerjasama</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='6'>Sangat baik dalam bekerjasama dalam tim</option><option value='7'>Baik dalam bekerjasama dalam tim</option><option value='8'>Cukup dalam bekerjasama dalam tim</option><option value='9'>Kurang dalam bekerjasama dalam tim</option><option value='10'>Buruk dalam bekerjasama dalam tim</option>  
                        
                      </select>
													</div>

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="1">
													<input type="hidden" name="id_sub[]"  class="form-control" value="3">
													<div class="form-group">
														<label for="input-id">Kerajinan</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='11'>Sangat baik dalam penyelesaian pekerjaan</option><option value='12'>Baik dalam penyelesaian pekerjaan</option><option value='13'>Cukup dalam penyelesaian pekerjaan</option><option value='14'>Kurang dalam penyelesaian pekerjaan</option><option value='15'>Buruk dalam penyelesaian pekerjaan</option>  
                        
                      </select>
													</div>
												</div>
											</div>


											<div class="panel panel-success">
												<div class="panel-heading">
													<h3 class="panel-title">Kriteria : Sikap</h3>
												</div>
												<div class="panel-body">

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="2">
													<input type="hidden" name="id_sub[]"  class="form-control" value="4">
													<div class="form-group">
														<label for="input-id">Target penjualan offline</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='16'>91% - 100% target penjualan tercapai</option><option value='17'>81% - 90% target penjualan tercapai</option><option value='18'>71% - 80% target penjualan tercapai</option><option value='19'>61% - 70% target penjualan tercapai</option><option value='20'>< 60% target penjualan tercapai</option>  
                        
                      </select>
													</div>

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="2">
													<input type="hidden" name="id_sub[]"  class="form-control" value="5">
													<div class="form-group">
														<label for="input-id">Target penjualan COD</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='21'>> 40 pcs terjual dengan cara COD</option><option value='22'>31 - 40 pcs terjual dengan cara COD</option><option value='23'>21 - 30 pcs terjual dengan cara COD</option><option value='24'>11 - 20 pcs terjual dengan cara COD</option><option value='25'>< 11 pcs terjual dengan cara COD</option>  
                        
                      </select>
													</div>

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="2">
													<input type="hidden" name="id_sub[]"  class="form-control" value="6">
													<div class="form-group">
														<label for="input-id">Target penjualan kirim paket</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='26'>> 20 pcs terjual dengan cara kirim paket</option><option value='27'>15 - 20 pcs terjual dengan cara kirim paket</option><option value='28'>10 - 14 pcs terjual dengan cara kirim paket</option><option value='29'>5 - 9 pcs terjual dengan cara kirim paket</option><option value='30'>< 5 pcs terjual dengan cara kirim paket</option>  
                        
                      </select>
													</div>
												</div>
											</div>


											<div class="panel panel-success">
												<div class="panel-heading">
													<h3 class="panel-title">Kriteria : Perilaku</h3>
												</div>
												<div class="panel-body">

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="3">
													<input type="hidden" name="id_sub[]"  class="form-control" value="7">
													<div class="form-group">
														<label for="input-id">Penampilan</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='31'>Sangat baik dalam kerapian dan penampilan</option><option value='32'>Baik dalam kerapian dan penampilan</option><option value='33'>Cukup dalam kerapian dan penampilan</option><option value='34'>Kurang dalam kerapian dan penampilan</option><option value='35'>Buruk dalam kerapian dan penampilan</option>  
                        
                      </select>
													</div>

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="3">
													<input type="hidden" name="id_sub[]"  class="form-control" value="8">
													<div class="form-group">
														<label for="input-id">Kedisiplinan</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='36'>0 menit keterlambatan dalam sebulan</option><option value='37'>1-10 menit keterlambatan dalam sebulan</option><option value='38'>10-20 menit keterlambatan dalam sebulan</option><option value='39'>20-30 menit keterlambatan dalam sebulan</option><option value='40'>> 30 menit keterlambatan dalam sebulan</option>  
                        
                      </select>
													</div>

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="3">
													<input type="hidden" name="id_sub[]"  class="form-control" value="9">
													<div class="form-group">
														<label for="input-id">Kehadiran</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='41'>0 kali ketidakhadiran dalam sebulan</option><option value='42'>1 kali ketidakhadiran dalam sebulan</option><option value='43'>2 kali ketidakhadiran dalam sebulan</option><option value='44'>3 kali ketidakhadiran dalam sebulan</option><option value='45'>> 3 kali ketidakhadiran dalam sebulan</option>  
                        
                      </select>
													</div>

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="3">
													<input type="hidden" name="id_sub[]"  class="form-control" value="11">
													<div class="form-group">
														<label for="input-id">Kehangatan</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                        <option value='46'>hangat</option>  
                        
                      </select>
													</div>
												</div>
											</div>


											<div class="panel panel-success">
												<div class="panel-heading">
													<h3 class="panel-title">Kriteria : Cakap</h3>
												</div>
												<div class="panel-body">

													<input type="hidden" name="id_kriteria[]"  class="form-control" value="9">
													<input type="hidden" name="id_sub[]"  class="form-control" value="13">
													<div class="form-group">
														<label for="input-id">Bahasa  Inggris</label>
														<select name="id_bobot[]"  class="form-control" required="required">
                        <option value="" selected>-- Pilih --</option>

                          
                        
                      </select>
													</div>
												</div>
											</div>
											<div class="pull-right">
												<a class="btn btn-md btn-warning" onclick="window.history.back();"
													role="button"><i class="fa fa-arrow-circle-left"></i> Kembali </a>
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
												<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Batal</button>
											</div>

										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="modal fade" id="modal-alternatif">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" style="color: white; text-align: center;">PILIH ALTERNATIF</h4>
							</div>
							<div class="modal-body">


								<div class="table-responsive">
									<table id='example1' class='table table-bordered table-striped'>
										<thead>
											<tr>
												<th>NO</th>
												<th>NAMA</th>
												<th>KETERANGAN</th>
												<th>NO. HP</th>
												<th>ALAMAT</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>

											<tr>
												<td align="center" width="3%">1</td>
												<td>Ngasep</td>
												<td>-</td>
												<td>0</td>
												<td>-</td>
												<td align="center" width="10%">
													<a href="#" class=" btn-xs btn btn-info" title="Pilih Data"
														onclick="getAmbilData('7')">Pilih</a>
												</td>
											</tr>


											<tr>
												<td align="center" width="3%">2</td>
												<td>Sican Mican</td>
												<td>Dogy</td>
												<td>2456785</td>
												<td>Jln.Meang</td>
												<td align="center" width="10%">
													<a href="#" class=" btn-xs btn btn-info" title="Pilih Data"
														onclick="getAmbilData('8')">Pilih</a>
												</td>
											</tr>



										</tbody>
										</tbody>
									</table>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>

					<script type="text/javascript">
						function getAmbilData(id) {
        $.ajax({
          type: 'GET',
          url: 'https://gapv3.landmarkcode.com/index.php/penilaian/getalternatif',
          dataType: 'json',
          data: {id_alternatif:id},
          success:function(data){
            $('#id_alternatif').val(data.id_alternatif);
            $('#kode_alternatif').html(data.id_alternatif);  
            $('#nama').html(data.nama);
            $('#ket').html(data.ket); 
            $('#no_hp').html(data.no_hp);
            $('#alamat').html(data.alamat);
            $('#modal-alternatif').modal("hide"); 
          }
        });

      }
					</script>
			</section>
		</div>
		<footer class="main-footer hidden-print">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0.0
			</div>
			<strong>Copyright &copy; 2020</strong> All rights
			reserved.
		</footer>

		<script src="https://gapv3.landmarkcode.com/assets/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap/dist/js/bootstrap.min.js">
		</script>
		<!-- Select2 -->
		<script src="https://gapv3.landmarkcode.com/assets/bower_components/select2/dist/js/select2.full.min.js">
		</script>
		<!-- InputMask -->
		<script src="https://gapv3.landmarkcode.com/assets/plugins/input-mask/jquery.inputmask.js"></script>
		<script src="https://gapv3.landmarkcode.com/assets/plugins/input-mask/jquery.inputmask.date.extensions.js">
		</script>
		<script src="https://gapv3.landmarkcode.com/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- date-range-picker -->
		<script src="https://gapv3.landmarkcode.com/assets/bower_components/moment/min/moment.min.js"></script>
		<script
			src="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js">
		</script>
		<!-- bootstrap datepicker -->
		<script
			src="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
		</script>
		<!-- bootstrap color picker -->
		<script
			src="https://gapv3.landmarkcode.com/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js">
		</script>
		<!-- bootstrap time picker -->
		<script src="https://gapv3.landmarkcode.com/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
		<!-- SlimScroll -->
		<script src="https://gapv3.landmarkcode.com/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js">
		</script>
		<!-- iCheck 1.0.1 -->
		<script src="https://gapv3.landmarkcode.com/assets/plugins/iCheck/icheck.min.js"></script>
		<!-- FastClick -->
		<script src="https://gapv3.landmarkcode.com/assets/bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="https://gapv3.landmarkcode.com/assets/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="https://gapv3.landmarkcode.com/assets/dist/js/demo.js"></script>

		<script src="https://gapv3.landmarkcode.com/assets/sweetalert/sweetalert2.all.min.js"></script>
		<script src="https://gapv3.landmarkcode.com/assets/sweetalert/myscript.js"></script>
		<script src="https://gapv3.landmarkcode.com/assets/table/js/jquery.dataTables.min.js"></script>
		<script src="https://gapv3.landmarkcode.com/assets/table/js/dataTables.bootstrap.js"></script>
		<script type="text/javascript">
			$(function () { 
        $('.select2').select2()
      });
      
      $(function() {
        $('#example1').dataTable();
      });
		</script>

</body>

</html>