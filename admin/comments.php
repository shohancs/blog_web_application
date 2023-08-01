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

						<h6 class="mb-3 text-uppercase">Manage All Comments</h6><hr>

						<!-- ########## START: MAIN BODY ########## -->
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
										<thead class="table-dark">
											<tr>
												<th>Sl.</th>
												<th>Post Title</th>
												<th>User Name</th>
												<th>Comments</th>
												<th>Status</th>
												<th>Comments Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$readComment_sql = "SELECT * FROM comments WHERE status=1 ORDER BY cmt_id DESC";
												$readComment_query = mysqli_query( $db, $readComment_sql );
												$countData = mysqli_num_rows($readComment_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning text-center" role="alert">
													  Sorry! No Comments Found into the Database!
													</div>
												<?php }

												else{
													$i = 0;

													while ( $row = mysqli_fetch_assoc($readComment_query) ) {
															$cmt_id 		= $row['cmt_id'];
															$user_id 		= $row['user_id'];
															$post_id 		= $row['post_id'];
															$comments 		= $row['comments'];
															$status 		= $row['status'];
															$cmt_date 		= $row['cmt_date'];
															$i++;
															?>
															<tr>
														      <th scope="row"><?php echo $i; ?></th>
														      <td>
														      	<?php  
														      		$readUser_Sql = "SELECT * FROM users WHERE user_id='$user_id'";
														      		$readUser_Quary = mysqli_query($db, $readUser_Sql);

														      		while( $row = mysqli_fetch_assoc($readUser_Quary) ){
														      			$auth_id 	 = $row['user_id'];
														      			$auth_name = $row['fullname'];

														      			echo $auth_name;
														      		}

														      	?>
														      </td>
														      <td>
														      	<?php  
														      		$readPost_Sql = "SELECT * FROM post WHERE post_id='$post_id'";
														      		$readPost_Quary = mysqli_query($db, $readPost_Sql);

														      		while( $row = mysqli_fetch_assoc($readPost_Quary) ){
														      			$post_id 		= $row['post_id'];
																		$title 			= $row['title'];

														      			echo $title;
														      		}

														      	?>
														      </td>
														      <td><?php echo substr($comments, 0, 20); ?>...</td>
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
														      <td><?php echo $cmt_date; ?></td>
														      <td>
																	<div class="action-btn">
																	  <ul>
																	    <li>
																	      <a href="comments.php?do=Edit&u_id=<?php echo $cmt_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href="" data-bs-toggle="modal" data-bs-target="#postDel<?php echo $cmt_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	  </ul>
																	</div>

																	<!-- Modal Start -->
																	<!-- ########## START: MODAL PART ########## -->
										                        <div class="modal fade" id="postDel<?php echo $cmt_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										                          <div class="modal-dialog">
										                            <div class="modal-content">

										                              <div class="modal-header">
										                                <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $user_id; ?></span> Trash folder!!</h1>

										                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										                              </div>

										                              <div class="modal-body">
										                                <div class="modal-btn">
										                                  <a href="comments.php?do=Trash&delPostId=<?php echo $cmt_id; ?>" class="btn btn-danger me-3">Trash</a>
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

					else  if ( $do == "Edit" ) {
						if (isset($_GET['u_id'])) {
							$up_cmnt =  $_GET['u_id'];
							$up_cmnt_sql = "SELECT * FROM comments WHERE cmt_id='$up_cmnt'";
							$up_cmnt_query = mysqli_query($db, $up_cmnt_sql);

							while ($row = mysqli_fetch_assoc($up_cmnt_query)) {
								$cmt_id 		= $row['cmt_id'];
								$user_id 		= $row['user_id'];
								$post_id 		= $row['post_id'];
								$comments 		= $row['comments'];
								$status 		= $row['status'];
								$cmt_date 		= $row['cmt_date'];
								?>
								<!-- Top Icon -->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Tables</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="comments.php?do=Manage"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Data Table</li>
									</ol>
								</nav>
							</div>					
						</div>
						<!-- Top Icon -->

						<h6 class="mb-3 text-uppercase">Update Comments Information</h6><hr>

						<!-- ########## START: MAIN BODY ########## -->
						<div class="card">
							<div class="card-body">
								<form action="comments.php?do=Update" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Status</label>
												<select class="form-select" name="status" aria-label="">
												  <option value="1">Please Select the Active Status</option>
												  <option value="1" <?php if($status == 1){echo "selected";} ?>>Active</option>
												  <option value="0" <?php if($status == 0){echo "selected";} ?>>InActive</option>
												</select>
											</div>
										</div>

										<div class="col-lg-8">
											
																					

											<div class="mb-3">
												<div class="d-grid gap-2">
													<input type="hidden" name="commentId" value="<?php echo $up_cmnt; ?>">
													<input type="submit" name="updateComment" class="btn btn-primary" value="Save Changes">
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
						if (isset($_POST['updateComment'])) {
							$commentId 		= mysqli_real_escape_string($db, $_POST['commentId']);			
							$status 	= mysqli_real_escape_string($db, $_POST['status']);

							$commentUpdate_sql = "UPDATE comments SET  status='$status' WHERE cmt_id='$cmt_id' ";
							$commentUpdate_query = mysqli_query($db, $commentUpdate_sql);

							if ($commentsUpdate_query) {
								header("Location: comments.php?do=Manage");
							}
							else {
								die("mysqli Error!" . mysqli_error($db));
							}
						}
					}

					else if ( $do == "Trash" ) {
						if (isset($_GET['delPostId'])) {
							$deletePostId = $_GET['delPostId'];
							$trash_Sql = "UPDATE post SET status=0 WHERE post_id='$deletePostId'";
							$trash_query = mysqli_query($db, $trash_Sql);

							if ($trash_query) {
								header("Location: post.php?do=Manage");
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

						<h6 class="mb-3 text-uppercase">Manage All Comments</h6><hr>

						<!-- ########## START: MAIN BODY ########## -->
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
										<thead class="table-dark">
											<tr>
												<th>Sl.</th>
												<th>Post Title</th>
												<th>User Name</th>
												<th>Comments</th>
												<th>Status</th>
												<th>Comments Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$readComment_sql = "SELECT * FROM comments WHERE status=0 ORDER BY cmt_id DESC";
												$readComment_query = mysqli_query( $db, $readComment_sql );
												$countData = mysqli_num_rows($readComment_query);

												if ($countData == 0) { ?>
													<div class="alert alert-warning text-center" role="alert">
													  Sorry! No Comments Found into the Database!
													</div>
												<?php }

												else{
													$i = 0;

													while ( $row = mysqli_fetch_assoc($readComment_query) ) {
															$cmt_id 		= $row['cmt_id'];
															$user_id 		= $row['user_id'];
															$post_id 		= $row['post_id'];
															$comments 		= $row['comments'];
															$status 		= $row['status'];
															$cmt_date 		= $row['cmt_date'];
															$i++;
															?>
															<tr>
														      <th scope="row"><?php echo $i; ?></th>
														      <td>
														      	<?php  
														      		$readUser_Sql = "SELECT * FROM users WHERE user_id='$user_id'";
														      		$readUser_Quary = mysqli_query($db, $readUser_Sql);

														      		while( $row = mysqli_fetch_assoc($readUser_Quary) ){
														      			$auth_id 	 = $row['user_id'];
														      			$auth_name = $row['fullname'];

														      			echo $auth_name;
														      		}

														      	?>
														      </td>
														      <td>
														      	<?php  
														      		$readPost_Sql = "SELECT * FROM post WHERE post_id='$post_id'";
														      		$readPost_Quary = mysqli_query($db, $readPost_Sql);

														      		while( $row = mysqli_fetch_assoc($readPost_Quary) ){
														      			$post_id 		= $row['post_id'];
																		$title 			= $row['title'];

														      			echo $title;
														      		}

														      	?>
														      </td>
														      <td><?php echo substr($comments, 0, 20); ?>...</td>
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
														      <td><?php echo $cmt_date; ?></td>
														      <td>
																	<div class="action-btn">
																	  <ul>
																	    <li>
																	      <a href="comments.php?do=Edit&u_id=<?php echo $cmt_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href="" data-bs-toggle="modal" data-bs-target="#postDel<?php echo $cmt_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	  </ul>
																	</div>

																	<!-- Modal Start -->
																	<!-- ########## START: MODAL PART ########## -->
										                        <div class="modal fade" id="postDel<?php echo $cmt_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										                          <div class="modal-dialog">
										                            <div class="modal-content">

										                              <div class="modal-header">
										                                <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $user_id; ?></span></h1>

										                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										                              </div>

										                              <div class="modal-body">
										                                <div class="modal-btn">
										                                  <a href="comments.php?do=Delete&delPostId=<?php echo $cmt_id; ?>" class="btn btn-danger me-3">Delete</a>
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