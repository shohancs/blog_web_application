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
												$readPost_sql = "SELECT * FROM post WHERE status=1 ORDER BY post_id DESC";
												$readPost_query = mysqli_query( $db, $readPost_sql );
												$countData = mysqli_num_rows($readPost_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning text-center" role="alert">
													  Sorry! No Post Found into the Database!
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
															  <td>
																<?php 
																	if (!empty($image)) {
																		echo '<img src="assets/images/posts/' . $image . '" style="width: 40px;">';
																	}
																	else {
																		echo '<img src="assets/images/posts/default.png" style="width: 40px; ">';
																	}
																?>
															  </td>
														      <td><?php echo $category_id; ?></td>
														      <td><?php echo $author_id; ?></td>
														      <td><?php echo $tags; ?></td>
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
														      <td><?php echo $post_date; ?></td>
														      <td>
																	<div class="action-btn">
																	  <ul>
																	    <li>
																	      <a href="post.php?do=Edit&u_id=<?php echo $post_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href="" data-bs-toggle="modal" data-bs-target="#postDel<?php echo $post_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	  </ul>
																	</div>

																	<!-- Modal Start -->
																	<!-- ########## START: MODAL PART ########## -->
										                        <div class="modal fade" id="postDel<?php echo $post_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										                          <div class="modal-dialog">
										                            <div class="modal-content">

										                              <div class="modal-header">
										                                <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span> Trash folder!!</h1>

										                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										                              </div>

										                              <div class="modal-body">
										                                <div class="modal-btn">
										                                  <a href="post.php?do=Trash&delPostId=<?php echo $post_id; ?>" class="btn btn-danger me-3">Trash</a>
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
													}
												}
												

											?>										    
										</tbody>
									</table>
							</div>
						</div>				
						<!-- ########## END: MAIN BODY ########## -->
					<?php }

					else if ( $do == "Add" ) { ?>
						<!-- Top Icon -->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Tables</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="post.php?do=Manage"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Data Table</li>
									</ol>
								</nav>
							</div>					
						</div>
						<!-- Top Icon -->

						<h6 class="mb-3 text-uppercase">Add New Post</h6><hr>

						<!-- ########## START: MAIN BODY ########## -->
						<div class="card">
							<div class="card-body">
								<form action="users.php?do=Store" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Post Title</label>
												<input type="text" name="title" class="form-control" required autocomplete="off" autofocus placeholder="full name..">
											</div>

											<div class="mb-3">
												<label for="">Category Name</label>
												<select class="form-select" name="cate_id">
												  <option value="">Please Select the Category</option>
												  <?php  
												  	$sql = "SELECT * FROM category WHERE is_parent=0 AND status=1";
												  	$read = mysqli_query($db, $sql);

												  	while ($row = mysqli_fetch_assoc($read)) {
												  		$pcat_id 	= $row['cat_id'];
												  		$pcat_name 	= $row['cat_name'];
												  		?>
														<option value="<?php echo $pcat_id; ?>"><?php echo $pcat_name; ?></option>
												  		<?php
												  		// for sub Category
												  		$sub_sql = "SELECT * FROM category WHERE is_parent=$pcat_id AND status=1";
													  	$read_sub = mysqli_query($db, $sub_sql);

													  	while ($row = mysqli_fetch_assoc($read_sub)){
													  		$ccat_id 	= $row['cat_id'];
												  			$ccat_name 	= $row['cat_name'];
												  			?>
												  			<option value="<?php echo $ccat_id; ?>"><?php echo " -- " . $ccat_name; ?></option>
												  			<?php 
													  	}
												  	}
												  ?>
												  
												</select>
											</div>

											<div class="mb-3">
												<label for="">Meta Tags</label>
												<input type="text" name="tags" class="form-control" required autocomplete="off" autofocus placeholder="meta tag..">
											</div>

											<div class="mb-3">
												<label for="">Status</label>
												<select class="form-select" name="status" aria-label="">
												  <option value="1">Please Select the User Status</option>
												  <option value="1">Active</option>
												  <option value="0">InActive</option>
												</select>
											</div>

											<div class="mb-3">
												<label for="">Image</label>
												<input type="file" name="image" class="form-control" >
											</div>
										</div>

										<div class="col-lg-8">
											
											<div class="mb-3">
												<label for="">Description</label>
												<textarea name="post_desc" class="form-control"  autocomplete="off" autofocus id="editor1" placeholder="category description.."></textarea>
											</div>											

											<div class="mb-3">
												<div class="d-grid gap-2">
													<input type="submit" name="addPost" class="btn btn-primary" value="Add New Post">
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
						if (isset($_POST['addPost'])) {
							$title 		= mysqli_real_escape_string($db, $_POST['title']);
							$cate_id 	= mysqli_real_escape_string($db, $_POST['cate_id']);
							$tags 		= mysqli_real_escape_string($db, $_POST['tags']);
							$status 	= mysqli_real_escape_string($db, $_POST['status']);
							$image 		= mysqli_real_escape_string($db, $_POST['image']);
							$post_desc 	= mysqli_real_escape_string($db, $_POST['post_desc']);
						}
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
												$readPost_sql = "SELECT * FROM post WHERE status=0 ORDER BY post_id DESC";
												$readPost_query = mysqli_query( $db, $readPost_sql );
												$countData = mysqli_num_rows($readPost_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning text-center" role="alert">
													  Sorry! No Post Found into the Database!
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
															  <td>
																<?php 
																	if (!empty($image)) {
																		echo '<img src="assets/images/posts/' . $image . '" style="width: 40px;">';
																	}
																	else {
																		echo '<img src="assets/images/posts/default.png" style="width: 40px; ">';
																	}
																?>
															  </td>
														      <td><?php echo $category_id; ?></td>
														      <td><?php echo $author_id; ?></td>
														      <td><?php echo $tags; ?></td>
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
														      <td><?php echo $post_date; ?></td>
														      <td>
																	<div class="action-btn">
																	  <ul>
																	    <li>
																	      <a href="post.php?do=Edit&u_id=<?php echo $post_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href="" data-bs-toggle="modal" data-bs-target="#postDel<?php echo $post_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	  </ul>
																	</div>

																	<!-- Modal Start -->
																	<!-- ########## START: MODAL PART ########## -->
										                        <div class="modal fade" id="postDel<?php echo $post_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										                          <div class="modal-dialog">
										                            <div class="modal-content">

										                              <div class="modal-header">
										                                <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $title; ?></span></h1>

										                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										                              </div>

										                              <div class="modal-body">
										                                <div class="modal-btn">
										                                  <a href="post.php?do=Delete&delPostId=<?php echo $post_id; ?>" class="btn btn-danger me-3">Delete</a>
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
													}
												}
												

											?>										    
										</tbody>
									</table>
							</div>
						</div>				
						<!-- ########## END: MAIN BODY ########## -->
					<?php }

					else if ( $do == "Delete" ) {
						if (isset($_GET['delPostId'])) {
							$deletePostData = $_GET['delPostId'];
							$delete_Sql = "DELETE FROM post WHERE post_id='$deletePostData'";
							$delete_query = mysqli_query($db, $delete_Sql);

							if ($delete_query) {
								header("Location: post.php?do=Manage");
							}
							else {
								die("mysqli Error!" . mysqli_error($db));
							}
						}
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