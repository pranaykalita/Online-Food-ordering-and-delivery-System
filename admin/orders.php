<?php
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">All Orders</h1>
	</div>

	<!-- DataTales Example -->

	<div class="card-body shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Order</h6>
		</div>
		<!-- add content here  -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="dataTable">
					<thead>
						<tr>
							
							<th>order No</th>
							<th>Date</th>
							<th>Buyer</th>
							<th>Total</th>
							<th>Status</th>
							<th>delivery by</th>
							<th>payment</th>
							<th>Action</th>
							<th style="display: none;"></th>
						</tr>
					</thead>
					<tbody>
						<?php

										$query = "SELECT * FROM `allorders_tb` order by `ord_id` desc";
										$data = $conn->query($query);
										while($row = $data->fetch_assoc())
										{
											$ord_date = strtotime($row["ord_date"]);
											$ford_date = date("d-M-Y",$ord_date);

											echo '
											<tr>
											
												<td class="ord_id" style="display: none;" >'.$row["ord_id"].'</td>

												<td>'.$row["invid"].'</td>
												<td>'.$ford_date.'</td>
												<td>'.$row["ord_user"].'</td>
												<td>₹ '.$row["ord_totlprice"].'</td>';
												
												if($row["ord_status"] == 0)
												{
													echo '<td class="text-danger"><i class="fas fa-hourglass-start "></i> New Order</td>';

												}
												elseif($row["ord_status"] == 1)
												{
													echo '<td class="text-primary"><i class="fas fa-utensils "></i> Cooking</td>';
												}
												elseif($row["ord_status"] == 2)
												{
													echo '<td class="text-info"><i class="fas fa-motorcycle "></i>Out For Delivery</td>';
												}
												elseif($row["ord_status"] == 3)
												{
													echo '<td class="text-success"><i class="fas fa-check-circle "></i>Delevered</td>';
												}
												elseif($row["ord_status"] == 4)
												{
													echo '<td class="text-danger"><i class="fas fa-hourglass-start"></i>Rejected</td>';
												}
												elseif($row["ord_status"] == 5)
												{
													echo '<td class="text-danger"><i class="fas fa-exclamation-triangle"></i>Undelivered</td>';
												}


												if($row["ord_status"] = 3)
												{
													$dquery = "SELECT * FROM `delivery_tb` WHERE `id` = '{$row["del_per"]}'";
													$d = $conn->query($dquery);
													$drow = $d->fetch_assoc();
													echo '
													<td>'.$drow["del_name"].'</td>';
												}
												else
												{
													echo '
													<td>undelivered</td>';
												}
											echo '<td>'.$row["selpaymode"].'</td>';
											echo '
												<td>
												<button type="button" class="btn btn-info mr-3 get_id view_btn"  data-toggle="modal" data-target="#orddetail">
												<i class="fas fa-eye"></i> View details
												</button> 
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

<!-- modal -->
<div class="modal fade" id="orddetail" tabindex="-1" role="dialog" aria-labelledby="orddetail" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">View Orders</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- order id table -->
									
				

				<table class="table">
					<thead>
						<tr>
							<th>Item</th>
							<th>Qty</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody class="orddet">
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>