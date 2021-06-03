<?php
  session_start();
  global $wrongusername,$wrongpassword;
  include_once("../koneksi/config.php");
  require_once "../koneksi/functions.php";
  
  if(isset($_POST['login'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $sql = "SELECT id_pengguna,UserName,Password,role from pengguna where UserName=:username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0){
      foreach ($results as $row) {
        $hashpass=$row->Password;
        $roled=$row->role;
        $pengguna=$row->id_pengguna;
      }//verifying Password
      if (password_verify($password, $hashpass)) {
        if($roled =="admin"){
            $_SESSION['userlogin'] =$username;
            $_SESSION['userlogin'] =$pengguna;
            header("location:admin.php");
            echo "<script>window.location.href= 'admin.php'; </script>";
        }else if($roled == "user"){ 
          header("location:index.php");
        }else{
          header("location:index.php");
        }
      }
      else {
        $wrongpassword='
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh Tidak!😕</strong> Mungkin Password Yang Anda Masukan Salah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
    }
    //if username or email not found in database
    else{
      $wrongusername='
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh Tidak🙃</strong> Mungkin Username Yang Anda Masukan Salah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
  }  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Libs CSS -->

<link href="../assets/fonts/feather/feather.css" rel="stylesheet" />
<link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="../assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
<link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">




<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
  <title>Admin Galery Pameran </title>
</head>

<body>
  <!-- Page content -->
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center no-gutters min-vh-100">
      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
              
              <h1 class="mb-1 font-weight-bold">Sign in</h1>
            </div>
            <!-- Form -->
            <form method="post">
              	<!-- Username -->
                  <?php echo $wrongusername; ?>
                  <?php echo $wrongpassword; ?>
              <div class="form-group">
                <label for="" class="form-label">Username</label>
                <input name="username" type="text"  class="form-control" placeholder="Masukan Username"
                  required>
              </div>
              	<!-- Password -->
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Masukan Password"
                  required>
              </div>
              	<!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="rememberme">
                  <label class="custom-control-label " for="rememberme">Remember me</label>
                </div>
              </div>
              <div>
                	<!-- Button -->
                <button type="submit"  name="login" class="btn btn-primary btn-block">Sign in</button>
                
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/odometer/odometer.min.js"></script>
<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/quill/dist/quill.min.js"></script>
<script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="../assets/libs/dragula/dist/dragula.min.js"></script>
<script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/typed.js/lib/typed.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>



<!-- clipboard -->
<script src="../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
</body>


</html>