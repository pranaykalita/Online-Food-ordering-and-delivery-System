<?php 
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Food Items</h1>
	</div>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<button href="#" type="button" data-toggle="modal" data-target="#additem" class="btn btn-success"><i
				class="fas fa-plus"></i> Add items</button>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				items
			</h6>
		</div>

		<div class="card-body">
			<!-- add content here  -->
			<div class="card-body">
			<div class="table-responsive">
			<table class="table" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Item Image</th>
						<th>Item Name</th>
						<th>Item price</th>
						<th>category</th>
						<th>Quantity</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
								// delet item
								if(isset($_REQUEST["delete"]))
								{
								
									$sqlD = "DELETE FROM `menu_items` where `menu_id` = '{$_REQUEST['id']}'";
									$conn->query($sqlD);
									echo '<script>
									swal({
										title: "Item Deleted",
										icon: "success",
										button: "close",
										type: "success"
									});
									</script>'; 
								}

								$query = "SELECT * FROM `menu_items`";
								$result = $conn->query($query);

								while($row = $result->fetch_assoc())
								{
									echo '
									<tr>
									<td class="menuid">'.$row["menu_id"].'</td>
									<td><img src="'.menu_img.$row["menu_image"].'" alt="" border=3 height=80 width=80></img></td>
									<td>'.$row["menu_name"].'</td>
									<td>'.$row["menu_price"].'</td>
									<td>'.$row["menu_category"].'</td>';
									if($row["menu_quantity"] == 0)
									{
										echo '<td class="text-danger">Empty</td>';
									}else{
										echo '<td>'.$row["menu_quantity"].'</td>';
									}
									
									echo '<td>
									<button class="btn btn-primary edit_food" type="button" data-toggle="modal" data-target="#edit_food">
									<i class="fas fa-pen"></i>
									</button>
										
										<form action="" method="post" class="d-inline">
											<input type="hidden" name="id" value='.$row["menu_id"].'>
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
			<!-- modal 1 add items -->
			<?php 
									// add item
									if(isset($_REQUEST["additm"]))
									{
										// PICTURE UPLOAD
										$file = $_FILES['itmimg'];

										$photo_name = $_FILES['itmimg']['name'];
										$file_type = $_FILES['itmimg']['type'];
										$file_size =$_FILES['itmimg']['size'];
										$file_tmp_loc = $_FILES['itmimg']['tmp_name'];
										$file_store_path = "../images/items/menu/".$photo_name;
										move_uploaded_file($file_tmp_loc,$file_store_path);

										$itmname = $_REQUEST["iname"];
										$itm_price = $_REQUEST["iprice"];
										$itm_cat = $_REQUEST["icat"];
										$itmquantity = $_REQUEST["iqty"];

										$query = "INSERT INTO `menu_items`(`menu_name`, `menu_price`, `menu_category`, `menu_image`, `menu_quantity`, `menu_status`) 
												VALUES ('$itmname', '$itm_price', '$itm_cat', '$photo_name', '$itmquantity' , '1')";
										$conn->query($query);
										echo '<script>console.log($query);</script>';
										echo '<script>
										swal({
											title: "Item Added",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '<meta http-equiv="refresh" content= "3;URL=?ItemADded" />'; 
									}
									?>
			<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additem"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Items</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label for="exampleFormControlFile1">Item Image</label>
									<input type="file" name="itmimg" class="form-control-file" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item Name</label>
									<input type="text" class="form-control" name="iname" placeholder="Enter Item Name"
										required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item Price</label>
									<input type="number" class="form-control" name="iprice"
										placeholder="Enter Item price" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item categoty</label>
									<select type="text" class="form-control" name="icat" required>
										<?php 
													$sql = "SELECT * FROM `menu_category`";
													$data = $conn->query($sql);
													while($ret = $data->fetch_assoc())
													{
														echo '<option>'.$ret["cat_name"].'</option>';
													}
													?>

									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item Quantity</label>
									<input type="number" class="form-control" name="iqty"
										placeholder="Enter Item Quantity" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="additm" class="btn btn-primary">Add item</button>
							</div>
						</form>

					</div>
				</div>
			</div>
			<!-- end modal -->

			<!-- modal 2 update items -->
			<?php
							if(isset($_REQUEST['upditm']))
							{
								$iid = $_REQUEST['menid'];
								$iname = $_REQUEST['up_iname'];
								$iprice = $_REQUEST['up_iprice'];
								$icat = $_REQUEST['up_icat'];
								$iqty =$_REQUEST['up_iqty'];

								// PICTURE UPLOAD
								$file = $_FILES['up_itmimg'];

								$photo_name = $_FILES['up_itmimg']['name'];
								$file_type = $_FILES['up_itmimg']['type'];
								$file_size =$_FILES['up_itmimg']['size'];
								$file_tmp_loc = $_FILES['up_itmimg']['tmp_name'];
								$file_store_path = "../images/items/menu/".$photo_name;
								move_uploaded_file($file_tmp_loc,$file_store_path);

								if($photo_name == ""){
									$sql = "UPDATE `menu_items` SET `menu_name`= '$iname',`menu_price`= '$iprice',`menu_quantity`='$iqty',`menu_category`='$icat' WHERE `menu_id` = '$iid'";
									$conn->query($sql);
									echo '<script>
									swal({
										title: "Item Updated",
										icon: "success",
										button: "close",
										type: "success"
									});
									</script>';
									echo '<meta http-equiv="refresh" content= "3;URL=?updated" />';
								}
								else if($photo_name != "")
								{
									$sql = "UPDATE `menu_items` SET `menu_name`= '$iname',`menu_price`= '$iprice',`menu_quantity`='$iqty',`menu_category`='$icat',`menu_image`= '$photo_name' WHERE `menu_id` = '$iid'";
									$conn->query($sql);
									echo '<script>
									swal({
										title: "Item Updated",
										icon: "success",
										button: "close",
										type: "success"
									});
									</script>';
									echo '<meta http-equiv="refresh" content= "3;URL=?updated" />';
								}

							}
							?>
			<div class="modal fade" id="edit_food" tabindex="-1" role="dialog" aria-labelledby="edit_food"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="edit_food">Add Items</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="modal-body">
								<input type="hidden" name="menid" id="menid">
								<div class="form-group">
									<label for="exampleFormControlFile1">Item Image</label>
									<input type="file" name="up_itmimg" class="form-control-file upitmimg">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item Name</label>
									<input type="text" class="form-control upiname" name="up_iname"
										placeholder="Enter Item Name" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item Price</label>
									<input type="number" class="form-control upiprice" name="up_iprice"
										placeholder="Enter Item price" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item categoty</label>
									<select type="text" class="form-control upicat" name="up_icat" required>
										<?php 
													$sql = "SELECT * FROM `menu_category`";
													$data = $conn->query($sql);
													while($ret = $data->fetch_assoc())
													{
														echo '<option>'.$ret["cat_name"].'</option>';
													}
													?>

									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Item Quantity</label>
									<input type="number" class="form-control upiqty" name="up_iqty"
										placeholder="Enter Item Quantity" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="upditm" class="btn btn-primary">Update</button>
							</div>
						</form>

					</div>
				</div>
			</div>
			<!-- end modal -->
		</div>
	</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>