<?php 
require_once "../koneksi/classes/db.class.php";
require_once "../koneksi/functions.php";

$aku = $_SESSION['userlogin'];

$gbr = DB::query("SELECT * from pengguna Where id_pengguna=$aku");
foreach ($gbr as $gambar):

    
?>
<div class="header">
			<!-- navbar -->
			<nav class="navbar-default navbar navbar-expand-lg">
			<a id="nav-toggle" href="#!"><i class="fe fe-menu"></i></a>
			<ul class="navbar-nav navbar-right-wrap ml-auto d-flex nav-top-wrap ">
				<li class="dropdown ml-2">
					<a class="rounded-circle " href="#!" role="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="avatar avatar-md avatar-indicators avatar-online">
					
					<img src="../uploads/profile/<?php if(empty($gambar['poto'])){echo 'testimonial.jpg';}else{echo $gambar['poto'];} ?>"  alt="profile"  class="rounded-circle avatar-xl mr-">
					
					</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUser">
						<div class="dropdown-item">
							<div class="d-flex">
								<div class="avatar avatar-md avatar-indicators avatar-online">
								<img src="../uploads/profile/<?php if(empty($gambar['poto'])){echo 'testimonial.jpg';}else{echo $gambar['poto'];} ?>"  alt="profile"  class="rounded-circle avatar-xl mr-">
								</div>
								<div class="ml-3 lh-1">
									<h5 class="mb-1"><?php echo $gambar['nama']; ?>k</h5>
									<p class="mb-0 text-muted">@<?php echo $gambar['username']; ?></p>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<ul class="list-unstyled">
							<li>
								<a class="dropdown-item" href="profile-admin.php"><i class="fe fe-user mr-2"></i>Profile </a>
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
			</ul>
			</nav>
		</div>
		<!-- Page Header -->