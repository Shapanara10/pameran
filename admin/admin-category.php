<?php
 session_start(); 
  
  if (strlen($_SESSION['userlogin'])==0) {
      header("Location: index.php");
    }
    require_once "../koneksi/classes/db.class.php";
  require_once "../koneksi/functions.php";
  if (isset($_POST['submit'])){
	$sts = "aktif";
    $title = htmlspecialchars($_POST['title']);
    $insert_category = DB::insert('category', [
      'Name' => $title,
      'status' => $sts,
    ]);
    if ($insert_category){
      echo "<script>alert('Category berhasil Ditambah')</script>";
    }else{
      echo "<script>alert('Gagal Menambahkan')</script>";
    }
  }
  elseif (isset($_GET['id'])){
	$delete_category = DB::delete('category', "id=%i", $id = $_GET['id']);
	if ($delete_category){
	  echo "<script>
			alert('CATEGORY Berhasil Di Hapus');
			document.location='admin-category.php';
			</script>";
  }
}
  elseif (isset($_GET['Publish'])){
	$up = "aktif";
	$update_status = DB::update('category',[
		'status'=> $up,
	  ], "id=%i", $id = $_GET['Publish']);
	if ($update_status){
		echo "<script>
			  alert('CATEGORY Berhasil Di Published');
			  document.location='admin-category.php';
			  </script>";
 }
}
 elseif (isset($_GET['Unpublish'])){
	 $upp = "mati";
	$update_statuss = DB::update('category',[
		'status'=> $upp,
	  ], "id=%i", $id = $_GET['Unpublish']);
	if ($update_statuss){
		echo "<script>
			  alert('CATEGORY Berhasil Di Pending');
			  document.location='admin-category.php';
			  </script>";
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
<link href="../assets/fonts/feather/feather.css" rel="stylesheet"/>
<link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
<link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet"/>
<link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet"/>
<link href="../assets/libs/prismjs/themes/prism.css" rel="stylesheet"/>
<link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet"/>
<link href="../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet"/>
<link href="../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
<title>Admin Galery Pameran</title>
</head>
<body>
<!-- Wrapper -->
<div id="db-wrapper">
    <?php include_once 'includes/nav-admin.php'; ?>
	<!-- Page Content -->
	<div id="page-content">
        <?php include_once 'includes/header-admin.php'; ?>
		<!-- Container fluid -->
		<div class="container-fluid p-4">
			<div class="row">
				<!-- Page Header -->
				<div class="col-lg-12 col-md-12 col-12">
					<div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
						<div class="mb-2 mb-lg-0">
							<h1 class="mb-1 h2 font-weight-bold">ALL Category</h1>
							<!-- Breadcrumb -->
							<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.php">Dashboard</a>
								</li>
								<li class="breadcrumb-item">
									<a href="#!">Pameran</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Category</li>
							</ol>
							</nav>
						</div>
						<div>
							<a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#newCatgory">Add New Category</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<!-- Card -->
					<div class="card mb-4 ">
						<!-- Card Header -->
						<div class="card-header border-bottom-0">
							<!-- Form -->
							<form class="d-flex align-items-center ">
								<span class="position-absolute pl-3 search-icon">
								<i class="fe fe-search"></i>
								</span>
								<input type="search" class="form-control pl-6" placeholder="Search Category"/>
							</form>
						</div>
						<!-- Table -->
						<div class="table-responsive border-0 overflow-y-hidden">
							<table class="table mb-0 text-nowrap">
							<thead>
							<tr>
					
								<th class="border-0">No</th>
								<th class="border-0">CATEGORY</th>
								<th class="border-0">POSTS</th>
								<th class="border-0">STATUS</th>
								<th class="border-0"></th>
							</tr>
							</thead>
							<tbody>
							<?php 
										$jumlahDataPerHalaman = 4;
										$sql = "SELECT * FROM category";
										$result = $dbh->prepare($sql);
										$result-> execute();
										$jumlahData = $result->rowCount();
										$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
										$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
										$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                               				$category = DB::query("Select * from category order by id desc LIMIT $awalData, $jumlahDataPerHalaman ");
                                			$id = 0;
                                			foreach ($category as $kategori):
                                    		$id++;
											
		

                                			?>

							<tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" data-target="#collapseOne">
								<td class="align-middle border-top-0">
									<?php echo $id; ?>
								</td>
								<td class="align-middle border-top-0">
									<?php echo $kategori['Name']; ?>
								</td>
								<td class="align-middle border-top-0">1</td>
								<td class="align-middle border-top-0">
												<?php $sts = $kategori['status']; ?>
												<?php if( $sts == "aktif") : ?>
													<span class="badge-dot badge-success"></span>
												<?php elseif( $sts == "mati") : ?>			
													<span class="badge-dot badge-danger"></span>
												<?php endif;  ?>
								</td>
								<td class="text-muted align-middle border-top-0">
									<span class="dropdown dropleft">
									<a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
									<span class="dropdown-menu" aria-labelledby="courseDropdown1">
									<span class="dropdown-header">Action</span>
									<a class="dropdown-item" href="admin-edit-category.php?edt=<?=$kategori['id']?>"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
									<a class="dropdown-item" href="admin-category.php?Publish=<?=$kategori['id']?>"><i class="fe fe-send dropdown-item-icon"></i>Publish</a>
									<a class="dropdown-item" href="admin-category.php?Unpublish=<?=$kategori['id']?>"><i class="fe fe-inbox dropdown-item-icon"></i>Moved Draft</a>
									<a class="dropdown-item" href="admin-category.php?id=<?=$kategori['id']?>"><i class="fe fe-trash dropdown-item-icon"></i>Delete</a>
									</span>
									</span>
								</td>
							</tr>
							<?php endforeach; ?>
							<!-- akhir -->
							</tbody>
							</table>
						</div>
						<div class="card-footer">
					
					<nav aria-label="Page navigation example">
						
					<ul class="pagination justify-content-center mb-0">
						<?php if( $halamanAktif > 1) : ?>
						<li class="page-item">
							<a class="page-link mx-1 rounded" href="?halaman=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true"><i class="mdi mdi-chevron-left"></i></a>
						</li>
						<?php elseif( $halamanAktif == 1) : ?>
						<li class="page-item disabled">
							<a class="page-link mx-1 rounded" tabindex="-1" aria-disabled="true"><i class="mdi mdi-chevron-left"></i></a>
						</li>
						<?php endif ?>
						<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
							<?php if($i == $halamanAktif) :  ?>	
								<li class="page-item active">
									<a class="page-link mx-1 rounded" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
								</li>
							<?php else :  ?>
								<li class="page-item">
									<a class="page-link mx-1 rounded" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
								</li>
							<?php endif;  ?>
							<?php endfor; ?>
					<?php if( $halamanAktif < $jumlahHalaman) : ?>
						<li class="page-item">
							<a class="page-link mx-1 rounded" href="?halaman=<?= $halamanAktif + 1; ?>"><i class="mdi mdi-chevron-right"></i></a>
						</li>
					<?php elseif( $halamanAktif == $jumlahHalaman) : ?>
						<li class="page-item">
							<a class="page-link mx-1 rounded"><i class="mdi mdi-chevron-right"></i></a>
						</li>
					<?php endif ?>
					</ul>
					</nav>
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title mb-0" id="newCatgoryLabel">Create New Category</h4>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div class="form-group mb-2">
						<label class="form-label" for="title">Title<span class="text-danger">*</span></label>
						<input type="text" class="form-control" placeholder="Write a Category" name="title" id="title" required>
					</div>
					<div>
						<button type="submit" name="submit" class="btn btn-primary">Add New Category</button>
						<button type="button" class="btn btn-outline-white" data-dismiss="modal">Close</button>
					</div>
				</form>
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
<script src="cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
</body>

</html>