<?php
require_once 'conn.php';
$db = new DB();

if(isset($_POST['serial']) && isset($_POST['pin'])){
	$serial = $_POST['serial'];
	$pin = $_POST['pin'];

$row = $db->Vouchcounter($serial, $pin);

if ($row == 1){
  	echo "<script>window.location='register.php';</script>";
	$db ->vouchuseddelete($serial,$pin);
}else{
	echo "<script>alert('Voucher not found')</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Voucher login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="./admin/assets/css/app.min.css">
  <link rel="stylesheet" href="./admin/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="./admin/assets/css/style.css">
  <link rel="stylesheet" href="./admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="./admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Enter voucher details to apply</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="serial">Serial No.</label>
                    <input id="serial" type="text" class="form-control" name="serial" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your serial no.
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Pin</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="pin" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your pin
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Begin Application
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="./admin/assets/js/app.min.js"></script>
  <script src="./admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="./admin/assets/js/custom.js"></script>
</body>
</html>