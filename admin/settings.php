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
								$file = $_FILES['proupimg'];

								$photo_name = $_FILES['proupimg']['name'];
								$file_type = $_FILES['proupimg']['type'];
								$file_size =$_FILES['proupimg']['size'];
								$file_tmp_loc = $_FILES['proupimg']['tmp_name'];
								$file_store_path = "../images/items/".$photo_name;
								move_uploaded_file($file_tmp_loc,$file_store_path);

								
								    $sql = "INSERT INTO `admin_tb`( `admin_name`,'admin_email', `admin_password`, `a_name`) VALUES ('$uname', '$email' ,'$pass')";
									$conn->query($sql);
									echo '<script>
										swal({
											title: "Admin Added",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '<meta http-equiv="refresh" content= "0;URL=?updated" />';
								
							}
							?>
			<div class=" card rounded shadow mb-4 p-4">
				<form action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleFormControlFile1">Profile Photo</label>
						<input type="file" name="proupimg" class="form-control-file">
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
						<input type="text" name="pass" class="form-control" required="required">
					</div>
				
					<input type="submit" name="addadmin" class="btn btn-primary" value="Add Admin">
				</form>
			</div>

			<!-- Content Row -->
			<!-- table -->
			<p class="text-dark card shadow p-2 font-weight-bold">Available Admins</p>
			<table class="table ">
				<thead>
					<tr>
						<th>Name</th>
						<th>email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
		
		$sql = "SELECT * FROM admin_tb";
		$data = $conn->query($sql);
		while($row = $data->fetch_assoc()){
			echo'
		<tr>
			<td>'.$row["admin_name"].'</td>
			<td>'.$row["admin_email"].'</td>';

			if(($row['default_admin'] == '1') || ($_SESSION["username"] == $row["admin_name"]) ){
				echo '<td>Defaul/Current</td>';
			}else{
				
				echo ' 
			<td>
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
		<!-- add content here -->
	</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->