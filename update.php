<?php
session_start();
require_once 'conn.php';
$db = new DB();

$prog = $_SESSION['program'];


if (isset($_POST['fullname'])){
	
	$fullname = $_POST['fullname'];
	$dob = $_POST['dob'];
	$program = $_POST['program'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];

	$stat=$db -> update($fullname, $program, $gender,$email,$dob,$contact,$password);

	if($stat == ""){
		echo "<script>
				alert('Update success');
				window.location='login.php';
			</script>";
		
	}
}
session_abort();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Continue Registration</title>
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
                <h4>Continue registration</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#">
                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input id="fullname" type="text" class="form-control" name="fullname" value="<?php echo $_SESSION['fullname']; ?>" >
                    <div class="invalid-feedback">
                  </div>
                  </div>
                  <div class="row">

                 
                  <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="email">Contact</label>
                    <input id="contact" type="text" class="form-control" name="contact" value="0<?php echo $_SESSION['contact']; ?>" >
                    <div class="invalid-feedback">
                    </div>
                  </div>
                 </div>
                  <div class="row">
                    <div class="form-group col-3">
                    <label for="dob" class="d-block">Date of birth</label>
                      <input id="dob" type="date" class="form-control" data-indicator="pwindicator"
                        name="dob" value="<?php echo $_SESSION['dob']; ?>">
                    </div>
					
                    <div class="form-group col-3 mt-4 mr-2 row">
                    <div class="pretty p-default p-round ml-2 mt-2">
                      <input type="radio" name="gender" value="Male" id="gender">
                        <label>Male</label>
                    </div>
                    <div class="pretty p-default p-round ml-4 mt-2">
                      <input type="radio" name="gender" value="Female" id="gender1">
                        <label>Female</label>
                    </div>
                    </div>
                    <div class="form-group col-6 mt-2">
                    <label for="password" class="d-block">Programme</label>
                    <select name="program" id="program" value="<?php echo $prog;?>">
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
                        name="password" value="<?php echo $_SESSION['password']; ?>">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm" value="<?php echo $_SESSION['password']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Update
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
	var gender = "<?php echo $_SESSION['gender']; ?>";
	gender == "Male" ? document.getElementById('gender').checked=true : document.getElementById('gender1').checked=true;

	var prog = "<?php echo $prog?>"
	document.getElementById('program').value = prog;
</script>

  <!-- General JS Scripts -->
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
</html>