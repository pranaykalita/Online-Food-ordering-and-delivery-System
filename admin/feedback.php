<?php
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">FeedBack</h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				Customers Contact / Feedback
			</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="dataTable">
					<thead>
						<tr>
							<th>Date</th>
							<th>From</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT date,msg_id,msg_name, LEFT(msg_body , 50) AS msg FROM feedback_tb ORDER BY `msg_id` DESC";
						$data = $conn->query($sql);
						while($row = $data->fetch_assoc())
						{
							echo '
							<tr>
							<td>'.date("d-M-Y",strtotime($row["date"])).'</td>
							<td>'.$row["msg_name"].'</td>
							<td>'.$row["msg"].'.....</td>
							<td>
								<form action="feedbackmsg.php" method="post" class="d-inline">
								<input type="hidden" name="id" value='.$row["msg_id"].'>
								<button class="btn btn-primary" type="submit" name="view">
								<i class="fas fa-eye "></i> View
								</button>
								</form>
							</td>
							</tr>
							';
						}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include("common/footer.php") ?>