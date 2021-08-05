<?php
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Staff</h1>
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
										<td class="stfid">'.$row["staff_id"].'</td>
										<td>'.$row["staff_name"].'</td>
										<td>'.$row["staff_email"].'</td>
										<td> '.$row["staff_number"].'</td> 
										<td> '.$row["staff_address"].'</td>
										<td> '.$row["occupation"].'</td>
										<td>
										<button class="btn btn-primary editemp" type="button" data-toggle="modal" data-target="#editemp">
										<i class="fas fa-pen"></i>
										</button>
											
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

									</tbody>
								</table>



							</div>
						</div>
					</div>

				</div>
	<!-- /.container-fluid -->
	<!-- Modal add emp-->
	<?php
										if(isset($_REQUEST["addemp"]))
										{
											
											$name =$_REQUEST["name"];
											$email =$_REQUEST["email"];
											$phone =$_REQUEST["phone"];
											$addrs =$_REQUEST["addr"];
											$occup =$_REQUEST["ocup"];
											
											$sql = "INSERT INTO `staff_tb`(`staff_name`, `staff_email`, `staff_number`, `staff_address`, `occupation`) 
											VALUES ('$name','$email','$phone','$addrs','$occup')";
											$conn->query($sql);
											echo '<script>
											swal({
												title: "Employee Added",
												icon: "success",
												button: "close",
												type: "success"
											});</script>';
											echo '<meta http-equiv="refresh" content= "1;URL=?updated" />';
										}
										?>
	<div class="modal fade" id="addstaff" tabindex="-1" role="dialog" aria-labelledby="addstaff" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addstaff">
						Update staff</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					<div class="modal-body">

						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter Name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" name="phone" maxlength="13" class="form-control"
								pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
								placeholder="Enter Phone(+911234567890)">
						</div>
						<div class="form-group">
							<label>address</label>
							<textarea type="address" name="addr" class="form-control" placeholder="Address"></textarea>
						</div>
						<div class="form-group">
							<label>Occupation</label>
							<input type="text" name="ocup" class="form-control" list="occu">
							<datalist id="occu">
								<option>Cook</option>
								<option>Staff</option>
								<option>Manager</option>
							</datalist>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="addemp" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal -->
	<!-- modal 2 update items -->
	<?php
							if(isset($_REQUEST['updempy']))
							{
									$empid =$_REQUEST["empid"];
									$name =$_REQUEST["name"];
									$email =$_REQUEST["email"];
									$phone =$_REQUEST["phone"];
									$addrs =$_REQUEST["addr"];
									$occup =$_REQUEST["ocup"];

									$sql = "UPDATE `staff_tb` SET `staff_name`='$name',`staff_email`='$email',`staff_number`='$phone',`staff_address`='$addrs',`occupation`='$occup' WHERE `staff_id` = '{$empid}'";
									$conn->query($sql);
									echo '<script>
										swal({
											title: "Employee Updated",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
									echo '<meta http-equiv="refresh" content= "2;URL=?updated" />';
							}
							?>
	<div class="modal fade" id="editemp" tabindex="-1" role="dialog" aria-labelledby="editemp" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editemp">Update employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST" enctype="multipart/form-data">

					<div class="modal-body">
						<input type="hidden" name="empid" id="stfid">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control name" placeholder="Enter Name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control email" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" name="phone" maxlength="13" class="form-control tel"
								pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
								placeholder="Enter Phone(+911234567890)">
						</div>
						<div class="form-group">
							<label>address</label>
							<textarea type="address" name="addr" class="form-control addr"
								placeholder="Address"></textarea>
						</div>
						<div class="form-group">
							<label>Occupation</label>
							<input type="text" name="ocup" class="form-control oocup" list="occu">
							<datalist id="occu">
								<option>Cook</option>
								<option>Delivery</option>
								<option>Staff</option>
								<option>Manager</option>
							</datalist>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" name="updempy" class="btn btn-primary">Update</button>
						</div>
				</form>

			</div>
		</div>
	</div>
	<!-- end modal -->
</div>
<!-- End of Main Content -->
<?php include("common/footer.php") ?>