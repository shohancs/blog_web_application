<?php 
	include "inc/header.php";
?>

	<div role="main" class="main">

		<?php  
			if (isset($_GET['uid'])) {
				$update_us_id = $_GET['uid'];
				$up_idSql = "SELECT * FROM users WHERE user_id='$update_us_id'";
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

					<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
						<div class="container">
							<div class="row">

								<div class="col-md-12 align-self-center p-static order-2 text-center">

									<h1 class="text-dark font-weight-bold text-8">Update User</h1>
									<span class="sub-title text-dark">Check out our Latest News!</span>
								</div>

								<div class="col-md-12 align-self-center order-1">

									<ul class="breadcrumb d-block text-center">
										<li><a href="index.php">Home</a></li>
										<li class="active">Update</li>
									</ul>
								</div>
							</div>
						</div>
					</section>

					<section>
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<!-- ########## START: MAIN BODY ########## -->
									<div class="card">
										<div class="card-body" style="box-shadow: 1px 10px 15px #ccc; border-top: 4px solid #08c;; border-radius: 5px; color: #000; background: #F7F7F7; font-size: 16px;">

											<form action="" method="POST" enctype="multipart/form-data">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group">
															<label for="">Full Name</label>
															<input type="text" name="fullname" class="form-control" required autocomplete="off" autofocus value="<?php echo $fullname; ?>">
														</div>

														<div class="form-group">
															<label for="">Email Address</label>
															<input type="email" name="email" class="form-control" required autocomplete="off" autofocus value="<?php echo $email; ?>">
														</div>

														<div class="form-group">
															<label for="">Password</label>
															<input type="password" name="password" class="form-control" autocomplete="off" autofocus placeholder="password..">
														</div>

														<div class="form-group">
															<label for="">Re-type Password</label>
															<input type="password" name="re_password" class="form-control" autocomplete="off" autofocus placeholder="re-type password..">
														</div>
													</div>

													<div class="col-lg-4">
														<div class="form-group">
															<label for="">Phone No.</label>
															<input type="tel" name="phone" class="form-control" required autocomplete="off" autofocus  value="<?php echo $phone; ?>">
														</div>

														<div class="form-group">
															<label for="">Address</label>
															<textarea name="address" class="form-control" autocomplete="off" autofocus cols="30" rows="7"><?php echo $address; ?></textarea>
														</div>

														
													</div>

													<div class="col-lg-4">

														<div class="mb-3">
															<!-- User Role -->
															<input type="hidden" value="2" name="role">
														</div>

														<div class="mb-3">
															<!-- Status -->
															<input type="hidden" value="1" name="status">
														</div>

														<div class="form-group">
															<label for="">Image</label>
															<br>
															<?php 
																if (!empty($image)) {
																	echo '<img src="admin/assets/images/users/' . $image . '" style="width: 60px;">';
																}
																else {
																	echo '<p>No Picture Uploaded!</p>';
																}
															?>	
															<input type="file" name="image" class="form-control-file">
														</div>

														<div class="form-group">
															<input type="hidden" name="updateUserId" value="<?php echo $user_id; ?>">
															<input type="submit" name="updateUser" class="btn btn-primary btn-lg btn-block">
														</div>
													</div>
												</div>
											</form>

											<?php  
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

	$image 			= $_FILES['image']['name'];
	$temp_image 	= $_FILES['image']['tmp_name'];

// Both for Password and Picture with all data change
if (!empty($password) && !empty($image)) {
	if ($password == $re_password) {
		$hassedPass = sha1($password);

		// Delete if image already exists
			$query = "SELECT * FROM users WHERE user_id = '$updateUserId'";
			$oldImage = mysqli_query($db, $query);

			while ($row = mysqli_fetch_assoc($oldImage)) {
				$existingImage = $row['image'];
				unlink("admin/assets/images/users/$img" . $existingImage);
			}

		$img = rand(1, 9999999). "-" . $image;
		move_uploaded_file($temp_image, 'admin/assets/images/users/' . $img);

		$updateUserSql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status', image='$img' WHERE user_id='$updateUserId' ";
		$updateUserQuery = mysqli_query($db, $updateUserSql);

		if ($updateUserQuery) {
			header("Location: index.php");
		}
		else {
			die("mysqli Error!" . mysqli_error($db));
		}

	}
}

// Shudu Password Dibo Image Divo na
else if (!empty($password) && empty($image)) {
	if ($password == $re_password) {
		$hassedPass = sha1($password);

	$updateUserSql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status' WHERE user_id='$updateUserId' ";
	$updateUserQuery = mysqli_query($db, $updateUserSql);

	if ($updateUserQuery) {
		header("Location: index.php");
	}
	else {
		die("mysqli Error!" . mysqli_error($db));
	}

	}
}


// Shudu Image Dibo PASSword Divo na
else if (empty($password) && !empty($image)) {

		// Delete if image already exists
			$query = "SELECT * FROM users WHERE user_id = '$updateUserId'";
			$oldImage = mysqli_query($db, $query);

			while ($row = mysqli_fetch_assoc($oldImage)) {
				$existingImage = $row['image'];
				unlink("admin/assets/images/users/$img" . $existingImage);
			}

		$img = rand(1, 9999999). "-" . $image;
		move_uploaded_file($temp_image, 'admin/assets/images/users/' . $img);

	$updateUserSql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', role='$role', status='$status', image='$img' WHERE user_id='$updateUserId' ";
	$updateUserQuery = mysqli_query($db, $updateUserSql);

	if ($updateUserQuery) {
		header("Location: index.php");
	}
	else {
		die("mysqli Error!" . mysqli_error($db));
	}
}

// Password and Image Kicui divo na
else {
	$updateUserSql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', role='$role', status='$status' WHERE user_id='$updateUserId' ";
	$updateUserQuery = mysqli_query($db, $updateUserSql);

	if ($updateUserQuery) {
		header("Location: index.php");
	}
	else {
		die("mysqli Error!" . mysqli_error($db));
	}
}


}
											?>

											

										</div>
									</div>				
									<!-- ########## END: MAIN BODY ########## -->
								</div>
							</div>
						</div>
					</section>
				<?php }
			}
		?>




	</div>

<?php 
	include "inc/footer.php";
?>