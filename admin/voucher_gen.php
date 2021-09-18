<?php
require_once "../conn.php";
$db = new DB();

if(isset($_POST['quantity'])){
$qty = $_POST['quantity'];

    $characters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O",
        "P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i",
        "j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4",
        "5","6","7","8","9","0");

        $ser = array("1","2","3","4","5","6","7","8","9","0");

                for($a=0;$a<$qty;$a++){
                $serial= "KN";
                $pin ="";
                for($i=0;$i<=10;$i++){
                $cha = rand(0,count($characters)-1);
                $serial .= $characters[$cha];
                }
          
            for($i=0;$i<=14;$i++){  
                $sc = rand(0,9);
                $pin .= $ser[$sc];
                }
          
           $db->insertvoucher($serial,$pin);
            }

        echo "<script>alert('Vouchers Generated')</script>";
}

        

        
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Generate Voucher</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
  <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            
          </ul>
        </div>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"> <img alt="" src="" class="header-logo" /> 
              <span class="logo-name">Admissions</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="view_edit.php" class="nav-link"><i data-feather="monitor"></i><span>View and edit Admissions</span></a>
            </li>
            <li class="dropdown">
              <a href="review.php" class="nav-link"><i data-feather="monitor"></i><span>Pending Admissions</span></a>
            </li>
            <li class="dropdown active">
              <a href="voucher_gen.php" class="nav-link"><i data-feather="monitor"></i><span>Generate Vouchers</span></a>
            </li>
            
            </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
      <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>Generate Voucher</h1>
            <div class="page-description">
              Generate Vouchers for student admissions.
            </div>
            <div class="page-search">
              <form method='POST' action='#'>
                <div class="form-group floating-addon floating-addon-not-append">
                  <div class="input-group">
                   
                    <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-lg" type='submit'>
                        Generate
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
       
      </div>
      
    </div>

  

    
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>

