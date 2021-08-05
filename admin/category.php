<?php
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category</h1>
	</div>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<button href="#" type="button" data-toggle="modal" data-target="#addcate" class="btn btn-success">
			<i class="fas fa-plus"></i> Add Category
		</button>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Id</th>
							<th>Image</th>
							<th>Category </th>
							<th>status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
								// delete item
								if(isset($_REQUEST["delete"]))
								{
								
									$sqlD = "DELETE FROM `menucategory_tb` where `cat_id` = '{$_REQUEST['id']}' order by `cat_id` desc";
									$conn->query($sqlD);
									echo '<script>
									swal({
										title: "category Deleted",
										icon: "success",
										button: "close",
										type: "success"
									});
									</script>'; 
								}
									$query = "SELECT * FROM `menucategory_tb` order by `cat_status` desc";
									$result = $conn->query($query);

									while($row = $result->fetch_assoc()){
										echo '
										<tr>
										<td class="catid">'.$row["cat_id"].'</td>
										<td><img src="'.catg_img.$row["cat_image"].'" alt="" border=3 height=80 width=80></img></td>
										<td>'.$row["cat_name"].'</td>';

										if($row["cat_status"] == 1){
											echo '<td class="text-success">available</td>';
										}
										else if($row["cat_status"] == 0){
											echo '<td class="text-danger">Empty Items</td>';
										}
										
										echo '<td>
											
												<button class="btn btn-primary update_btn" type="button" data-toggle="modal" data-target="#updatecat">
												<i class="fas fa-pen"></i>
												</button>
											
											<form action="" method="post" class="d-inline">
												<input type="hidden" name="id" value='.$row["cat_id"].'>
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
<!-- modal 1 add category -->
<?php 
									if(isset($_REQUEST["additm"]))
									{	
										// PICTURE UPLOAD
										$file = $_FILES['cimg'];

										$photo_name = $_FILES['cimg']['name'];
										$file_type = $_FILES['cimg']['type'];
										$file_size =$_FILES['cimg']['size'];
										$file_tmp_loc = $_FILES['cimg']['tmp_name'];
										$file_store_path = "../images/items/category/".$photo_name;
										move_uploaded_file($file_tmp_loc,$file_store_path);

										$caname = $_REQUEST["cname"];

										$query = "INSERT INTO `menucategory_tb`(`cat_name`, `cat_image`, `cat_status`)
										 VALUES ('$caname','$photo_name', '0')";
										
										$conn->query($query);
										echo '<script>
										swal({
											title: "Category Added",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '<meta http-equiv="refresh" content= "2;URL=?CategoryAdded" />'; 
									}
									?>
<div class="modal fade" id="addcate" tabindex="-1" role="dialog" aria-labelledby="addcate" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addcate">Add Items</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleFormControlFile1">category Image</label>
						<input type="file" name="cimg" class="form-control-file" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">category Name</label>
						<input type="text" class="form-control" name="cname" placeholder="Enter category Name" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="additm" class="btn btn-primary">Add
						Category</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- end modal -->

<!-- modal 2 update category -->
<?php
							if(isset($_REQUEST['updatebtn'])){
								
								$id = $_REQUEST['cat_id'];
								$name = $_REQUEST['cupdatename'];

								// PICTURE UPLOAD
								$file = $_FILES['cupdateimg'];

								$photo_name = $_FILES['cupdateimg']['name'];
								$file_type = $_FILES['cupdateimg']['type'];
								$file_size =$_FILES['cupdateimg']['size'];
								$file_tmp_loc = $_FILES['cupdateimg']['tmp_name'];
								$file_store_path = "../images/items/category/".$photo_name;
								move_uploaded_file($file_tmp_loc,$file_store_path);

								if($photo_name == ""){
									// update only name
									$sql = "UPDATE `menucategory_tb` SET `cat_name`='$name' WHERE `cat_id`='$id'";
									$conn->query($sql);
									echo '<script>
										swal({
											title: "Category Updated",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '<meta http-equiv="refresh" content= "2;URL=?updated" />';
								}

								if($photo_name != ""){
									// update only name
									$sql = "UPDATE `menucategory_tb` SET `cat_name`='$name', `cat_image` = '$photo_name' WHERE `cat_id`='$id'";
									$conn->query($sql);
									echo '<script>
										swal({
											title: "Category Updated",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '<meta http-equiv="refresh" content= "0;URL=?updated" />';
								}
							}
							?>

<div class="modal fade" id="updatecat" tabindex="-1" role="dialog" aria-labelledby="updatecat" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updatecat">Update category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="cat_id" id="cat_id">
					<div class="form-group">
						<label for="exampleFormControlFile1">category Image</label>
						<input type="file" name="cupdateimg" id="editimg" class="form-control-file">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">category Name</label>
						<input type="text" class="form-control" name="cupdatename" id="editname"
							placeholder="Enter category Name" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="updatebtn" class="btn btn-primary">update
						Category</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- end modal -->
</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>