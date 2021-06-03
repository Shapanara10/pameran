<?php 
require_once "koneksi/classes/db.class.php";
require_once "koneksi/functions.php";

$aku = $_SESSION['userlogin'];

$gbr = DB::query("SELECT * from pengguna Where id_pengguna=$aku");
foreach ($gbr as $gambar):

    
?>
<!-- Page Content -->
<div class="pt-5 pb-5">
		<div class="container">
			<!-- User info -->
			<div class="row align-items-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-12">
					<!-- Bg -->
					<div class="pt-16 rounded-top" style="
								background: url(assets/images/profile-bg.jpg) no-repeat;
								background-size: cover;
							"></div>
					<div
						class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom shadow-sm">
						<div class="d-flex align-items-center">
							<div class="mr-2 position-relative d-flex justify-content-end align-items-end mt-n5">
								<img src="uploads/profile/<?php if(empty($gambar['poto'])){echo 'testimonial.jpg';}else{echo $gambar['poto'];} ?>"  alt="profile"  class="rounded-circle avatar-xl mr-">
								
								<a href="#!" class="position-absolute top-0 right-0" data-toggle="tooltip" data-placement="top" title=""
									data-original-title="Verified">
									<img src="assets/images/checked-mark.svg" alt="" height="30" width="30" />
								</a>
							</div>
							<div class="lh-1">
								<h2 class="mb-0"><?php echo $gambar['nama']; ?></h2>
								<p class="mb-0 d-block">@<?php echo $gambar['username']; ?></p>
							</div>
							<?php endforeach; ?>
						</div>
						<div>
							<a href="add-galery.php" class="btn btn-primary btn-sm d-none d-md-block">Create New Galery</a>
						</div>
					</div>
				</div>
			</div>

		