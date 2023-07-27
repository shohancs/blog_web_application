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
												<th>Image</th>
												<th>Name</th>
												<th>Email</th>
												<th>Phone No.</th>
												<th>Address</th>
												<th>Role</th>
												<th>Status</th>
												<th>Join Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$usersReadsql = "SELECT * FROM users WHERE status=1 ORDER BY fullname ASC";
												$usersRead = mysqli_query($db, $usersReadsql);
												$countData = mysqli_num_rows($usersRead);

												if ($countData == 0) { ?>
													<div class="alert alert-warning" role="alert">
													  Sorry! No Data Found into the Database!
													</div>
												<?php }

												else {
													$i = 0;
													while ($row = mysqli_fetch_assoc($usersRead)) {
														$user_id 	= $row['user_id'];
														$fullname 	= $row['fullname'];
														$email 		= $row['email'];
														$password 	= $row['password'];
														$phone 		= $row['phone'];
														$address 	= $row['address'];
														$role 		= $row['role'];
														$status 	= $row['status'];
														$image 		= $row['image'];
														$join_date 	= $row['join_date'];
														$i++;
														?>
															<tr>
																<td><?php echo $i; ?></td>
<td>
	<?php 
		if (!empty($image)) {
			echo '<img src="assets/images/users/' . $image . '" style="width: 40px;">';
		}
		else {
			echo '<img src="assets/images/users/default.jpg" style="width: 40px; ">';
		}
	?>
</td>
																<td><?php echo $fullname; ?></td>
																<td><?php echo $email; ?></td>
																<td><?php echo $phone; ?></td>
																<td><?php echo $address; ?></td>
																<td>
																	<?php  
																		if ($role == 1) { ?>
																			<span class="badge text-bg-primary">Admin</span>
																		<?php }
																		else if ($role == 2) { ?>
																			<span class="badge text-bg-warning">User</span>
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
																<td><?php echo $join_date; ?></td>
																<td>
																	<div class="action-btn">
																	  <ul>
																	    <li>
																	      <a href="users.php?do=Edit&u_id=<?php echo $user_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href="" data-bs-toggle="modal" data-bs-target="#userDel<?php echo $user_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	  </ul>
																	</div>

																	<!-- Modal Start -->
																	<!-- ########## START: MODAL PART ########## -->
										                        <div class="modal fade" id="userDel<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										                          <div class="modal-dialog">
										                            <div class="modal-content">

										                              <div class="modal-header">
										                                <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $fullname; ?></span> Trash folder!!</h1>

										                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										                              </div>

										                              <div class="modal-body">
										                                <div class="modal-btn">
										                                  <a href="users.php?do=Trash&deluserId=<?php echo $user_id; ?>" class="btn btn-danger me-3">Trash</a>
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
								<form action="users.php?do=Store" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Full Name</label>
												<input type="text" name="fullname" class="form-control" required autocomplete="off" autofocus placeholder="full name..">
											</div>

											<div class="mb-3">
												<label for="">Email Address</label>
												<input type="email" name="email" class="form-control" required autocomplete="off" autofocus placeholder="email address..">
											</div>

											<div class="mb-3">
												<label for="">Password</label>
												<input type="password" name="password" class="form-control" required autocomplete="off" autofocus placeholder="password..">
											</div>

											<div class="mb-3">
												<label for="">Re-type Password</label>
												<input type="password" name="re_password" class="form-control" required autocomplete="off" autofocus placeholder="re-type password..">
											</div>
										</div>

										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Phone No.</label>
												<input type="tel" name="phone" class="form-control" required autocomplete="off" autofocus  placeholder="phone no..">
											</div>

											<div class="mb-3">
												<label for="">Address</label>
												<textarea name="address" class="form-control" autocomplete="off" autofocus cols="30" rows="7"  placeholder="address.."></textarea>
											</div>

											
										</div>
										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Role</label>
												<select class="form-select" name="role" aria-label="">
												  <option value="2">Please Select the User Role</option>
												  <option value="1">Admin</option>
												  <option value="2">User</option>
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

											<div class="mb-3">
												<label for="">Image</label>
												<input type="file" name="image" class="form-control" >
											</div>

											<div class="mb-3">
												<div class="d-grid gap-2">
													<input type="submit" name="addUser" class="btn btn-primary">
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
						if (isset($_POST['addUser'])) {
							$fullname 		= mysqli_real_escape_string($db, $_POST['fullname']);
							$email 			= mysqli_real_escape_string($db, $_POST['email']);
							$password 		= mysqli_real_escape_string($db, $_POST['password']);
							$re_password 	= mysqli_real_escape_string($db, $_POST['re_password']);
							$phone 			= mysqli_real_escape_string($db, $_POST['phone']);
							$address 		= mysqli_real_escape_string($db, $_POST['address']);
							$role 			= mysqli_real_escape_string($db, $_POST['role']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							$image 			= $_FILES['image']['name'];
							$temp_image 	= $_FILES['image']['tmp_name'];

							if ($password == $re_password) {
								$hassedPass = sha1($password);

								if (!empty($image)) {
									$img = rand(1, 9999999). "-" . $image;
									move_uploaded_file($temp_image, 'assets/images/users/' . $img);
								}
								else {
									$img = '';
								}
								
								$addUserSql = "INSERT INTO users (fullname, email, password, phone, address, role, status, image, join_date) VALUES ('$fullname', '$email', '$hassedPass', '$phone', '$address', '$role', '$status', '$img', now() )";
								$addUserQuery = mysqli_query($db, $addUserSql);

								if ($addUserQuery) {
									header("Location: users.php?do=Manage");
								}
								else {
									die("mysqli Error!" . mysqli_error($db));
								}

							}

							else { ?>
								<div class="alert alert-warning" role="alert">
								  Please enter same password and repassword!!
								</div>
							<?php }
						}

	
					}

					else  if ( $do == "Edit" ) {
						if (isset($_GET['u_id'])) {
							$up_id =  $_GET['u_id'];
							$up_idSql = "SELECT * FROM users WHERE user_id='$up_id'";
							$up_idQuery = mysqli_query($db, $up_idSql);

							while ($row = mysqli_fetch_assoc($up_idQuery)) {
								$user_id 	= $row['user_id'];
								$fullname 	= $row['fullname'];
								$email 		= $row['email'];
								$password 	= $row['password'];
								$phone 		= $row['phone'];
								$address 	= $row['address'];
								$role 		= $row['role'];
								$status 	= $row['status'];
								$image 		= $row['image'];
								$join_date 	= $row['join_date'];
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
								<form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Full Name</label>
												<input type="text" name="fullname" class="form-control" required autocomplete="off" autofocus placeholder="full name.." value="<?php echo $fullname; ?>">
											</div>

											<div class="mb-3">
												<label for="">Email Address</label>
												<input type="email" name="email" class="form-control" required autocomplete="off" autofocus placeholder="email address.." value="<?php echo $email; ?>">
											</div>

											<div class="mb-3">
												<label for="">Password</label>
												<input type="password" name="password" class="form-control" autocomplete="off" autofocus placeholder="*******">
											</div>

											<div class="mb-3">
												<label for="">Re-type Password</label>
												<input type="password" name="re_password" class="form-control" autocomplete="off" autofocus placeholder="*******">
											</div>
										</div>

										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Phone No.</label>
												<input type="tel" name="phone" class="form-control" required autocomplete="off" autofocus  placeholder="phone no.." value="<?php echo $phone; ?>">
											</div>

											<div class="mb-3">
												<label for="">Address</label>
												<textarea name="address" class="form-control" autocomplete="off" autofocus cols="30" rows="7"  placeholder="address.."><?php echo $address; ?></textarea>
											</div>

											
										</div>
										<div class="col-lg-4">
											<div class="mb-3">
												<label for="">Role</label>
												<select class="form-select" name="role" aria-label="">
												  <option>Please Select the User Role</option>
												  <option value="1" <?php if ($role == 1) { echo "selected"; } ?>>Admin</option>
												  <option value="2" <?php if ($role == 2) { echo "selected"; } ?>>User</option>
												</select>
											</div>

											<div class="mb-3">
												<label for="">Status</label>
												<select class="form-select" name="status" aria-label="">
												  <option value="1">Please Select the User Status</option>
												  <option value="1" <?php if ($status == 1) { echo "selected"; } ?>>Active</option>
												  <option value="0" <?php if ($status == 0) { echo "selected"; } ?>>InActive</option>
												</select>
											</div>

											<div class="mb-3">
												<label for="">Image</label>
												<input type="file" name="image" class="form-control" >
											</div>

											<div class="mb-3">
												<div class="d-grid gap-2">
													<input type="hidden" name="updateUserId" value="<?php echo $user_id; ?>">
													<input type="submit" name="updateUser" class="btn btn-primary">
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
						if (isset($_POST['updateUser'])) {
							$updateUserId 	= mysqli_real_escape_string($db, $_POST['updateUserId']);
							$fullname 		= mysqli_real_escape_string($db, $_POST['fullname']);
							$email 			= mysqli_real_escape_string($db, $_POST['email']);
							$password 		= mysqli_real_escape_string($db, $_POST['password']);
							$re_password 	= mysqli_real_escape_string($db, $_POST['re_password']);
							$phone 			= mysqli_real_escape_string($db, $_POST['phone']);
							$address 		= mysqli_real_escape_string($db, $_POST['address']);
							$role 			= mysqli_real_escape_string($db, $_POST['role']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							// With Password
							if (!empty($password)) {
								if ($password == $re_password) {
									$hassedPass = sha1($password);

								$updateUserSql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status' WHERE user_id='$updateUserId' ";
								$updateUserQuery = mysqli_query($db, $updateUserSql);

								if ($updateUserQuery) {
									header("Location: users.php?do=Manage");
								}
								else {
									die("mysqli Error!" . mysqli_error($db));
								}

								}
							}

							// Without Password
							else {
								$updateUserSql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status' WHERE user_id='$updateUserId' ";
								$updateUserQuery = mysqli_query($db, $updateUserSql);

								if ($updateUserQuery) {
									header("Location: users.php?do=Manage");
								}
								else {
									die("mysqli Error!" . mysqli_error($db));
								}
							}
						}
					}
					

					else if ( $do == "Trash" ) {
						if (isset($_GET['deluserId'])) {
							$deleteUserId = $_GET['deluserId'];
							$trash_Sql = "UPDATE users SET status=0 WHERE user_id='$deleteUserId'";
							$trash_query = mysqli_query($db, $trash_Sql);

							if ($trash_query) {
								header("Location: users.php?do=Manage");
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
												<th>Image</th>
												<th>Name</th>
												<th>Email</th>
												<th>Phone No.</th>
												<th>Address</th>
												<th>Role</th>
												<th>Status</th>
												<th>Join Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  
												$usersReadsql = "SELECT * FROM users WHERE status=0 ORDER BY fullname ASC";
												$usersRead = mysqli_query($db, $usersReadsql);
												$countData = mysqli_num_rows($usersRead);

												if ($countData == 0) { ?>
													<div class="alert alert-warning" role="alert">
													  Sorry! No Data Found into the Database!
													</div>
												<?php }

												else {
													$i = 0;
													while ($row = mysqli_fetch_assoc($usersRead)) {
														$user_id 	= $row['user_id'];
														$fullname 	= $row['fullname'];
														$email 		= $row['email'];
														$password 	= $row['password'];
														$phone 		= $row['phone'];
														$address 	= $row['address'];
														$role 		= $row['role'];
														$status 	= $row['status'];
														$image 		= $row['image'];
														$join_date 	= $row['join_date'];
														$i++;
														?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $image; ?></td>
																<td><?php echo $fullname; ?></td>
																<td><?php echo $email; ?></td>
																<td><?php echo $phone; ?></td>
																<td><?php echo $address; ?></td>
																<td>
																	<?php  
																		if ($role == 1) { ?>
																			<span class="badge text-bg-primary">Admin</span>
																		<?php }
																		else if ($role == 2) { ?>
																			<span class="badge text-bg-warning">User</span>
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
																<td><?php echo $join_date; ?></td>
																<td>
																	<div class="action-btn">
																	  <ul>
																	    <li>
																	      <a href="users.php?do=Edit&u_id=<?php echo $user_id; ?>"><i class="fa-regular fa-pen-to-square edit"></i></a>
																	    </li>
																	    <li>
																	      <a href="" data-bs-toggle="modal" data-bs-target="#userDel<?php echo $user_id; ?>"><i class="fa-regular fa-trash-can trush"></i></a>
																	    </li>
																	  </ul>
																	</div>

																	<!-- Modal Start -->
																	<!-- ########## START: MODAL PART ########## -->
										                        <div class="modal fade" id="userDel<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										                          <div class="modal-dialog">
										                            <div class="modal-content">

										                              <div class="modal-header">
										                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $fullname; ?></span>!!</h1>

										                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										                              </div>

										                              <div class="modal-body">
										                                <div class="modal-btn">
										                                  <a href="users.php?do=Delete&deluserId=<?php echo $user_id; ?>" class="btn btn-danger me-3">Delete</a>
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
						if (isset($_GET['deluserId'])) {
							$deleteUserData = $_GET['deluserId'];
							$delete_Sql = "DELETE FROM users WHERE user_id='$deleteUserData'";
							$delete_query = mysqli_query($db, $delete_Sql);

							if ($delete_query) {
								header("Location: users.php?do=Manage");
							}
							else {
								die("mysqli Error!" . mysqli_error($db));
							}
						}
					}

					else { ?>
						<div class="alert alert-info" role="alert">
						  404 Page Not Found. Sorry!! You are trying to wrong access.
						</div>;
					<?php }
				?>

			</div>
		</div>
	</div>
	<!--end page wrapper -->
		
<?php include"inc/footer.php"; ?>	