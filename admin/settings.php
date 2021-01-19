<?php
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Admin Settings</h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				Site settings
			</h6>
		</div>

		<div class="card-body">
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Admin settings</h1>
			</div>
			<div class="row mb-4">
				<div class="col">
					<a href="index.php" class="btn btn-danger ">
						<i class="fas fa-long-arrow-alt-left"></i>
						Back</a>
				</div>
			</div>

			<!-- add admin -->
			<?php
							if(isset($_REQUEST['addadmin'])){

								$name = $_REQUEST['uname'];
								$email = $_REQUEST['email'];
								$password = $_REQUEST['pass'];
						

								// PICTURE UPLOAD
								$file = $_FILES["aimg"];

								
								$photo_name = $_FILES['aimg']['name'];
								$file_type = $_FILES['aimg']['type'];
								$file_size =$_FILES['aimg']['size'];
								$file_tmp_loc = $_FILES['aimg']['tmp_name'];
								$file_store_path = "../images/items/".$photo_name;

								move_uploaded_file($file_tmp_loc,$file_store_path);

								
								    $sql = "INSERT INTO `admin_tb`( `admin_name`, `admin_pass`, `admin_email`, `admin_image`) 
									VALUES ('$name','$password','$email', '$photo_name')";
									
									$conn->query($sql);
									echo '<script>
										swal({
											title: "Admin Added",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '<meta http-equiv="refresh" content= "1;URL=?updated" />';
								
							}
							?>
			<div class=" card rounded shadow mb-4 p-4">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="image">Profile Photo</label>
						<input type="file" name="aimg" class="form-control-file">
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="uname" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label for="name">Email</label>
						<input type="email" name="email" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="pass" id="paswd" minlength="8" class="form-control"
							required="required">
						<input type="checkbox" onclick="myFunction()"> Show Password
					</div>

					<input type="submit" name="addadmin" class="btn btn-primary" value="Add Admin">
				</form>
			</div>

			<!-- Content Row -->
			<!-- table -->
			<p class="text-dark card shadow p-2 font-weight-bold">Available Admins</p>
			<div class="table-responsive">
			<table class="table ">
				<thead>
					<tr>
						<th>id</th>
						<th>Name</th>
						<th>email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
				// delete admin
				if(isset($_REQUEST["del"]))
				{
				
					$sqlD = "DELETE FROM `admin_tb` where `admin_id` = '{$_REQUEST['id']}'";
					$conn->query($sqlD);
					
					echo '<script>
					swal({
						title: "Admin Deleted",
						icon: "success",
						button: "close",
						type: "success"
					});
					</script>'; echo '<meta http-equiv="refresh" content= "1;URL=?Deleted" />'; 
				
				}

				$sql = "SELECT * FROM admin_tb";
				$data = $conn->query($sql);
				while($row = $data->fetch_assoc()){
					echo'
		<tr>
			<td class="admid">'.$row["admin_id"].'</td>
			<td>'.$row["admin_name"].'</td>
			<td>'.$row["admin_email"].'</td>';

			if(($_SESSION["aid"] == $row["admin_id"]) ){
				echo '<td>Current Admin</td>';
			}else{
				
				echo ' 
			<td>
			<button class="btn btn-primary editpasswd" type="button" data-toggle="modal" data-target="#editpasswd">
			<i class="fas fa-pen"></i>
			</button>

			<form action="" method="post" class="d-inline">
			<input type="hidden" name="id" value='.$row["admin_id"].'>
			<button class="btn btn-danger" type="submit" name="del">
			<i class="fas fa-trash "></i>
			</button>
			</td>';
			}
		echo '</tr>';
	}
		?>
				</tbody>
			</table>
		</div>
			<!-- modal 2 update items -->
			<?php
							if(isset($_REQUEST['uppass']))
							{
									$adid =$_REQUEST["adminid"];
									$passnew =$_REQUEST["pass"];

									$sql = "UPDATE `admin_tb` SET `admin_pass`='$passnew' WHERE `admin_id` = '{$adid}'";
									$conn->query($sql);
									echo '<script>
										swal({
											title: "Pssword Updated",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
									echo '<meta http-equiv="refresh" content= "2;URL=?updated" />';
							}
							?>
			<div class="modal fade" id="editpasswd" tabindex="-1" role="dialog" aria-labelledby="editpasswd"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editpasswd">Update password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="" method="POST">

							<div class="modal-body">
								<input type="hidden" name="adminid" id="adminid">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control name" placeholder="Enter Name" readonly>
								</div>
								<div class="form-group">
									<label>New Password</label>
									<input type="text" name="pass" minlength="8" class="form-control paswd"
										id="paswd">
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="uppass" class="btn btn-primary">Update</button>
								</div>
						</form>

					</div>
				</div>
			</div>
			<!-- end modal -->
		</div>
		<!-- add content here -->
	</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include("common/footer.php") ?>