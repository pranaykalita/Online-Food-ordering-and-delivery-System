<?php
define("TITLE" , "FOODZILLA");
include('include/dbcon.php');
include('include/head.php');
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/main.css" />
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet">
<style>
	.categoryimg
	{
	max-width: 100%;
	max-height: 150px;
	overflow: hidden;
	object-fit: cover;
	}
	.cattitle{
		color:#ff6b6b;
		font-size: 2rem;
		font-family: 'Lobster', cursive;
	}
	.browsebtn{
		font-family: 'Merienda', cursive;
		background: #ff6b6b;
		color: #fff;
		height: 20%;
		padding: 10px 20px 10px 20px;
		border-radius: 26px;
	}
	.browsebtn:hover{
		color: black;
		background:#fff;
		transform: scale(1.1);
		border: 1px solid #000;
		transition: .2s linear;
	}
	@media only screen and (max-width: 600px) {
	.cattitle,.browsebtn{
		display: flex;
		justify-content: center;
	}
}
</style>

</head>

<body>

    <?php include('include/header.php'); ?>

    <!-- content -->
	<?php
		
	if(isset($_REQUEST['sendmsg'])){
		$name = $_REQUEST['sname'];
		$email = $_REQUEST['semail'];
		$msg = $_REQUEST['smsg'];

		$senddate = date("Y-m-d");
		$sendtime = date("h:i:sa");

		$escapemsg = $conn->real_escape_string(($msg));

		$sql = "INSERT INTO `feedback_tb`(`msg_name`, `msg_email`, `msg_body` ,`date`, `time`) VALUES ('$name','$email','$escapemsg','$senddate','$sendtime')";
		// echo $sql;die();
		$conn->query($sql);
		echo '<script>
			swal({
				title: "Message Sent successfully",
				button: "close",
				type: "error"
			});
			</script>';
	}
	?>
    <!-- home -->
	<section class="slider" id="home">
		<div class="row">
			<div class="owl-carousel owl-theme" id="home">

				<!-- carousel item1 -->
				<div class="item item-first">
					<div class="overlay"></div>
					<div class="caption">
						<div class="container-fluid">
							<div class="col-md-8 col-sm-12">
								<h3>Eatery Cafe &amp; Restaurant</h3>
								<h1>Our mission is to provide an unforgettable experience</h1>
								<a href="#menu" class="btn btn-default">Order Today</a>
							</div>
						</div>
					</div>
				</div>
				<!-- carousel item1 -->
				<div class="item item-second">
					<div class="overlay"></div>
					<div class="caption">
						<div class="container-fluid">
							<div class="col-md-8 col-sm-12">
								<h3>Eatery Cafe &amp; Restaurant</h3>
								<h1>Let the taste of our dishes , reign your taste buds</h1>
								<a href="#menu" class="btn btn-default">Order Today</a>
							</div>
						</div>
					</div>
				</div>
				<!-- carousel item1 -->
				<div class="item item-third">
					<div class="overlay"></div>
					<div class="caption">
						<div class="container-fluid">
							<div class="col-md-8 col-sm-12">
								<h3>Eatery Cafe &amp; Restaurant</h3>
								<h1>People who loved to eat are always the best people</h1>
								<a href="#menu" class="btn btn-default">Order Today</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- category menu -->
	<section id="menu">
		<div class="container">
			<div class="row">
				<div class="col text-center pt-5 menu_title">
					<h1><span></span> Our Menu <span></span></h1>
				</div>
			</div>

			<div class="row">
					<?php
					$sql = "SELECT * FROM `menucategory_tb` order by `cat_id` asc";
					$data = $conn->query($sql);
					while($row = $data->fetch_assoc())
					{
						echo '
						<div class="col-xl-6 col-md-6 col-sm-12">
							<div class="card my-3" >
								<img
									src='.catg_img.$row["cat_image"].'
									class="card-img-top categoryimg"
									alt=""
								/>
								<div class="card-body d-sm-flex align-items-center justify-content-between">
									<h5 class="card-title cattitle">'.$row["cat_name"].'</h5>
									<br>
									<a href='."menu.php#".$row["cat_name"].' class="btn browsebtn">View Menu</a>
								</div>
								
								
								
							</div>
						</div>
						';
					}
					?>
				
			</div>


			<div class="row">
				<div class="col text-center menubtn">
					<a href="menu.php" class="btn">View Menu</a>
				</div>
			</div>
		</div>
	</section>

	<!-- about -->
	<section id="about">
		<div class="container">
			<div class="row p-5">
				<div class="col-md-6 col-sm-12">
					<div class="about-title">
						<h1>Coders.</h1>
						<h1>Cafe</h1>
					</div>
					<div class="about-info">
						<p>The restaurant is an organic space reflective of nature inspired cuisine.The
							interplay of textures and colour brings life and a vibrance that embraces
							therestaurant’s place in the dress circle of Jorhat. An ode to the
							assam'slandscape, from the vast nature floor, to the cracked bark of a paperbark
							tree, every detail from the ground up has been thoughtfully considere
						</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="about-image">
						<img src="../images/about_dish.png" alt=""></div>
				</div>

			</div>
		</div>
	</section>

	<!-- testimonial -->
	<section id="testimonial">
		<div class="container">
			<div class="row">
				<div class="testimonial_slider owl-carousel owl-theme owl-inner-nav">

					<!-- testimonial 1 -->
					<div class="item">
						<div class="container">
							<div class="caption text-center">
								<p class="medium-color"> Had lunch with some of my colleagues at FoodZilla. The service was excellent..</p>
								<span>Rahul Kalita</span>
								<p class="medium-text">Jorhat</p>
							</div>
						</div>
					</div>

					<!-- testimonial 2 -->
					<div class="item">
						<div class="container">
							<div class="caption text-center">
								<p class="medium-color">Had dinner with girlfriend. Menu is perfect, something for everyone. Service was awesome and manager was very accommodating. Will be back definitely!.</p>
								<span>Joshua Phillepe</span>
								<p class="medium-text">Goa</p>
							</div>
						</div>
					</div>

					<!-- testimonial 3 -->
					<div class="item">
						<div class="container">
							<div class="caption text-center">
								<p class="medium-color">The food was absolutely wonderful, from preparation to presentation, very pleasing. We especially enjoyed the special drinks, the cucumber/cilantro infused vodka martini and the K&P Aquarium was great (even took photos so we could try to replicate at home)..</p>
								<span>Barbie Dutta</span>
								<p class="medium-text">Sibsagar</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<!-- contact -->
	<section id="contact">
		<div class="container">

			<div class="row">
				<div class="col contact_title text-center">
					<h2>Contact</h2>
					<h2>US</h2>
				</div>
			</div>

			<div class="row ">
				<div class="col cform">
					<form action="" method="POST">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control name" placeholder="Your Name" name="sname" required>
						</div>
						<div class="form-group">
							<label for="main">Email</label>
							<input type="email" class="form-control name" placeholder="name@example.com" name="semail" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="3" placeholder="Your Message" name="smsg" required></textarea>
						</div>
						<div class="form-group text-center">
							<input class="submit-btn" type="submit" value="Send Message" name="sendmsg">
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>

    <!-- end contant -->

    <!-- footer common with common scripts -->

    <?php 
    include('include/footer.php');
    include('include/cmonscripts.php');
    ?>

</body>

</html>