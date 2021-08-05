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
		<?php
		if(isset($_POST["view"]))
		{
			$id = $_POST["id"];

			$sql = "SELECT * FROM `feedback_tb` WHERE `msg_id` = $id";
			$data = $conn->query($sql);

			$row = $data->fetch_assoc();

		}
		?>

		<div class="card-body">
			<div class="table-responsive">

				<table class="table table-borderless">
					<tr>
						<th>date:</th>
						<td><?php echo date("d-M-Y", strtotime($row["date"])) ?></td>
					</tr>
					<tr>
						<th>Time:</th>
						<td><?php echo date("h:i a", strtotime($row["time"])) ?></td>
					</tr>
					<tr>
						<th>Name:</th>
						<td><?php echo $row["msg_name"] ?></td>
					</tr>
					<tr>
						<th>Email:</th>
						<td><?php echo $row["msg_email"] ?></td>
					</tr>
					<tr>
						<th>Message:</th>
						<td><?php echo $row["msg_body"] ?></td>
					</tr>
				</table>

				<a href="feedback.php" class="btn btn-success mt-5">BACK</a>
			</div>
		</div>
	</div>

</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include("common/footer.php") ?>