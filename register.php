<?php
require 'conn.php';
require_once 'admin/send_sms.php';

$db = new DB();

if (isset($_POST['fullname'])){
    $fname = $_POST['fullname'];
	$dob = $_POST['dob'];
	$program = $_POST['program'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
    $gender = $_POST['gender'];

 $err = $db->insertData($fname,$dob,$gender,$program,$email,$password,$contact);

if($err ==''){
    echo "
    <script>
     alert('Registration done');
    </script>
     ";
     notifySms($fname);
     echo "
     <script>
      window.location='index.php';
     </script>
      ";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Initial Registration</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="./admin/assets/css/app.min.css">
  <link rel="stylesheet" href="./admin/assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="./admin/assets/css/style.css">
  <link rel="stylesheet" href="./admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="./admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='./admin/assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#">
                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input id="fullname" type="text" class="form-control" name="fullname">
                    <div class="invalid-feedback">
                  </div>
                  </div>
                  <div class="row">

                 
                  <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="email">Contact</label>
                    <input id="contact" type="text" class="form-control" name="contact">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                 </div>
                  <div class="row">
                    <div class="form-group col-3">
                    <label for="dob" class="d-block">Date of birth</label>
                      <input id="dob" type="date" class="form-control" data-indicator="pwindicator"
                        name="dob">
                    </div>
                    <div class="form-group col-3 mt-4 mr-2 row">
                    <div class="pretty p-default p-round ml-2 mt-2">
                      <input type="radio" name="gender" value="Male">
                        <label>Male</label>
                    </div>
                    <div class="pretty p-default p-round ml-4 mt-2">
                      <input type="radio" name="gender" value="Female">
                        <label>Female</label>
                    </div>
                    </div>
                    <div class="form-group col-6 mt-2">
                    <label for="password" class="d-block">Programme</label>
                    <select name="program" id="">
                        <option value="">Select your program</option>
                      <option value="Computer Science">Computer Science</option>
                      <option value="Business Administration">Business Administration</option>
                      <option value="Electrical Engineering">Electrical Engineering</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>
                  </div>
                  <div class="form-group row mb-3 ml-2">
                     <input type="checkbox" name="password" id="showpassword">
                     <label for="showpassword"> Show password</label>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              
            </div>
            <!-- ends here -->
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    const togglePassword = document.getElementById('showpassword');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    password2.setAttribute('type', type);
    // toggle the eye / eye slash icon
    document.getElementById('showpassword').innerText === 'Show password' ? 'Hide password' : 'Show password';
});

  </script>
  <!-- General JS Scripts -->
  <!-- <script src="control.js"></script> -->
  <script src="./admin/assets/js/app.min.js"></script>


  <!-- JS Libraies -->
  <script src="./admin/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="./admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="./admin/assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="./admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="./admin/assets/js/custom.js"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>