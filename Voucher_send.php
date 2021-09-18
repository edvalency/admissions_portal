<?php
require_once 'conn.php';
require_once './admin/send_sms.php';
$db = new DB();

if(isset($_POST['contact'])){
	$contact = $_POST['contact'];

// getting voucher from db
$row = $db->vouchersend();


$serial = $row['serial'];
$pin = $row['pin'];

sendvoucher($contact,$serial,$pin);
$db->usedvoucher($serial,$pin);
$db->Vouchdelete($serial,$pin);

echo "<script> window.location='apply.php';</script>";

}



?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Voucher Sending</title>
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
                <h4>Voucher sending</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="text">Enter contact to receive voucher</label>
                    <input id="contact" type="text" class="form-control" name="contact" tabindex="1" value='+233'required autofocus>
                    <div class="invalid-feedback">
                      Please enter contact
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Send
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
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="./admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="./admin/assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>