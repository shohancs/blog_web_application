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
												$manage_sql = "SELECT * FROM category WHERE is_parent=0 AND status=1 ORDER BY cat_name ASC";
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
													      <td>
													      	<?php  
																if ($is_parent == 0) { ?>
																	<span class="badge text-bg-primary">Parent Category</span>
																<?php }
															?>
													      </td>
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
													<?php 

													// Ek loper modde 2 loop chalaitaci
													// To Check the Sub Category
													$child_sql = "SELECT * FROM category WHERE is_parent='$cat_id' AND status=1 ORDER BY cat_name ASC";
													$child_query = mysqli_query($db, $child_sql);

													while($row = mysqli_fetch_assoc($child_query)) {
														$cat_id 	= $row['cat_id'];
														$cat_name 	= $row['cat_name'];
														$cat_desc 	= $row['cat_desc'];
														$is_parent 	= $row['is_parent'];
														$status 	= $row['status'];
														$i++;
														?>
															<tr>
													      <th scope="row"><?php echo $i; ?></th>
													      <td> -- <?php echo $cat_name; ?></td>
													      <td><?php echo $cat_desc; ?></td>
													      <td>
													      	<?php  
																if ($is_parent == 0) { ?>
																	<span class="badge text-bg-primary">Parent Category</span>
																<?php }
																else {
																	echo "Child category";
																}
															?>
													      </td>
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

														<?php
													}//Second while loop

												}//first while loop



												}												
											?>
										    
										</tbody>
									</table>
								</div>

							</div>
						</div>				
						<!-- ########## END: MAIN TABLE ########## -->
						
					<?php }

					else if ( $do == "Add" ) { ?>
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
								<form action="category.php?do=Store" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<div class="mb-3">
												<label for="">Category Name</label>
												<input type="text" name="catName" class="form-control" required autocomplete="off" autofocus placeholder="full name..">
											</div>

											<div class="mb-3">
												<label for="">Select the Parent Category [ If Any ]</label>
												<select class="form-select" name="is_parent" aria-label="">
												  <option>Please Select the Parent Category</option>
												  <?php  
												  	$sql = "SELECT * FROM category WHERE is_parent=0 AND status=1 ORDER BY cat_name ASC";
												  	$p_query = mysqli_query($db, $sql);

												  	while( $row = mysqli_fetch_assoc($p_query) ) {
												  		$p_id 	= $row['cat_id'];
												  		$p_name = $row['cat_name'];
												  		?>
					  									<option value="<?php echo $p_id; ?>"><?php echo $p_name; ?></option>
												  		<?php
												  	} 
												  ?>												  
												</select>
											</div>

											<div class="mb-3">
												<label for="">Status</label>
												<select class="form-select" name="status" aria-label="">
												  <option value="1">Please Select the User Status</option>
												  <option value="1">Active</option>
												  <option value="0">InActive</option>
												</select>
											</div>											
										</div>

										<div class="col-lg-6">

											<div class="mb-3">
												<label for="">Category Description</label>
												<textarea name="cat_desc" class="form-control"  autocomplete="off" autofocus id="editor1" placeholder="category description.."></textarea>
											</div>

											<div class="mb-3">
												<div class="d-grid gap-2">
													<input type="submit" name="addCategory" class="btn btn-primary">
												</div>
											</div>											
										</div>
									</div>
								</form>
							</div>
						</div>				
						<!-- ########## END: MAIN BODY ########## -->
					<?php }

					else if ( $do == "Store" ) {
						if (isset($_POST['addCategory'])) {
							$catName 		= mysqli_real_escape_string($db, $_POST['catName']);
							$is_parent 		= mysqli_real_escape_string($db, $_POST['is_parent']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);
							$cat_desc 		= mysqli_real_escape_string($db, $_POST['cat_desc']);

							$addCategorySql = "INSERT INTO category (cat_name, cat_desc, is_parent, status) VALUES ('$catName', '$cat_desc', '$is_parent', '$status')";
							$addCategoryQuery = mysqli_query($db, $addCategorySql);

							if ($addCategoryQuery) {
								header("Location: category.php?do=Manage");
							}
							else {
								die("mysqli Error!" . mysqli_error($db));
							}
							
						}	
					}

					else  if ( $do == "Edit" ) {
						if (isset($_GET['u_id'])) {
							$up_id =  $_GET['u_id'];
							$up_idSql = "SELECT * FROM category WHERE cat_id='$up_id'";
							$up_idQuery = mysqli_query($db, $up_idSql);

							while ($row = mysqli_fetch_assoc($up_idQuery)) {
								$cat_id 	= $row['cat_id'];
								$cat_name 	= $row['cat_name'];
								$cat_desc 	= $row['cat_desc'];
								$is_parent 	= $row['is_parent'];
								$status 	= $row['status'];
								?>
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
								<form action="category.php?do=Update" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<div class="mb-3">
												<label for="">Category Name</label>
												<input type="text" name="catName" class="form-control" required autocomplete="off" autofocus value="<?php echo $cat_name; ?>" >
											</div>

											<div class="mb-3">
												<label for="">Select the Parent Category [ If Any ]</label>
												<select class="form-select" name="is_parent" aria-label="">
												  <option>Please Select the Parent Category</option>
												  <?php  
												  	$sql = "SELECT * FROM category WHERE is_parent=0 AND status=1 ORDER BY cat_name ASC";
												  	$p_query = mysqli_query($db, $sql);

												  	while( $row = mysqli_fetch_assoc($p_query) ) {
												  		$p_id 	= $row['cat_id'];
												  		$p_name = $row['cat_name'];
												  		?>
															<option value="<?php echo $p_id; ?>" <?php if($p_id == $is_parent){echo "selected";} ?>><?php echo $p_name; ?></option>
												  		<?php
												  	} 
												  ?>												  
												</select>
											</div>

											<div class="mb-3">
												<label for="">Status</label>
												<select class="form-select" name="status" aria-label="">
												  <option value="">Please Select the User Status</option>
												  <option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
												  <option value="0" <?php if( $status == 0 ) { echo "selected"; } ?>>InActive</option>
												</select>
											</div>											
										</div>

										<div class="col-lg-6">

											<div class="mb-3">
												<label for="">Category Description</label>
												<textarea name="cat_desc" class="form-control"  autocomplete="off" autofocus id="editor1" placeholder="category description.."><?php echo $cat_desc; ?></textarea>
											</div>

											<div class="mb-3">
												<div class="d-grid gap-2">
													<input type="hidden" name="updateCategoryId" value="<?php echo $cat_id; ?>">
													<input type="submit" name="updateCategory" class="btn btn-primary">
												</div>
											</div>										
										</div>
									</div>
								</form>
							</div>
						</div>				
						<!-- ########## END: MAIN BODY ########## -->
							<?php }
						}
					}

					else if ( $do == "Update" ) {
						if (isset($_POST['updateCategory'])) {
							$updateCategoryId 	= mysqli_real_escape_string($db, $_POST['updateCategoryId']);
							$catName 			= mysqli_real_escape_string($db, $_POST['catName']);
							$is_parent 			= mysqli_real_escape_string($db, $_POST['is_parent']);
							$status 			= mysqli_real_escape_string($db, $_POST['status']);
							$cat_desc 			= mysqli_real_escape_string($db, $_POST['cat_desc']);

							$updateCategorySql = "UPDATE category SET cat_name='$catName', cat_desc='$cat_desc', is_parent='$is_parent', status='$status' WHERE cat_id='$updateCategoryId' ";
								$updateCategoryQuery = mysqli_query($db, $updateCategorySql);

								if ($updateCategoryQuery) {
									header("Location: category.php?do=Manage");
								}
								else {
									die("mysqli Error!" . mysqli_error($db));
								}
						}
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
													      <td>
													      	<?php  
																if ($is_parent == 0) { ?>
																	<span class="badge text-bg-primary">Parent</span>
																<?php }
															?>
													      </td>
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
																        <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span></h1>

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