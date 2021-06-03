<?php
  session_start();
 
  
  if (strlen($_SESSION['loginUser'])==0) {
      header("Location: index.php");
    }
     require_once "koneksi/functions.php";
?>
<!DOCTYPE html>
<html lang="en" >



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

  <title> Galery Pameran</title>
  <style>
    .h-250rem {
    height: 15.625rem;}
    .bg-img-hero {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top center;
}
  </style>

</head>

<body>
  <!-- Navbar -->
  <!-- navbar login -->

  <?php include_once 'includes/header.php'; ?>
  <!-- Page Content -->
  <div class="py-10 bg-white">
    <div class="container">
      <div class="row"> 
        <div class="offset-lg-2 col-lg-8 col-md-12 col-12 mb-12">
          <!-- caption-->
          <h1 class="display-2 font-weight-bold mb-3">Hi Semuanya, Kami Dari <span class="text-primary">Kelompok 12 SI A 2019</span></h1>
          <!-- para -->
          <p class="h2 mb-3 ">Ingin Memperkenalkan Website Kami Dengan Tema Galery Pameran</p>
          <p class="mb-0 h4 text-body lh-lg">Kami Se-Kelompok Membangun Website Ini Dengan Tujuan Yang Sangat Mulia, Bukan Guna Untuk Keperluan Pribadi
              Melainkan Untuk Memberikan Kesempatan Kepada Masyarakat Untuk Menampilkan Hasil Karya Dari Tangan Lokal Penduduk Kita Terhadap Kesenian Kayu</p>
        </div>
      </div>
       <!-- gallery -->
      <div class="gallery mb-12">
       <!-- gallery-item -->
        <figure class="gallery__item gallery__item--1 mb-0">
          <img src="assets/images/1.jpg" alt="Gallery image 1" class="gallery__img rounded-lg">
        </figure>
         <!-- gallery-item -->
        <figure class="gallery__item gallery__item--2 mb-0">
          <img src="assets/images/2.jpg" alt="Gallery image 2" class="gallery__img rounded-lg">
        </figure>
         <!-- gallery-item -->
        <figure class="gallery__item gallery__item--3 mb-0">
          <img src="assets/images/3.jpg" alt="Gallery image 3" class="gallery__img rounded-lg">
        </figure>
         <!-- gallery-item -->
        <figure class="gallery__item gallery__item--4 mb-0">
          <img src="assets/images/4.jpg" alt="Gallery image 4" class="gallery__img rounded-lg">
        </figure>
          <!-- gallery-item -->
        <figure class="gallery__item gallery__item--5 mb-0">
          <img src="assets/images/5.jpg" alt="Gallery image 5" class="gallery__img rounded-lg">
        </figure>
         <!-- gallery-item -->
        <figure class="gallery__item gallery__item--6 mb-0">
          <img src="assets/images/6.jpg" alt="Gallery image 6" class="gallery__img rounded-lg">
        </figure>
      </div>
      <div class="row">
         <!-- row -->
        <div class="col-md-6 offset-right-md-6">
           <!-- heading -->
          <h1 class="display-4 font-weight-bold mb-3">Perkembangan Website Kami</h1>
           <!-- para -->
          <p class="lead">Anda Dapat Melihat Hasil Perkembangan Website Kami Secara Realtime dan Berikut Beberapa Kemajuan Penting</p>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
           <!-- counter -->
          <div class="border-top pt-4 mt-6 mb-5">
            <h1 class="display-3 font-weight-bold mb-0"><?php echo table_count('category'); ?></h1>
            <p class="text-uppercase text-muted">Category</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <!-- counter -->
          <div class="border-top pt-4 mt-6 mb-5">
            <h1 class="display-3 font-weight-bold mb-0"><?php echo table_count('pengguna'); ?></h1>
            <p class="text-uppercase text-muted">Pengguna</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <!-- counter -->
          <div class="border-top pt-4 mt-6 mb-5">
            <h1 class="display-3 font-weight-bold mb-0"><?php echo table_count('blog'); ?></h1>
            <p class="text-uppercase text-muted">Galery Pameran</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- features -->
     <!-- Section -->
     <div class="py-8 py-lg-18 bg-light">
    <div class="container">
      <div class="row mb-8 justify-content-center">
        <div class="col-lg-6 col-md-12 col-12 text-center">
          <!-- caption -->
          <span class="text-primary mb-3 d-block text-uppercase font-weight-semi-bold ls-xl">Testimonials</span>
          <h2 class="mb-2 display-4 font-weight-bold ">Apa Kata Mereka </h2>
          <p class="lead">Uangkapan Tentang Website Kami secara Realtime</p>
        </div>
      </div>
      <div class="row">
      <?php 
       $tes = DB::query("SELECT * from testimony 
				   INNER JOIN pengguna ON testimony.id_pengguna = pengguna.id_pengguna
				   WHERE status='published' ORDER BY id_testimony DESC");
                  foreach ($tes as $testi):
            ?>
        <div class="col-md-6 col-12 mb-4 mb-lg-0">
            <!-- Card -->
          <div class="card shadow-lg">
              <!-- Card body -->
            <div class="card-body p-4 p-md-8 text-center">
              <i class="mdi mdi-48px mdi-format-quote-open text-light-primary lh-1"></i>
              <p class="lead text-dark mt-3"><?php echo $testi['Quote']; ?></p>
            </div>
              <!-- Card Footer -->
            <div class="card-footer bg-primary text-center border-top-0">
              <div class="mt-n8"><img src="uploads/profile/<?php if(empty($testi['poto'])){echo 'testimonial.jpg';}else{echo $testi['poto'];} ?>"  alt="profile"  class="rounded-circle border-primary avatar-xl border-width-4">
          </div>
              <div class="mt-2 text-white">
                <h3 class="text-white mb-0"><?php echo $testi['nama']; ?></h3>
                <p class="text-white-50 mb-1">@<?php echo $testi['username']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>  
      </div>
    </div>
  </div>
   <!-- Team -->
  <div class="py-lg-16 py-10 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-right-md-6 col-12 mb-10">
           <!-- heading -->
          <h2 class="display-4 mb-3 font-weight-bold">Para Pengguna</h2>
           <!-- lead -->
          <p class="lead mb-5">Berikut Para Pengguna Aktif Kami Secara Realtime</p>
        </div>
      </div>
      <div class="row">
      <?php 
             $usert = DB::query("SELECT * from pengguna");
             foreach ($usert as $user):
                                ?>
        <div class="col-md-2 col-3">
          <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
             <!-- avatar -->
             <img src="uploads/profile/<?php if(empty($user['poto'])){echo 'testimonial.jpg';}else{echo $user['poto'];} ?>"  alt="profile"  class="rounded-circle avatar-xl mb-3">
             <h4 class="mb-0 font-weight-bold "><?php echo $user['nama']; ?></h4>
            </div>
        </div>
        <?php endforeach; ?>  
        
      </div>
    </div>
  </div>
  <!-- cta -->
  <div class="bg-primary">
    <div class="container">
      <!-- row -->
      <div class="row align-items-center no-gutters">
        <div class="col-xl-6 col-lg-6 col-md-12">
          <!-- heading -->
          <div class="pt-6 pt-lg-0">
            <h1 class="text-white display-4 font-weight-bold pr-lg-8">Join Ke Dalam Website Kami Dan Pamerkan Kesenian Anda
            </h1>
            <!-- text -->
            <p class="text-white-50 mb-4 lead">
              Kami Sangat Bahagian Apabila Anda Menggunakan Website Kami Dan Apabila Berguna Dan Memberi Manfaat Bagi Anda Itu Adalah Tujuan Kami
            </p>
            <!-- btn -->
            <a href="register.php" class="btn btn-dark">Ayo Join</a>
          </div>
        </div>
        <!-- img -->
        <div class=" col-xl-6 col-lg-6 col-md-12 text-lg-right text-center pt-6">
        <img src="assets/images/kayu.jpg" alt="" class="img-fluid"/>
        </div>
      </div>
    </div>
  </div>



  <!-- footer -->
      <!-- footer -->
    <div class="pt-lg-10 pt-5 footer bg-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                  <!-- about company -->
              <div class="mb-4">
                
                <div class="mt-4">
                  <p>Website Galery Pameran</p>
                     <!-- social media -->
                  <div class="font-size-md mt-4">
                    <a href="#!" class="mdi mdi-facebook text-muted mr-2"></a>
                    <a href="#!" class="mdi mdi-twitter text-muted mr-2"></a>
                    <a href="#!" class="mdi mdi-instagram text-muted "></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
              <div class="mb-4">
                    <!-- list -->
                <h3 class="font-weight-bold mb-3">Galery Pameran</h3>
                <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                  <li><a href="beranda.php" class="nav-link">Home</a></li>
                  <li><a href="user-about.php" class="nav-link">About</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
              <div class="mb-4">
                    <!-- list -->
                <h3 class="font-weight-bold mb-3"></h3>
                <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                  <li><a href="#" class="nav-link"></a></li>
                  <li><a href="#" class="nav-link"></a></li>
                  <li><a href="#" class="nav-link"></a></li>
                  <li><a href="#" class="nav-link"></a></li>
                  <li><a href="#" class="nav-link"></a></li>
                </ul>

              </div>
            </div>
            <div class="col-lg-3 col-md-12">
                  <!-- contact info -->
              <div class="mb-4">
                <h3 class="font-weight-bold mb-3">Hubungin Kami</h3>
                <p>Kelas: Sistem Informasi A 2019, Universitas Mulawarman</p>
                <p class="mb-1">Email: <a href="#">Kelompok12@gamil.com</a></p>
                <p>Phone: <span class="text-dark font-weight-semi-bold">0815 2098 6537</span></p>

              </div>
            </div>
          </div>
          
        </div>
      </div>
<!-- Awal Footer -->
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