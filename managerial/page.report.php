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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
  <style>
    /* Set the size of the div element that contains the map */
    #map {
      height: 450px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }

    .ol-popup {
      font-family: 'Lucida Grande', Verdana, Geneva, Lucida, Arial, Helvetica, sans-serif !important;
      font-size: 12px;
      position: absolute;
      background-color: white;
      -webkit-filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
      filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
      padding: 15px;
      border-radius: 10px;
      border: 1px solid #cccccc;
      bottom: 12px;
      left: -50px;
      min-width: 100px;
    }

    .ol-popup:after,
    .ol-popup:before {
      top: 100%;
      border: solid transparent;
      content: " ";
      height: 0;
      width: 0;
      position: absolute;
      pointer-events: none;
    }

    .ol-popup:after {
      border-top-color: white;
      border-width: 10px;
      left: 48px;
      margin-left: -10px;
    }

    .ol-popup:before {
      border-top-color: #cccccc;
      border-width: 11px;
      left: 48px;
      margin-left: -11px;
    }

    .ol-popup-closer {
      text-decoration: none;
      position: absolute;
      top: 2px;
      right: 8px;
    }

    .ol-popup-closer:after {
      content: "✖";
      color: #c3c3c3;
    }
  </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

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
                <a class="nav-link" href="managerial.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Monitor Radar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configuration
            </div>

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

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Report Notes Radar FAILED</h6>
                                </div>
                                <div class="card-body">
                                    <form  method="POST" action="report.php">
                                        <table class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <td>Nama Radar</td>
                                                <td><select name="radar" class="form-control" required>
                                                    <option disabled selected> Pilih Radar </option>
                                                    <?php 
                                                        include "koneksi.php";
                                                        koneksi_buka();
                                                        $sql=mysql_query("SELECT * FROM data_radar");
                                                        while ($data=mysql_fetch_array($sql)) {
                                                        ?> 
                                                        <option value="<?=$data['Name']?>"><?=$data['Name']?></option> 
                                                        <?php
                                                        }
                                                    ?>
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td>Bulan</td>
                                                <td><select name="bul" class="form-control" required>
                                                            <option disabled selected> Pilih Bulan</option>
                                                            <option value="January" >January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April" >April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July" >July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October" >October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td>Tahun</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="tahun" class="form-control">
                                                            <option disabled selected>Pilih Tahun</option>
                                                            <?php
                                                            for($i=date('Y'); $i>=date('Y')-10; $i-=1)
                                                            {
                                                            echo "<option value='$i'> $i </option>";
                                                            }
                                                            ?>
                                                        </select>	
                                                    </div>
                                                </td>
                                            </tr>
                                            </thead>		
                                        </table>
                                        <input class="btn btn-primary btn-flat" type="submit" name="proses" value="Proses">
                                    </form>
                                </div>
                            </div>

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
                    <a class="btn btn-danger" href="logout.php">Logout</a>
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

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="OpenLayers.js"></script> -->
  <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
  <script>
    var list_radar = [],
      list_feature = [],
      layer;

    var attribution = new ol.control.Attribution({
      collapsible: false
    });

    var icon_on = new ol.style.Style({
      image: new ol.style.Icon({
        anchor: [0.5, 46],
        size: [128, 128],
        scale: 0.45,
        anchorXUnits: 'fraction',
        anchorYUnits: 'pixels',
        src: 'img/radar_on.png'
      })
    });

    var icon_off = new ol.style.Style({
      image: new ol.style.Icon({
        anchor: [0.5, 46],
        size: [128, 128],
        scale: 0.45,
        anchorXUnits: 'fraction',
        anchorYUnits: 'pixels',
        src: 'img/radar_off.png'
      })
    });

    var icon_loading = new ol.style.Style({
      image: new ol.style.Icon({
        anchor: [0.5, 46],
        size: [128, 128],
        scale: 0.25,
        anchorXUnits: 'fraction',
        anchorYUnits: 'pixels',
        src: 'img/radar_loading.png'
      })
    });

    var map = new ol.Map({
      controls: ol.control.defaults({
        attribution: false
      }).extend([attribution]),
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM({
            url: 'https://{a-c}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            crossOrigin: 'anonymous',
            attributions: [ol.source.OSM.ATTRIBUTION, 'Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>'],
            maxZoom: 18
          })
        })
      ],
      target: 'map',
      view: new ol.View({
        center: ol.proj.fromLonLat([120.4223056, -3.275412]),
        maxZoom: 18,
        zoom: 5.2
      })
    });

    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
    var closer = document.getElementById('popup-closer');

    var overlay = new ol.Overlay({
      element: container,
      autoPan: true,
      autoPanAnimation: {
        duration: 250
      }
    });
    map.addOverlay(overlay);

    closer.onclick = function() {
      overlay.setPosition(undefined);
      closer.blur();
      return false;
    };

    map.on('singleclick', function(event) {
      if (map.hasFeatureAtPixel(event.pixel) === true) {
        var feature = map.forEachFeatureAtPixel(event.pixel,
          function(feature, layer) {
            return feature;
          });
        if (feature) {
          console.log("feature got clicked on"); // do stuff
          var coordinate = event.coordinate;
          var val = feature.values_;
          content.innerHTML = '<b>' + val.Name + '</b><br />' + val.info + '\nStatus: <b>' + val.status + '</b>\nSIC/SAC: <b>' + val.kode + '</b>';
          overlay.setPosition(coordinate);
        } else {
          console.log("didn't click a feature");
        }
      } else {
        overlay.setPosition(undefined);
        closer.blur();
      }
    });

    $(document).ready(function() {
      $('#dataTable').DataTable()
      $.get('list_radar.php', function(obj) {
        var i = 0;
        obj.forEach(element => {
          list_feature.push(new ol.Feature({
            Name: element.Name,
            kode: element.kode,
            info: 'Tanggal: ' + element.tanggal + '\nWaktu: ' + element.time,
            status: element.status,
            geometry: new ol.geom.Point(ol.proj.fromLonLat([parseFloat(element.lng), parseFloat(element.lat)])),
          }));
          (element.status == 'OK') ? list_feature[i].setStyle(icon_on): list_feature[i].setStyle(icon_off)
          list_feature[i].setId(element.Name)
          i++
        });
        list_radar = obj
        layer = new ol.layer.Vector({
          source: new ol.source.Vector({
            features: list_feature
          })
        });
        map.addLayer(layer);
        setInterval(loop_fetch, 5000)
      })
    });

    function loop_fetch() {
      $.get('list_radar.php', function(obj) {
        obj.forEach(element => {
          layer.getSource().getFeatureById(element.Name).setProperties({
            Name: element.Name,
            kode: element.kode,
            info: 'Lattitude: ' + element.lat + '\nLongitude: ' + element.lng + '\nSIC/SAC: ' + element.kode,
            status: element.status,
            geometry: new ol.geom.Point(ol.proj.fromLonLat([parseFloat(element.lng), parseFloat(element.lat)])),
          })
          layer.getSource().getFeatureById(element.Name).setStyle(
            (element.status == 'OK') ? icon_on : icon_off
          )
        });
      })
    }

    function modal_edit(id, Name, lokasi ,lat, lng, kode,) {
      $("#form-edit [name=id]").val(id)
      $("#form-edit [name=Name]").val(Name)
      $("#form-edit [name=lokasi]").val(lokasi)
      $("#form-edit [name=lat]").val(lat)
      $("#form-edit [name=lng]").val(lng)
      $("#form-edit [name=kode]").val(kode)
     
      
      $("#modal-edit").modal()
    }

    function hapus_radar() {
      $("#form-edit").attr('action', 'hapus_radar.php')
      $("#form-edit").submit()
    }
  </script>


</body>

</html>