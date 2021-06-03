<?php
   session_start();
   
  if (strlen($_SESSION['loginUser'])==0) {
      header("Location: index.php");
    }
    require_once "koneksi/classes/db.class.php";
    require_once "koneksi/functions.php";
 if (isset($_POST['submit'])){
  $id_pengguna = $_SESSION['userlogin'];
      $title = htmlspecialchars($_POST['title']);
      $category = htmlspecialchars($_POST['category']);
      $image = $_FILES['image']['name'];
      $article = htmlspecialchars($_POST['article']);
	  $status ="pending";
       
      if($image != "") {
        $ekstensi_diperbolehkan = array('png','jpg');
        $x = explode('.', $image); 
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['image']['tmp_name'];   
        $nama_image_baru = uniqid();
        $nama_image_baru .= '.';
        $nama_image_baru .= $ekstensi; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                      move_uploaded_file($file_tmp, 'uploads/post/'.$nama_image_baru); 
                          
                        $insert_blog = DB::insert('blog',[
                          'Title'=> $title,
                          'Category'=> $category,
                          'Article'=> $article,
                          'Picture'=>$nama_image_baru,
                          'status'=>$status,
                          'id_pengguna'=>$id_pengguna,
                        ]);
                        if(!$insert_blog){
                            die ("Query gagal dijalankan: ");
                        } else {
                          echo "<script>alert('Data berhasil ditambah.');window.location='user-galery.php';</script>";
                        }
                  } else {     
                      echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='user-galery.php';</script>";
                  }
        } else {
          $insert_blog = DB::insert('blog',[
            'Title'=> $title,
            'Category'=> $category,
            'Article'=> $article,
            'id_pengguna'=>$id_pengguna,
			'status'=>$status,
          ]);
          if(!$insert_blog){
                die ("Query gagal dijalankan: ");
          } else {
              echo "<script>alert('Data berhasil ditambah.');window.location='user-galery.php';</script>";
          }
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

<link href="assets/fonts/feather/feather.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">




<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
  <title>Galery Pameran</title>
</head>

<body>
<?php include_once 'includes/header.php'; ?>
  <!-- Page header-->
  <div class="py-4 py-lg-6 bg-primary py-lg-8 ">
    <div class="container">
      <div class="row">
        <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
          <div class="d-lg-flex align-items-center justify-content-between">
            <!-- Content -->
            <div class="mb-4 mb-lg-0">
              <h1 class="text-white mb-1">Add New Galery</h1>
              <p class="mb-0 text-white lead">
                Masukan Form Dibawah Untuk Membuat Galery
              </p>
            </div>
            <div>
              <a href="user-galery.php" class="btn btn-white ">Back to Beranda Galery</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Content -->
  <div class="pb-12">
    <div class="container">
      <div id="courseForm">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <div class="mt-5">
              <form enctype="multipart/form-data" method="POST">
                <!-- Content one -->
                <div id="test-l-1" role="tabpanel" aria-labelledby="courseFormtrigger1">
                  <!-- Card -->
                  <div class="card mb-3 ">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Form Pengisian</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="form-group">
                        <label for="courseTitle" class="form-label">Galery Title</label>
                        <input id="courseTitle" class="form-control" type="text" name="title" placeholder="Title" required/>
                       
                      </div>
                      <div class="form-group">
                        <label class="form-label">Galery category</label>
                        <select class="selectpicker" data-width="100%" name="category" required>
                        <option disabled selected>Select category</option>
												<?php $categories= DB::query("select * from category");
                    							foreach($categories as $category):
                  								?>
												<option><?php echo $category['Name']; ?></option>
												<?php endforeach; ?></select>
                      
            
                      </div>
                      <div class="form-group"  name="article">
                        <label class="form-label" >Galery Description</label>
                        <textarea class="form-control"name="article" required></textarea>
                      </div>
                    </div>
                                        <!-- Card body -->
                                        <div class="card-body">
                      <div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
                        <label class="form-label">Galery cover image
                          <a href="javascript:void(0)" class="custom-file-container__image-clear"
                            title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                          <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input"
                            accept="image/*" required/>
                          <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                          <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <small class="mt-3 d-block">Upload Gambar Galery Anda, Standar Gambar Rekomndasi 750x440 pixels; dan hanya mendukung .jpg, dan .png. Tidak Mendukkung Inputan Lain.</small>
                        <div class="custom-file-container__image-preview"></div>
                      </div>
                    </div>
                  </div>
                  <!-- Button -->
                  <button type="submit" name="submit" class="btn btn-danger mt-5">
                      Submit For Review
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- Footer -->
 <?php include_once 'includes/footer.php'; ?>

  <!-- Scripts -->
  <!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/odometer/odometer.min.js"></script>
<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/quill/dist/quill.min.js"></script>
<script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="assets/libs/dragula/dist/dragula.min.js"></script>
<script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="assets/libs/typed.js/lib/typed.min.js"></script>
<script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/dist/maps/world.js"></script>



<!-- clipboard -->
<script src="cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>
</body>



</html>