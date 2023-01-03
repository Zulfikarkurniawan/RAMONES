<?php
$date=date("d-m-Y");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="engineering e-logbook 2022">
    <meta name="author" content="adiemas setya bhakti">
    <link rel="shortcut icon" href="img/kosek.png" />

    <title>Notes report<?php echo $date ?></title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- font Awesome -->
		<link href="css/datepicker/datepicker.css" rel="stylesheet"/>
        <link href="css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/> 

</head>

<body id="page-top">

<div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php
                include "db_notes.php";
                koneksi_buka();
                $id = $_GET['id'];
                $qry_logbook=mysql_query("select * from notes where id='$id'");
                $dt_logbook=mysql_fetch_array($qry_logbook);
                $nama_radar=$dt_logbook[1];
                $tgl_r=$dt_logbook[2];
                $jam_r=$dt_logbook[3];
                $tgl_n=$dt_logbook[4];
                $jam_n=$dt_logbook[5];
                $durasi=$dt_logbook[6];
                $cat=$dt_logbook[7];
                $status=$dt_logbook[8];
                $teknisi=$dt_logbook[9];

                ?>
                    <br>

                    <!-- Page Heading -->
                    
                    <div class="row">	
                        <div class="col-lg-12">

                                    <center>
                                        <table border="0" style="width: 100%">
                                            <tr>
                                                <td align="center" width="20%"><?php echo "<img src='img/airnav3.png' width='100' height='100'/>";?></td>
                                                <td align="center" width="60%"></td>
                                                <td></td>
                                            </tr>
                                             <tr>
                                                <td align="center" width="20%">AIRNAV INDONESIA</td>
                                                <td align="center" width="60%"></td>
                                                <td></td>
                                            </tr>
                                             <tr>
                                                <td align="center" width="20%"></td>
                                                <td align="center" width="60%"><h4><b>NOTA DINAS MAINTENANCE<b></h4></td>
                                                <td></td>
                                            </tr>
                                            
                                        </table>
                                        <hr>
                                        <table border="0" style="width: 100%">
                                            <tr>
                                                <td>Kepada</td>
                                                <td align="center">:</td>
                                                <td><b>Komandan Kosekhanudnas II TNI AU</b></td>
                                                <td>Dari</td>
                                                <td align="center">:</td>
                                                <td><b><?php echo $dt_logbook[9]?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Cc</td>
                                                <td align="center">:</td>
                                                <td><b>General Manager Airnav Indonesia Cabang MATSC<b></td>
                                                <td>Jabatan</td>
                                                <td align="center">:</td>
                                                <td><b>Supervisor On Duty<b></td>
                                            </tr>
                                            
                                        </table><br>

                                    </center>
                                    <hr>
                                    <br>

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-info">Nota Dinas Maintenance</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered" style="width:100%">
                                            <tr>
                                                <td width="30%"><b>Nama Radar<b></td>
                                                <td><?php echo $dt_logbook[1]?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Waktu Mulai Kegiatan<b></td>
                                                <td><?php echo $dt_logbook[2]?> , <?php echo $dt_logbook[3]?> UTC</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Waktu Akhir Kegiatan<b></td>
                                                <td><?php echo $dt_logbook[4]?> , <?php echo $dt_logbook[5]?> UTC</td>
                                               
                                            </tr>
                                            <tr>
                                                <td><b>Status Radar<b></td>
                                                <td><?php echo $dt_logbook[8]?></td>
                                               
                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>Deskripsi Informasi Kerusakan<b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><textarea  style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" readonly><?php echo $dt_logbook[7]?></textarea></td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                   
                                </div>

                                <p>Kontak Dinas Teknik Otomasi : phone (ext.3009) / email : otomasiairnavmatsc.gmail.com</p>

                                <div class="row">
                                    <div class="card-body">
                                        <table border=0 width="100%">
                                            <tr>
                                                <th width="30%"></th>
                                                <th width="30%"></th>
                                                <th width="30%"><center>Mengetahui</center></th>
                                            
                                            </tr>
                                            <tr>
                                                <th width="30%"></th>
                                                <th width="30%"></th>
                                                <th width="30%"><center>Supervisor On Duty</center></th>
                                                
                                            </tr>
                                            <tr>
                                                <th width="30%"><br><br><br><br></th>
                                                <th width="30%"><br><br><br><br></th>
                                                <th width="30%"><br><br><br><br></th>
                                            
                                            </tr>
                                            <tr>
                                                <th width="30%"></th>
                                                <th width="30%"></th>
                                                <th width="30%">
                                                    <center><?php echo $dt_logbook[9] ?></center>
                                                </th>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


        <!-- CKEDITOR -->
        <script src="editor/ckeditor_basic/ckeditor.js"></script>
        <script src="editor/ckeditor_basic/styles.js"></script>

        <script type="text/javascript">
            CKEDITOR.replace('ckeditor1');
        </script>

        <script type="text/javascript">
            CKEDITOR.replace('ckeditor2');
        </script>

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

                        var selisih= (hasil*24) + (selisih_jam);
                        if (jam_akhir.length>7 && jam_awal.length>7 && tgl_awal.length>9 && tgl_akhir.length>9){
                            if (hasil<0){
                                myForm.selisih.value = "-";
                            }else{
                                if (selisih_menit<0 && selisih==0){
                                    myForm.selisih.value = "-";
                                }else if(selisih_menit<0 && selisih>0){
                                    myForm.selisih.value = (selisih-1) + ' Jam ' + (selisih_menit+60) + ' Menit';
                                }else{
                                    myForm.selisih.value = selisih + ' Jam ' + selisih_menit + ' Menit';
                                }
                            }
                        }else{
                            myForm.total.value = "";
                        }
                    }
                </script>


                    
                    <script>
                        window.print();
                    </script>
         
</body>

</html>