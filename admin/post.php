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
												<th>Name</th>
												<th>Email</th>
												<th>Phone No.</th>
												<th>Address</th>
												<th>Role</th>
												<th>Status</th>
												<th>Join Date</th>
												<th>Action</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										    <tr>
										      <th scope="row">1</th>
										      <td>Mark</td>
										      <td>Otto</td>
										      <td>mdo</td>
										      <td>mdo</td>
										      <td>mdo</td>
										      <td>mdo</td>
										      <td>mdo</td>
										      <td>mdo</td>
										      <td>mdo</td>
										      <td>mdo</td>
										    </tr>
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
				?>

			</div>
		</div>
	</div>
	<!--end page wrapper -->
		
<?php include"inc/footer.php"; ?>	