<?php 
require_once "koneksi/classes/db.class.php";
require_once "koneksi/functions.php";

$aku = $_SESSION['userlogin'];

$gbr = DB::query("SELECT * from pengguna Where id_pengguna=$aku");
foreach ($gbr as $gambar):

    
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-default fixed-top">
    <div class="container-fluid px-0 ">
    <a class="navbar-brand" href="beranda.php"><img src="assets/images/logo.png" alt="" width="40%"/></a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="beranda.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="user-about.php">About</a>
                </li>
            </ul>
    
            <ul class="navbar-nav navbar-right-wrap ml-auto d-none d-lg-block">
            
                <li class="dropdown ml-2 d-inline-block">
                    <a class="rounded-circle" href="artikel.html" role="button" id="dropdownUserProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                    <img src="uploads/profile/<?php if(empty($gambar['poto'])){echo 'testimonial.jpg';}else{echo $gambar['poto'];} ?>"  alt="profile"  class="rounded-circle">
                        
                        
                    </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUserProfile">
                        <div class="dropdown-item">
                            <div class="d-flex">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img src="uploads/profile/<?php if(empty($gambar['poto'])){echo 'testimonial.jpg';}else{echo $gambar['poto'];} ?>"  alt="profile"  class="rounded-circle avatar-sm mr-2">
                                </div>
                                <div class="ml-3 lh-1">
                                    <h5 class="mb-1"><?php echo $gambar['nama']; ?></h5>
                                    <p class="mb-0 text-muted">@<?php echo $gambar['username']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item" href="profile.php"><i class="fe fe-user mr-2"></i>Profile </a>
                            </li>
                        </ul>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item" href="logout.php"><i class="fe fe-power mr-2"></i>Sign Out </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endforeach; ?> 
            </ul>
        </div>
    </div>
</nav>