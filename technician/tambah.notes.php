<?php
session_start();
date_default_timezone_set("UTC");
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:index.php?pesan=belum_login");
}

include "db_notes.php";
koneksi_buka();

?>  
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/kosek.png" />

    <title>Monitoring Status Radar</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">

    <!-- font Awesome -->
		<link href="css/datepicker/datepicker.css" rel="stylesheet"/>
        <link href="css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/> 
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
    <div class="sidebar-brand-icon">
        <img src="img/airnav3.png" style="width: 50px;">
    </div>
    <div class="sidebar-brand-text mx-3">Airnav <sup>Indonesia</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="technician.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Monitor Radar</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Configuration
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="show_radar.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Show Data Radar</span></a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="add_radar.php">
        <i class="fas fa-fw fa-edit"></i>
        <span>Add Radar Site</span></a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="notes_radar.php">
        <i class="fas fa-fw fa-file"></i>
        <span>Notes Radar</span></a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="page.report.php">
        <i class="fas fa-fw fa-chart-bar"></i>
        <span>Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="margin-top: 1rem;">Monitoring Status Operasi Radar Kosekhanudnas II</h1>
                    
                        <div class="modal-footer">
                        <button class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                        <?php
                        $dt_id = mysql_fetch_array(mysql_query("SELECT max(id) as maxKode FROM notes"));
                        $id = $dt_id['maxKode'];
                        $no_id = (int) substr($id, 7, 4);
                        $no_id++;
                        $new_id = date("ymd")."-".sprintf("%04s", $no_id);
                        ?>

                            <form action="simpan.notes.php" method="post" name="form1" enctype="multipart/form-data" onmousemove="move(event)">
                                <div class="row">

                                    <div class="col-lg-12">

                                        <!-- Data Alat -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">New Data Notes</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>ID Notes</label>	
                                                            <input type="text" class="form-control" name="id" value="<?php echo $new_id?>" readonly>
                                                            <input type="hidden" class="form-control" name="tanggal" value="<?php echo date('d')?>" readonly>
                                                            <input type="hidden" class="form-control" name="bul" value="<?php echo date('F')?>" readonly>
                                                            <input type="hidden" class="form-control" name="tahun" value="<?php echo date('Y')?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Ops Radar</label>	
                                                            <input type="text" class="form-control" name="status" value="FAILED" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Nama Radar</label>	
                                                            <select name="nama_radar" class="form-control" required>
                                                                <option disabled selected> Pilih Radar Site </option>
                                                                <?php 
                                                                    $sql=mysql_query("SELECT * FROM data_radar ");
                                                                    while ($data=mysql_fetch_array($sql)) {
                                                                    ?> 
                                                                    <option value="<?=$data['Name']?>"><?=$data['Name']?></option> 
                                                                    <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Teknisi On Duty</label>	
                                                            <input type="text" class="form-control" name="teknisi" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label id="pp1">Tanggal Pelaksanaan Kegiatan</label>									
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="tgl_r" id="dp1" aria-describedby="basic-addon1" required/>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="bootstrap-timepicker">
                                                            <div class="form-group">
                                                                <label id="pp2">Jam Pelaksanaan Kegiatan</label>									
                                                                    <div class="input-group">                                            
                                                                        <input type="text" name="jam_r" class="form-control timepicker" aria-describedby="basic-addon2" required/>
                                                                        <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock"></i></span>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label id="pp2">Tanggal Selesai Kegiatan</label>									
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="tgl_n" id="dp2" aria-describedby="basic-addon3" required/>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="bootstrap-timepicker">
                                                            <div class="form-group">
                                                                <label id="pp2">Jam Selesai Kegiatan</label>									
                                                                    <div class="input-group">                                            
                                                                        <input type="text" name="jam_n" class="form-control timepicker" aria-describedby="basic-addon4" required/>
                                                                        <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon4"><i class="fa fa-clock"></i></span>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Lama Kegiatan</label>	
                                                            <input type="text" class="form-control" name="durasi" placeholder="Klik Untuk Menghitung Selisih Waktu" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Status Radar</label>	
                                                            <select class="form-control" name="penyebab" required>
                                                                <option disabled selected> Pilih Status</option>
                                                                <option value="Maintenance Due To Technical">Maintenance Due To Technical</option>
                                                                <option value="Maintenance Due To Electrical">Maintenance Due To Electrical</option>
                                                                <option value="Maintenance Due To Link (No Data)">Maintenance Due To Link (No Data)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            
                                                </div>
                                                <div class="form-group">
                                                    <label>Rincian Notes Radar</label>	
                                                    <textarea class="textarea" name="cat" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                                
                                            
                                            
                                                
                                            </div>
                                        </div>

                                                                    
                                        <div class='box box-primary'>                                       
                                            <a href="notes_radar.php" class="btn btn-danger btn-flat" name="submit"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a> &nbsp;
                                            <button type="reset" class="btn btn-warning btn-flat" name="reset"><i class="fa fa-eraser"></i> &nbsp;Reset</button> &nbsp;
                                            <button type="submit" class="btn btn-primary btn-flat" name="submit"><i class="fa fa-save"></i> &nbsp;Simpan</button>
                                        </div>           
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Adiemas S. Bhakti - 20202215027</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  

     <!-- Page level plugins -->
     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

     <!-- InputMask -->
     <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
       
       
        <!-- bootstrap time picker -->
        <script src="js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

    <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();
				$('#dp1').datepicker({
					format: 'dd-mm-yyyy'
				});
				$('#dp2').datepicker({
					format: 'dd-mm-yyyy'
				});
				$('#dp3').datepicker({
					format: 'dd-mm-yyyy'
				});
				$('#dp4').datepicker({
					format: 'dd-mm-yyyy'
				});
				$('#dp5').datepicker({
					format: 'dd-mm-yyyy'
				});
                //Timepicker
                $(".timepicker").timepicker({
					minuteStep: 1,
                    showInputs: false,
					showSeconds: true,
					showMeridian: false
                });
            });
			
			function readURL(input) {
			if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			//document.getElementById("img_prev").style.display = "";
			
			reader.onload = function (e) {
			$('#img_prev')
			.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
			}
			}
        </script>

        <!-- Date&Time scripts -->
<script type="text/javascript">
    	    function move(event) {
			var myForm = document.form1;

			//tanggal
			var tgl_awal = myForm.tgl_r.value;
			var tgl_akhir = myForm.tgl_n.value;
			var tgl_awal_pisah = tgl_awal.split('-');
			var tgl_akhir_pisah = tgl_akhir.split('-');

			//jam
			var jam_awal = myForm.jam_r.value;
			var jam_akhir = myForm.jam_n.value;
			var jam_awal_pisah = jam_awal.split(':');
			var jam_akhir_pisah = jam_akhir.split(':');

			var selisih_jam = jam_akhir_pisah[0] - jam_awal_pisah[0];
			var selisih_menit = jam_akhir_pisah[1] - jam_awal_pisah[1];
			var selisih_second = jam_akhir_pisah[2] - jam_awal_pisah[2];

			var objek_tgl=new Date();
			var tgl_awal_leave=objek_tgl.setFullYear(tgl_awal_pisah[2], tgl_awal_pisah[1], tgl_awal_pisah[0]);
			var tgl_akhir_leave=objek_tgl.setFullYear(tgl_akhir_pisah[2], tgl_akhir_pisah[1], tgl_akhir_pisah[0]);
			var hasil=(tgl_akhir_leave-tgl_awal_leave)/(60*60*24*1000);

			var durasi= (hasil*24) + (selisih_jam);
			if (jam_akhir.length>7 && jam_awal.length>7 && tgl_awal.length>9 && tgl_akhir.length>9){
				if (hasil<0){
					myForm.durasi.value = "-";
				}else{
					if (selisih_menit<0 && selisih==0){
						myForm.durasi.value = "-";
					}else if(selisih_menit<0 && durasi>0){
						myForm.durasi.value = (durasi-1) + ' Jam ' + (selisih_menit+60) + ' Menit';
					}else{
						myForm.durasi.value = durasi + ' Jam ' + selisih_menit + ' Menit';
					}
				}
			}else{
				myForm.total.value = "";
			}
		}
    </script>


</body>

</html>