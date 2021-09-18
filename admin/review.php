<?php
require_once 'send_sms.php'; //including enrollment script
require_once '../conn.php';

$db = new DB();
$allData = $db->review();

$fullname = $_POST['fullname'];
$admission =$_POST['admission'];

if(isset($admission)){
    if($admission=='Enroll'){
         $db->enrollstat($fullname, '1' );
        // send enrollment message sms to applicant
        enrolledSms($fullname);
         echo "<script> window.location='review.php';</script>";
    }else{
        $db->enrollstat($fullname, '0' ); 
        echo "<script> window.location='review.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admission Review</title>
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
            <a href="index.html"> <img alt="" src="" class="header-logo" /> 
              <span class="logo-name">Admissions</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown ">
              <a href="view_edit.php" class="nav-link"><i data-feather="monitor"></i><span>View and edit Admissions</span></a>
            </li>
            <li class="dropdown active">
              <a href="review.php" class="nav-link"><i data-feather="monitor"></i><span>Review Admissions</span></a>
            </li>
            
            </ul>
        </aside>
      </div>
      <div class="main-content">
        <!-- table start -->
      <div class="card" id="vis">
                  <div class="card-header">
                    <h4>All Admissions</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md" id="tbl">
                        <tr>
                          
                          <th>Name</th>
                          <th>Program</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Enrolled</th>
                          <th></th>
                        </tr>
                        <tbody>
                          <?php 
                          foreach($allData as $data){

                          ?>
                          <tr>
                           
                          <td><?php echo($data['fullname']);?></td>
                          <td><?php echo($data['program']);?></td>
                          <td><?php echo($data['email']);?></td>
                          <td>0<?php echo($data['contact']);?></td>
                          <td>
                          <?php $data['contact'];?>
                            <div class="badge"id='enrolled' >
								<?php 
								if($data['enrolled']=="1"){
									echo "Yes";

								}else if($data['enrolled']=="0"){
									echo 'No';
								}else{
									echo "Pending";
								}

								?>

                            </div>
                          </td>
                          <td><button href="" class="btn btn-primary" id="view" onclick="tapped(
                            '<?php echo($data['email']);?>',
                            '<?php echo($data['fullname']);?>',
                            '<?php echo($data['program']);?>',
                            '<?php echo($data['contact']);?>',
                            '<?php echo($data['dob']);?>',
                            '<?php echo($data['gender']);?>' )">Detail</button></td>
                        </tr>
                        <?php }; ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                 
                  <!-- Show details -->
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span
                              class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                

                </div>
                <div class="card card-primary container col-6" id="details">
              <div class="card-header">
                <h4>Review</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="review.php" onsubmit='enable()'>
                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input id="fullname" type="text" class="form-control" name="fullname" disabled>
                    <div class="invalid-feedback">
                  </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-3">
                    <label for="dob" class="d-block">Date of birth</label>
                      <input id="dob" type="date" class="form-control" data-indicator="pwindicator"
                        name="dob" disabled>
                    </div>
                    <div class="form-group col-3 mt-4 mr-2 row">
                    <div class="pretty p-default p-round ml-2 mt-2">
                      <input type="radio" name="gender"  id='gender' value="Male" disabled>
                        <label>Male</label>
                    </div>
                    <div class="pretty p-default p-round ml-4 mt-2">
                      <input type="radio" name="gender" id='gender1' value="Female" disabled>
                        <label>Female</label>
                    </div>
                    </div>
                    <div class="form-group col-6 mt-2">
                    <label for="program" class="d-block">Programme</label>
                    <select name="program" id="program" disabled>
                      <option value="Computer Science">Computer Science</option>
                      <option value="Business Administration">Business Administration</option>
                      <option value="Electrical Engineering">Electrical Engineering</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-5">
                      <label for="email" class="d-block">Email</label>
                      <input id="email" type="email" class="form-control" 
                        name="email" disabled>
                      </div>
                      
                      <div class="form-group col-5">
                      <label for="contact" class="d-block">Contact</label>
                      <input id="contact" type="text" class="form-control" name="contact" disabled>
                    </div>
                    </div>
                     <label for="Admission">Admission status</label>
                    <div class="row col-12">
                        <div class="form-group col-6">
                        <div class="pretty p-default p-round ml-6 mt-2">
                      <input type="radio" name="admission"  id='admission' value="Enroll">
                        <label>Enroll</label>
                         <div class="pretty p-default p-round mt-2">
                      <input type="radio" name="admission"  id='admission' value="Reject" >
                         <label>Reject</label>
                    </div>
                    </div>
                        </div>
                    </div>
                  </div>
                  
                  <div class="form-group" style="diplay:flex;align-content:'center'">
                  <button class="btn btn-secondary btn-lg col-2 mr-5 ml-4" onclick="toList()" id="toList">
                      Return
                    </button>
                    <button type="btn" class="btn btn-primary btn-lg col-5 ml-3 mr-5" onclick="enroll()">
                      Complete
                    </button>
                    
                    
                  </div>
                </form>
              </div>
            </div>


      </div>

      <script>
        //   document.getElementById('fullname').disabled=false;
        var tog = document.getElementById('vis');
var details = document.getElementById('details');

details.style.display = "none";
// tog.style.display = "none";

function tapped(em,fn,pg,ct,dob,gndr){
  tog.style.display = "none";
  details.style.display="flex";
  document.getElementById('email').value = em;
  document.getElementById('fullname').value = fn;
  document.getElementById('contact').value = "0"+ct;
  document.getElementById('program').value = pg;
  document.getElementById('dob').value = dob;
  gndr =="Male" ? document.getElementById('gender').checked=true : document.getElementById('gender1').checked = true;
  }

function toList(){
  details.style.display = "none";
}

function enable(){
    document.getElementById('fullname').disabled=false;
}

      </script>
    
                <!-- General JS Scripts -->
                <!-- <script src="view.js"></script> -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- <script src="assets/bundles/apexcharts/apexcharts.min.js"></script> -->
  <!-- Page Specific JS File -->
  <!-- <script src="assets/js/page/index.js"></script> -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>

