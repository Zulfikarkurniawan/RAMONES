<?php
session_start();
date_default_timezone_set("UTC");
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:index.php?pesan=belum_login");
}

include "koneksi.report.php";
if(isset($_POST["proses"])){
    $radar = $_POST["radar"];
    $bul = $_POST["bul"];
    $tahun = $_POST["tahun"];
   
    
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
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    

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

                    <div style="width: 800px;margin: 0px auto;">
                            <canvas id="myChart"></canvas>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <form  action="aksi.cetak.php" method="post">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-info">Report Radar : <?php echo $radar?> - <?php echo $bul?> / <?php echo $tahun?></h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                <th>No</th>
                                                <th>Nama Radar</th>
                                                <th>Tanggal Kerusakan</th>
                                                <th>Penyebab</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                $data = mysqli_query($koneksi,"select * from notes where nama_radar='$radar' and bul='$bul' ");
                                                while($d=mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $d['nama_radar']; ?></td>
                                                        <td><?php echo $d['tgl_r']; ?></td>
                                                        <td><?php echo $d['penyebab']; ?></td>
                                                    </tr>
                                                    <?php 
                                                }
                                                ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                    <div class="box-footer">
                                    <a href="page.report.php" class="btn btn-danger btn-flat" style="float:left;"><i class="fa fa-arrow-left"></i> &nbsp;Kembali &nbsp;</a> &nbsp;
                                    
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
                    <a class="btn btn-info" href="logout.php">Logout</a>
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
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Technical", "Electrical", "Link Problem"],
                    datasets: [{
                        label: 'PROBLEM RADAR <?php echo $radar ?> ',
                            data: [
                                <?php 
                                $jumlah_technical = mysqli_query($koneksi,"select * from notes where penyebab='Maintenance Due To Technical' and nama_radar='$radar' ");
                                echo mysqli_num_rows($jumlah_technical);
                                ?>, 
                                <?php 
                                $jumlah_electrical = mysqli_query($koneksi,"select * from notes where penyebab='Maintenance Due To Electrical' and nama_radar='$radar'");
                                echo mysqli_num_rows($jumlah_electrical);
                                ?>, 
                                <?php 
                                $jumlah_link = mysqli_query($koneksi,"select * from notes where penyebab='Maintenance Due To Link (No Data)' and nama_radar='$radar'");
                                echo mysqli_num_rows($jumlah_link);
                                ?>
                                ],
                                backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)'
                                ],
                                borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                                ],
                                borderWidth: 1
                            }]
                    },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
        </script>   


</body>

</html>