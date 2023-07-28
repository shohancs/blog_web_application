<?php include"inc/header.php"; ?>

	<div class="page-wrapper">
		<div class="page-content">

			<div class="row row-cols-1 row-cols-md-12 row-cols-xl-12">

				<?php  
					$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

					if ( $do == "Manage" ) { ?>
						<!-- Top Icon -->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Tables</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Data Table</li>
									</ol>
								</nav>
							</div>					
						</div>
						<!-- Top Icon -->

						<h6 class="mb-3 text-uppercase">DataTable Example</h6><hr>

						<!-- ########## START: MAIN BODY ########## -->
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
										<thead class="table-dark">
											<tr>
												<th>Sl.</th>
												<th>Image</th>
												<th>Title</th>
												<th>Category</th>
												<th>Author</th>
												<th>Status</th>
												<th>Post Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$readPost_sql = "SELECT * FROM post WHERE status=1 ORDER BY post_id ASC";
												$readPost_query = mysqli_query( $db, $readPost_sql );
												$countData = mysqli_num_rows($readPost_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning text-center" role="alert">
													  Sorry! No Data Found into the Database!
													</div>
												<?php }

												else{
													$i = 0;

													while ( $row = mysqli_fetch_assoc($readPost_query) ) {
														$post_id 		= $row['post_id'];
														$title 			= $row['title'];
														$post_desc 		= $row['post_desc'];
														$image 			= $row['image'];
														$category_id 	= $row['category_id'];
														$author_id 		= $row['author_id'];
														$tags 			= $row['tags'];
														$status 		= $row['status'];
														$post_date 		= $row['post_date'];
														$i++;
														?>
														<tr>
													      <th scope="row"><?php echo $i; ?></th>
													      <td><?php echo $title; ?></td>
													      <td><?php echo $post_desc; ?></td>
													      <td><?php echo $image; ?></td>
													      <td><?php echo $category_id; ?></td>
													      <td><?php echo $author_id; ?></td>
													      <td><?php echo $tags; ?></td>
													      <td><?php echo $status; ?></td>
													      <td><?php echo $post_date; ?></td>
													    </tr>
														<?php
													}
												}
												

											?>										    
										</tbody>
							</div>
						</div>				
						<!-- ########## END: MAIN BODY ########## -->
					<?php }

					else if ( $do == "Add" ) {
						// code...
					}

					else if ( $do == "Store" ) {
						// code...
					}

					else if ( $do == "Edit" ) {
						// code...
					}

					else if ( $do == "Update" ) {
						// code...
					}

					else if ( $do == "Trash" ) {
						// code...
					}

					else if ( $do == "ManageTrash" ) {
						// code...
					}

					else if ( $do == "Delete" ) {
						// code...
					}

					else { ?>
						<div class="alert alert-info" role="alert">
						  404 Page Not Found. Sorry!! You are trying to wrong access.
						</div>
					<?php }
				?>

			</div>
		</div>
	</div>
	<!--end page wrapper -->
		
<?php include"inc/footer.php"; ?>	