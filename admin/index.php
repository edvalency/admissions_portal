<?php
require_once '../conn.php';
$db = new DB();

if(isset($_POST['username']) && isset($_POST['password'])){
	$user = $_POST['username'];
	$pass = $_POST['password'];

$row = $db->admcounter($user, $pass);

if ($row == 1){
	echo "<script>window.location='dashboard.php';</script>";
}else{
	echo "<script>alert('User not found');</script>";
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="./assets/css/app.min.css">
  <link rel="stylesheet" href="./assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="./assets/css/custom.css">
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
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <!-- <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div> -->
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group row mb-3 ml-2">
                     <input type="checkbox" name="password" id="showpassword">
                     <label for="showpassword"> Show password</label>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
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
  <script>
    const togglePassword = document.getElementById('showpassword');
    const password = document.getElementById('password');
    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    document.getElementById('showpassword').innerText === 'Show password' ? 'Hide password' : 'Show password';
});
  </script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="./assets/js/custom.js"></script>
</body>
</html>