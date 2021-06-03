<?php 
session_start();

 if (strlen($_SESSION['userlogin'])==0) {
	 header("Location: index.php");
   }
   require_once "../koneksi/classes/db.class.php";
   require_once "../koneksi/functions.php";
 if (isset($_GET['id'])){
	 $delete_blog = DB::delete('blog', "id_post=%i", $id = $_GET['id']);
	 if ($delete_blog){
	   echo "<script>
			 alert('Blog Berhasil Di Hapus');
			 document.location='all-post.php';
			 </script>";
   }
 }
 elseif (isset($_GET['Publish'])){
	$up = "published";
	$update_status = DB::update('blog',[
		'status'=> $up,
	  ], "id_post=%i", $id = $_GET['Publish']);
	if ($update_status){
		echo "<script>
			  alert('Articel Berhasil Di Published');
			  document.location='all-post.php';
			  </script>";
 }
}
 elseif (isset($_GET['Unpublish'])){
	 $upp = "pending";
	$update_statuss = DB::update('blog',[
		'status'=> $upp,
	  ], "id_post=%i", $id = $_GET['Unpublish']);
	if ($update_statuss){
		echo "<script>
			  alert('Articel Berhasil Di Pending');
			  document.location='all-post.php';
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
							<h1 class="mb-1 h2 font-weight-bold">All Posts</h1>
							<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="admin.php">Dashboard</a>
								</li>
								<li class="breadcrumb-item">
									<a href="#!">Pameran</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Post</li>
							</ol>
							</nav>
						</div>
						<div>
							<a href="add-post.php" class="btn btn-primary">New Post</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<!-- Card -->
					<div class="card rounded-lg">
						<!-- Card Header -->
						<div class="card-header border-bottom-0 p-0">
							<ul class="nav nav-lb-tab" id="tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="all-post-tab" data-toggle="pill" href="#all-post" role="tab" aria-controls="all-post" aria-selected="true">All</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="published-tab" data-toggle="pill" href="#published" role="tab" aria-controls="published" aria-selected="false">Published</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="draft-tab" data-toggle="pill" href="#draft" role="tab" aria-controls="draft" aria-selected="false">Draft</a>
								</li>
							</ul>
						</div>
						<div class="p-4 row">
							<!-- Form -->
							<form class="d-flex align-items-center col-12 col-md-8 col-lg-3">
								<span class="position-absolute pl-3 search-icon">
								<i class="fe fe-search"></i>
								</span>
								<input type="search" class="form-control pl-6" placeholder="Search Post"/>
							</form>
						</div>
						<div>
							<div class="tab-content" id="tabContent">
								<!-- Tab -->
								<div class="tab-pane fade show active" id="all-post" role="tabpanel" aria-labelledby="all-post-tab">
									<div class="table-responsive border-0">
										<!-- Table -->
										<table class="table mb-0 text-nowrap table-bordered table-striped">
										<!-- Table Head -->
										<thead>
										<tr>
											<th scope="col" class="border-0">No</th>
											<th scope="col" class="border-0">JUDUL</th>
											<th scope="col" class="border-0">IMAGE</th>
											<th scope="col" class="border-0">CATEGORY</th>
											<th scope="col" class="border-0">DATE</th>
											<th scope="col" class="border-0">Articel</th>
											<th scope="col" class="border-0">STATUS</th>
											<th scope="col" class="border-0"></th>
										</tr>
										</thead>
										<tbody>
										<?php 
										$jumlahDataPerHalaman = 10;
										$sql = "SELECT * FROM blog";
										$result = $dbh->prepare($sql);
										$result-> execute();
										$jumlahData = $result->rowCount();
										$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
										$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
										$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                               				$blog = DB::query("Select * from blog order by id_post desc LIMIT $awalData, $jumlahDataPerHalaman ");
                                			$id = 0;
                                			foreach ($blog as $article):
                                    		$id++;
										
                                		?>

										<!-- Table body -->
										<tr>
											<td>
											<?php echo $id; ?>
											</td>
											<td class="align-middle border-top-0">
												<h5 class="mb-0"><a href="#!" class="text-inherit"><?php echo $article['Title']; ?></a></h5>
											</td>
											<td class="align-middle border-top-0">
												<img width="80" alt="<?php echo $article['Title']; ?>" src="../uploads/post/<?php if(empty($article['Picture'])){echo 'blog_post_1.jpg';}else{echo $article['Picture'];} ?>">
											</td>
											<td class="align-middle border-top-0">
												<a href="#!" class="text-inherit"><?php echo $article['Category']; ?></a>
											</td>
											<td class="align-middle border-top-0"><?php echo $article['date_posted'];?></td>
											<td class="align-middle border-top-0">						
												<?php echo $article['Article']; ?>																			
											</td>
											<td class="align-middle border-top-0">
												<?php $sts = $article['status']; ?>
												<?php if( $sts == "published") : ?>
													<span class="badge-dot bg-success mr-1 d-inline-block align-middle"></span>Published
												<?php elseif( $sts == "pending") : ?>			
													<span class="badge-dot bg-warning mr-1 d-inline-block align-middle"></span>Draft
												<?php endif;  ?>
											</td>
											<td class="text-muted align-middle border-top-0 text-right">
												<span class="dropdown dropleft">
												<a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown1">
												<span class="dropdown-header">Settings</span>
												<a class="dropdown-item" href="admin-edit-post.php?id=<?=$article['id_post']?>"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
												<a class="dropdown-item" href="all-post.php?Publish=<?=$article['id_post']?>"><i class="fe fe-toggle-left dropdown-item-icon"></i>Publish</a>
												<a class="dropdown-item" href="all-post.php?Unpublish=<?=$article['id_post']?>"><i class="fe fe-toggle-right dropdown-item-icon"></i>Unpublish</a>
												<a class="dropdown-item" href="all-post.php?id=<?=$article['id_post']?>" ><i class="fe fe-trash dropdown-item-icon"></i>Delete</a>
												</span>
												</span>
											</td>
										</tr>
										<?php endforeach; ?>
										</tbody>
										</table>
									</div>
								</div>


								<!-- Publis -->
								<div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
									<div class="table-responsive border-0">
										<table class="table mb-0 text-nowrap table-bordered table-striped">
										<thead>
										<tr>
											
											<th scope="col" class="border-0">No</th>
											<th scope="col" class="border-0">POST</th>
											<th scope="col" class="border-0">TYPE</th>
											<th scope="col" class="border-0">CATEGORY</th>
											<th scope="col" class="border-0">DATE</th>
											<th scope="col" class="border-0">Author</th>
											<th scope="col" class="border-0">STATUS</th>
											<th scope="col" class="border-0"></th>
										</tr>
										</thead>
										<tbody>
	<?php 
										$jumlahDataPerHalaman = 10;
										$sql = "SELECT * FROM blog ";
										$result = $dbh->prepare($sql);
										$result-> execute();
										$jumlahData = $result->rowCount();
										$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
										$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
										$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                               				$blog = DB::query("Select * from blog WHERE status = 'published'  order by id_post desc LIMIT $awalData, $jumlahDataPerHalaman ");
                                			$id = 0;
                                			foreach ($blog as $article):
                                    		$id++;
											

                                			?>

										<!-- Table body -->
										<tr>
											<td>
											<?php echo $id; ?>
											</td>
											<td class="align-middle border-top-0">
												<h5 class="mb-0"><a href="#!" class="text-inherit"><?php echo $article['Title']; ?></a></h5>
											</td>
											<td class="align-middle border-top-0">
												<img width="80" alt="<?php echo $article['Title']; ?>" src="../uploads/post/<?php if(empty($article['Picture'])){echo 'blog_post_1.jpg';}else{echo $article['Picture'];} ?>">
											</td>
											<td class="align-middle border-top-0">
												<a href="#!" class="text-inherit"><?php echo $article['Category']; ?></a>
											</td>
											<td class="align-middle border-top-0"><?php echo $article['date_posted'];?></td>
											<td class="align-middle border-top-0">						
												<?php echo $article['Article']; ?>																			
											</td>
											<td class="align-middle border-top-0">
												<?php $sts = $article['status']; ?>
												<?php if( $sts == "published") : ?>
													<span class="badge-dot bg-success mr-1 d-inline-block align-middle"></span>Published
												<?php elseif( $sts == "pending") : ?>			
													<span class="badge-dot bg-warning mr-1 d-inline-block align-middle"></span>Draft
												<?php endif;  ?>
											</td>
											<td class="text-muted align-middle border-top-0 text-right">
												<span class="dropdown dropleft">
												<a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown1">
												<span class="dropdown-header">Settings</span>
												<a class="dropdown-item" href="admin-edit-post.php?id=<?=$article['id_post']?>"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
												<a class="dropdown-item" href="all-post.php?Publish=<?=$article['id_post']?>"><i class="fe fe-toggle-left dropdown-item-icon"></i>Publish</a>
												<a class="dropdown-item" href="all-post.php?Unpublish=<?=$article['id_post']?>"><i class="fe fe-toggle-right dropdown-item-icon"></i>Unpublish</a>
												<a class="dropdown-item" href="all-post.php?id=<?=$article['id_post']?>" ><i class="fe fe-trash dropdown-item-icon"></i>Delete</a>
												</span>
												</span>
											</td>
										</tr>
										<?php endforeach; ?>
										</tbody>
										</table>
									</div>
								</div>

								<!-- Darft -->
								<div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
									<div class="table-responsive border-0">
										<table class="table mb-0 text-nowrap table-bordered table-striped">
										<thead>
										<tr>
											<th scope="col" class="border-0">No</th>
											<th scope="col" class="border-0">POST</th>
											<th scope="col" class="border-0">TYPE</th>
											<th scope="col" class="border-0">CATEGORY</th>
											<th scope="col" class="border-0">DATE</th>
											<th scope="col" class="border-0">Author</th>
											<th scope="col" class="border-0">STATUS</th>
											<th scope="col" class="border-0"></th>
										</tr>
										</thead>
										<tbody>
										<?php 
										$jumlahDataPerHalaman = 10;
										$sql = "SELECT * FROM blog ";
										$result = $dbh->prepare($sql);
										$result-> execute();
										$jumlahData = $result->rowCount();
										$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
										$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
										$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                               				$blog = DB::query("Select * from blog WHERE status = 'pending'  order by id_post desc LIMIT $awalData, $jumlahDataPerHalaman ");
                                			$id = 0;
                                			foreach ($blog as $article):
                                    		$id++;
											

                                			?>

										<!-- Table body -->
										<tr>
											<td>
											<?php echo $id; ?>
											</td>
											<td class="align-middle border-top-0">
												<h5 class="mb-0"><a href="#!" class="text-inherit"><?php echo $article['Title']; ?></a></h5>
											</td>
											<td class="align-middle border-top-0">
												<img width="80" alt="<?php echo $article['Title']; ?>" src="../uploads/post/<?php if(empty($article['Picture'])){echo 'blog_post_1.jpg';}else{echo $article['Picture'];} ?>">
											</td>
											<td class="align-middle border-top-0">
												<a href="#!" class="text-inherit"><?php echo $article['Category']; ?></a>
											</td>
											<td class="align-middle border-top-0"><?php echo $article['date_posted'];?></td>
											<td class="align-middle border-top-0">						
												<?php echo $article['Article']; ?>																			
											</td>
											<td class="align-middle border-top-0">
												<?php $sts = $article['status']; ?>
												<?php if( $sts == "published") : ?>
													<span class="badge-dot bg-success mr-1 d-inline-block align-middle"></span>Published
												<?php elseif( $sts == "pending") : ?>			
													<span class="badge-dot bg-warning mr-1 d-inline-block align-middle"></span>Draft
												<?php endif;  ?>
											</td>
											<td class="text-muted align-middle border-top-0 text-right">
												<span class="dropdown dropleft">
												<a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown1">
												<span class="dropdown-header">Settings</span>
												<a class="dropdown-item" href="admin-edit-post.php?id=<?=$article['id_post']?>"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
												<a class="dropdown-item" href="all-post.php?Publish=<?=$article['id_post']?>"><i class="fe fe-toggle-left dropdown-item-icon"></i>Publish</a>
												<a class="dropdown-item" href="all-post.php?Unpublish=<?=$article['id_post']?>"><i class="fe fe-toggle-right dropdown-item-icon"></i>Unpublish</a>
												<a class="dropdown-item" href="all-post.php?id=<?=$article['id_post']?>" ><i class="fe fe-trash dropdown-item-icon"></i>Delete</a>
												</span>
												</span>
											</td>
										</tr>
										<?php endforeach; ?>
										</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Card Footer -->
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