<?php
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<button href="#" type="button" data-toggle="modal" data-target="#addstaff" class="btn btn-success"><i
				class="fas fa-plus"></i> Add Staff</button>
	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				Our Staff
			</h6>
		</div>

		<div class="card-body">

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Begin Page Content -->
					<div class="container-fluid">


						<div class="card-body">
							<div class="table-responsive">
								<table class="table " id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Id</th>
											<th>Name</th>
											<th>email</th>
											<th>phone</th>
											<th>Address</th>
											<th>Occupation</th>
											<th>action</th>
										</tr>
									</thead>
									<tbody>

										<?php
								// delete item
								if(isset($_REQUEST["delete"]))
								{
								
									$sqlD = "DELETE FROM `staff_tb` where `staff_id` = '{$_REQUEST['id']}'";
									$conn->query($sqlD);
									// echo $sqlD;
									// die();
									echo '<script>
									swal({
										title: " Deleted",
										icon: "success",
										button: "close",
										type: "success"
									});
									</script>'; 
								}
									$query = "SELECT * FROM `staff_tb`";
									$result = $conn->query($query);

									while($row = $result->fetch_assoc()){
									echo '
										<tr>
										<td>'.$row["staff_id"].'</td>
										<td>'.$row["staff_name"].'</td>
										<td>'.$row["staff_email"].'</td>
										<td> '.$row["staff_number"].'</td> 
										<td> '.$row["staff_address"].'</td>
										<td> '.$row["occupation"].'</td>
										<td>
											<form action="" method="post" class="d-inline">
												<input type="hidden" name="id" value='.$row["staff_id"].'>
												<button class="btn btn-primary" type="submit" name="update">
												<i class="fas fa-pen"></i>
												</button>
											</form>
											
											<form action="" method="post" class="d-inline">
												<input type="hidden" name="id" value='.$row["staff_id"].'>
												<button class="btn btn-danger" type="submit" name="delete">
												<i class="fas fa-trash "></i>
												</button>
											</form>
										</td>
									</tr>';
									}
								?>
										<!-- Modal -->
										<div class="modal fade" id="addstaff" tabindex="-1" role="dialog"
											aria-labelledby="addstaff" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="addstaff">
															Modal title</h5>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="" method="post">
															<div class="form-group">
																<label for="exampleInputEmail1">Email
																	address</label>
																<input type="email" class="form-control"
																	id="exampleInputEmail1" aria-describedby="emailHelp"
																	placeholder="Enter email">
																<small id="emailHelp" class="form-text text-muted">We'll
																	never share your email with anyone
																	else.</small>
															</div>
															<button type="submit"
																class="btn btn-primary">Submit</button>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Add</button>
													</div>
												</div>
											</div>
										</div>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include("common/footer.php") ?>