<?php
include 'db.php';
session_start();
//if (isset($_SESSION['user'])) exit(header("Location: index.php"));

if (isset($_POST['username'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $login=mysqli_query($conn,"SELECT * FROM `user` WHERE `username`='$user' AND `password`='$pass'");
  $cek = mysqli_num_rows($login);
  if ($cek > 0)  {
    $data = mysqli_fetch_assoc($login);
   
    if($data['level']=="Admin"){
 
      // buat session login dan username
      $_SESSION['username'] = $user;
      $_SESSION['level'] = "Admin";
      // alihkan ke halaman dashboard admin
      header("location:admin.php?pesan=sukses");
   
    // cek jika user login sebagai Managerial
    }else if($data['level']=="Managerial"){
      // buat session login dan username
      $_SESSION['username'] = $user;
      $_SESSION['level'] = "Managerial";
      // alihkan ke halaman Managerial
      header("location:managerial/managerial.php?pesan=sukses");
    
    // cek jika user login sebagai Teknisi
    }else if($data['level']=="Technician"){
      // buat session login dan username
      $_SESSION['username'] = $user;
      $_SESSION['level'] = "Technician";
      // alihkan ke halaman Teknisi
      header("location:technician/technician.php?pesan=sukses");

    // cek jika user login sebagai User
    }else if($data['level']=="User"){
      // buat session login dan username
      $_SESSION['username'] = $user;
      $_SESSION['level'] = "User";
      // alihkan ke halaman user
      header("location:user/user.php?pesan=sukses");
    }else{

      // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
    }	
  
  }else{
    header("location:index.php?pesan=gagal");
   
}
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
  <link rel="shortcut icon" href="img/airnav3.png" />

  <title>R A M O N E S</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script>alert('Password atau Username Salah, Periksa Kembali !');window.location='index.php';</script>";
		} else if($_GET['pesan']=="belum_login"){
			echo "<script>alert('Harap Login Terlebih Dahulu !');window.location='index.php';</script>";
		}
	}
	?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-10 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">

          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                 <table  border=0 width="100%">
                   <tr>
                     <td>
                      <center><img src="img/airnav3.png" style="width: 128px; margin-top: 1rem;"></center>
                    </td>
                    <td rowspan="2">
                      <center>
                        <br>
                        <h2 class="text-gray-900 mb-4"><b>MATSC ENGINEERING CORPS</b></h2>
                      </center>
                    </td>
                   
                  </tr>
                  <tr>
                     <td>
                      <center><b>AIRNAV INDONESIA</b></center>
                    </td>
                  </tr>
                </table>
              <div class="p-5">
                  
                  
                  <div class="text-center">
                    <h2 class="text-gray-900 mb-4">RAMONES</h2>
                    <h1 class="text-gray-900 mb-4"><b>Radar Monitoring Online Status</b></h1>
                    <h4 class="text-gray-900 mb-4">Please Login</h4>
                  </div>
                  <form class="user" action="index.php" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
              
                    <button type="submit" class="btn btn-dark btn-user btn-block">Login</button>
                    
                </div>
              </div>
            </div>
          </div>
          <center><p><span>Copyright &copy; Matsc Engineering Corps 2022</span></p></center>
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

</body>

</html>
