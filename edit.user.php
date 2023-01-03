<?php
session_start();
date_default_timezone_set("UTC");
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:index.php?pesan=belum_login");
}
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
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

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
                <a class="nav-link" href="admin.php">
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
           <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Setting
          </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="add_user.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Add User</span></a>
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

                <?php
                include "koneksi.php";
                koneksi_buka();
                $id = $_GET['id'];
                $qry_logbook=mysql_query("select * from user where id='$id'");
                $dt_logbook=mysql_fetch_array($qry_logbook);
                $username=$dt_logbook[1];
                $password=$dt_logbook[2];
                $level=$dt_logbook[3];
                ?>

                    <!-- Page Heading -->
                    <form action="perbarui.user.php" name="form1" method="post" enctype="multipart/form-data" onmousemove="move(event)">
                        <div class="row">

                            <div class="col-lg-12">

                                <!-- Data Alat -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-info">Edit and View Data User</h6>
                                    </div>
                                    <div class="card-body">
                                       
                                            
                                                <div class="form-group">
                                                    <label>ID User</label>	
                                                    <input type="text" class="form-control" name="id" value="<?php echo $id?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>	
                                                    <input type="text" class="form-control" name="username" value="<?php echo $username?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>	
                                                    <input type="password" class="form-control" name="password" value="<?php echo $password?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>	
                                                    <select class="form-control" name="level" required>
                                                        <option disabled selected> Pilih Status</option>
                                                        <option value="Admin" <?php if($level=="Admin"){echo "selected";} ?>>Admin</option>
                                                        <option value="Managerial" <?php if($level=="Managerial"){echo "selected";} ?>>Managerial</option>
                                                        <option value="Technician" <?php if($level=="Technician"){echo "selected";} ?>>Technician</option>
                                                        <option value="User" <?php if($level=="User"){echo "selected";} ?>>User</option>
                                                    </select>
                                                </div>                                       
                                    
                                </div>

                               
                                
                                <div class='box box-info'>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <a href="add_user.php" class="btn btn-danger btn-flat" name="submit"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a> &nbsp;
                                            <button type="submit" class="btn btn-info btn-flat" name="submit"><i class="fa fa-save"></i> &nbsp;Update</button> &nbsp;
                                           
                                        </div>
                                    </div>
                                </div>           
                            </div>


                        </div>
                    </form>

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
                    <a class="btn btn-info" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

   
        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
       
       
        <!-- bootstrap time picker -->
        <script src="js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
     
		
        <!-- AdminLTE App -->
         
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


<!-- BARU -->
    
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