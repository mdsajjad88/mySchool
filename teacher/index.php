<?php
include "dbConnec.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Teacher Panel</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <style>
    #logo{
      border-radius: 50px;
    }
    .tpanel{
      margin-right: 280px;
      margin-top: 20px;
      color: white;
    }
    .rightdiv{
      background-color: blue;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../all_image/logo.jpeg" id="logo">
        </div>
        <div class="sidebar-brand-text mx-3">RGC, Rangpur</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>All Details Here</span></a>
      </li>
      <hr class="sidebar-divider">
      
      <li class="nav-item">
        <a href="../index.php" class="nav-link"> User Veiw </a>
      </li>
      
      <li class="nav-item">
        <a href="index.php?markAd" class="nav-link">Add Subject Mark</a>
      </li>
      <li class="nav-item">
        <a href="index.php?attndnce" class="nav-link">Science Attendence</a>
      </li>
      <li class="nav-item">
        <a href="index.php?business" class="nav-link">Business Attendence</a>
      </li>
      <li class="nav-item">
        <a href="index.php?humanity" class="nav-link">Humanitys Attendence</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"> Class Schedule</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"> Salary Details</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Application for leave</a>
      </li>
      
      
      
      <li class="nav-item">
        <a href="#" class="nav-link"> Personal Details</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"> Edit Personal Details</a>
      </li>
      
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <h3 class="tpanel">Teachers Panel</h3>
            
            
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Teacher Profile</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid " id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
           
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <a href="index.php?newad">
                    <div class="col mr-2">
                     
                      <div class="text-xl font-weight-bold text-uppercase mb-1">
                     Science
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <h1>555</h1>
                      </div>
                      </a>
                    </div>
                   
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 ">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="index.php?student">
                      <div class="text-xl font-weight-bold text-uppercase mb-1">Business</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                      <h3>450</h3>
                      </div>
                      </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="index.php?showteacher">
                      <div class="text-xl font-weight-bold text-uppercase mb-1">Humanitys </div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                       <h3>610</h3>
                      </div>
                      </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                  <a href="index.php?pending">
                    <div class="col mr-2">
                      <div class="text-xl font-weight-bold text-uppercase mb-1">Rover Scout</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                     <h3>200</h3>
                      </div>

                    </div>
                    </a>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           

           
          </div>
          <!--Row-->



          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
       <?php
       
       if(isset($_GET['attndnce'])){
        include "attendence.php";
       }
      if(isset($_GET['business'])){
        include "businessAttn.php";
      }

      if(isset($_GET['humanity'])){
        include "humanityAttn.php";
      }
       
            if(isset($_GET["markAd"])){
              include "markadd.php";
            }
            ?>

      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script>
                document.write(new Date().getFullYear());
              </script> - developed by <a href="#"> @Back Bencher</a>

            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>

</html>