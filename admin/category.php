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

						<!-- ########## START: MAIN TABLE ########## -->
						<div class="card">
							<div class="card-body">

								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
										<thead class="table-dark">
											<tr>
												<th>Sl.</th>
												<th>Cat_Name</th>
												<th>Description</th>
												<th>parent/sub Category</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$manage_sql = "SELECT * FROM category WHERE status=1 ORDER BY cat_name ASC";
												$manage_query = mysqli_query($db, $manage_sql);
												$countData = mysqli_num_rows($manage_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning" role="alert">
													  Sorry! No Data Found into the Database!
													</div>
												<?php }
												else {
													$i = 0;

													while($row = mysqli_fetch_assoc($manage_query)) {
														$cat_id 	= $row['cat_id'];
														$cat_name 	= $row['cat_name'];
														$cat_desc 	= $row['cat_desc'];
														$is_parent 	= $row['is_parent'];
														$status 	= $row['status'];
														$i++;
														?>
														<tr>
													      <th scope="row"><?php echo $i; ?></th>
													      <td><?php echo $cat_name; ?></td>
													      <td><?php echo $cat_desc; ?></td>
													      <td><?php echo $is_parent; ?></td>
													      <td>
													      	<?php  
																if ($status == 1) { ?>
																	<span class="badge text-bg-success">Active</span>
																<?php }
																else if ($status == 0) { ?>
																	<span class="badge text-bg-danger">InActive</span>
																<?php }
															?>
													      </td>
<td>
	<div class="action-btn">
	  <ul>
	    <li>
	      <a href="category.php?do=Edit&u_id=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
	    </li>
	    <li>
	      <a href="" data-bs-toggle="modal" data-bs-target="#catDel<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
	    </li>
	  </ul>
	</div>

	<!-- Modal Start -->
	<!-- ########## START: MODAL PART ########## -->
	<div class="modal fade" id="catDel<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span> Trash folder!!</h1>

	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <div class="modal-body">
	        <div class="modal-btn">
	          <a href="category.php?do=Trash&delCatId=<?php echo $cat_id; ?>" class="btn btn-danger me-3">Trash</a>
	          <a href="" class="btn btn-success" data-bs-dismiss="modal">Cancel</a>     
	        </div>
	      </div>

	    </div>
	  </div>
	</div>
	<!-- ########## END: MODAL PART ########## -->
	<!-- Modal End -->
</td>
													    </tr>
													<?php }

												}												
											?>
										    
										</tbody>
									</table>
								</div>

							</div>
						</div>				
						<!-- ########## END: MAIN TABLE ########## -->
						
					<?php }

					else if ( $do == "Add" ) {

					}

					else if ( $do == "Store" ) {

					}

					else if ( $do == "Edit" ) {

					}

					else if ( $do == "Update" ) {

					}

					else if ( $do == "ManageTrash" ) { ?>
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

						<!-- Main Table -->
						<h6 class="mb-3 text-uppercase">DataTable Example</h6>
						<hr>
						
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
										<thead class="table-dark">
											<tr>
												<th>Sl.</th>
												<th>Cat_Name</th>
												<th>Description</th>
												<th>parent/sub Category</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$manage_sql = "SELECT * FROM category WHERE status=0 ORDER BY cat_name ASC";
												$manage_query = mysqli_query($db, $manage_sql);
												$countData = mysqli_num_rows($manage_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning" role="alert">
													  Sorry! No Data Found into the Database!
													</div>
												<?php }

												else {
													$i = 0;

													while($row = mysqli_fetch_assoc($manage_query)) {
														$cat_id 	= $row['cat_id'];
														$cat_name 	= $row['cat_name'];
														$cat_desc 	= $row['cat_desc'];
														$is_parent 	= $row['is_parent'];
														$status 	= $row['status'];
														$i++;
														?>
														<tr>
													      <th scope="row"><?php echo $i; ?></th>
													      <td><?php echo $cat_name; ?></td>
													      <td><?php echo $cat_desc; ?></td>
													      <td><?php echo $is_parent; ?></td>
													      <td>
													      	<?php  
																if ($status == 1) { ?>
																	<span class="badge text-bg-success">Active</span>
																<?php }
																else if ($status == 0) { ?>
																	<span class="badge text-bg-danger">InActive</span>
																<?php }
															?>
													      </td>
<td>
	<div class="action-btn">
	  <ul>
	    <li>
	      <a href="category.php?do=Edit&u_id=<?php echo $cat_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
	    </li>
	    <li>
	      <a href="" data-bs-toggle="modal" data-bs-target="#catDel<?php echo $cat_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
	    </li>
	  </ul>
	</div>

	<!-- Modal Start -->
	<!-- ########## START: MODAL PART ########## -->
	<div class="modal fade" id="catDel<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete!! <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span></h1>

	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <div class="modal-body">
	        <div class="modal-btn">
	          <a href="category.php?do=Delete&delCatId=<?php echo $cat_id; ?>" class="btn btn-danger me-3">Delete</a>
	          <a href="" class="btn btn-success" data-bs-dismiss="modal">Cancel</a>     
	        </div>
	      </div>

	    </div>
	  </div>
	</div>
	<!-- ########## END: MODAL PART ########## -->
	<!-- Modal End -->
</td>
													    </tr>
													<?php }

												}

												
											?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- Main Table -->
					<?php }

					else if ( $do == "Delete" ) {

					}
				?>

			</div>
		</div>
	</div>
	<!--end page wrapper -->
		
<?php include"inc/footer.php"; ?>	