<?php
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">All Orders</h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<!-- add content here  -->
			<div class="table-responsive">
				<table class="table " id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Id</th>
							<th>Date</th>
							<th>Buyer</th>
							<th>Total</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php

										$query = "SELECT * FROM `orders_all` order by `ord_id` desc";
										$data = $conn->query($query);
										while($row = $data->fetch_assoc())
										{
											echo '
											<tr>
												<td class="ord_id">'.$row["ord_id"].'</td>
												<td>'.$row["ord_date"].'</td>
												<td>'.$row["ord_user"].'</td>
												<td>'.$row["ord_totlprice"].'</td>';
												if($row["ord_status"] == 0)
												{
													echo '<td class="text-success"><i class="fas fa-hourglass-start "></i> New Order</td>';

												}else 
												if($row["ord_status"] == 1)
												{
													echo '<td class="text-primary"><i class="fas fa-utensils "></i> Cooking</td>';
												}
												else 
												if($row["ord_status"] == 2)
												{
													echo '<td class="text-info"><i class="fas fa-motorcycle "></i>Out For Delivery</td>';
												}
												else 
												if($row["ord_status"] == 3)
												{
													echo '<td class="text-success"><i class="fas fa-check-circle "></i>Delevered</td>';
												}
												else 
												if($row["ord_status"] == 4)
												{
													echo '<td class="text-danger"><i class="fas fa-hourglass-start"></i>Rejected</td>';
												}
											echo '
												<td>
												<button type="button" class="btn btn-info mr-3 get_id view_btn"  data-toggle="modal" data-target="#orddetail">
												<i class="fas fa-eye"></i>
												</button> 
												</td>
											</tr>';
										}
										
										?>
					</tbody>
				</table>

				<!-- modal -->
				<div class="modal fade" id="orddetail" tabindex="-1" role="dialog" aria-labelledby="orddetail"
					aria-hidden="true">
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
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>