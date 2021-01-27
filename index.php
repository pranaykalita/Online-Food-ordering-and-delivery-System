<?php
define("TITLE" , "Coders Cafe");
include('include/dbcon.php');
include('include/head.php');
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/main.css" />

</head>

<body>

    <?php include('include/header.php'); ?>

    <!-- content -->
	<?php
		
	if(isset($_REQUEST['sendmsg'])){
		$name = $_REQUEST['sname'];
		$email = $_REQUEST['semail'];
		$msg = $_REQUEST['smsg'];

		$sql = "INSERT INTO `user_messages`(`msg_name`, `msg_email`, `msg_body`) VALUES ('$name','$email','$msg')";
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

	<!-- menu -->
	<section id="menu">
		<div class="container">
			<div class="row">
				<div class="col text-center menu_title">
					<h1><span></span> Our Menu <span></span></h1>
				</div>
			</div>
			<div class="row menu_itm text-center">
				<?php
				$sql = "SELECT * FROM `menu_category` order by `cat_id` asc";
				$data = $conn->query($sql);
				while($row = $data->fetch_assoc()){
					echo '
					<div class="col-md py-2">
					<div class="card">
						<div class="image">
							<img src='.catg_img.$row["cat_image"].' alt="" srcset="">
						</div>
						<div class="menucontent">
							<div class="title">'.$row["cat_name"].'</div>
							<div class="bottom">
								<a href='."menu.php#".$row["cat_name"].' class="btn btn-primary">Browse</a>
							</div>
						</div>
					</div>
				</div>';
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

	<!-- testimonial -->
	<section id="testimonial">
		<div class="container">
			<div class="row">
				<div class="testimonial_slider owl-carousel owl-theme owl-inner-nav">

					<!-- testimonial 1 -->
					<div class="item">
						<div class="container">
							<div class="caption text-center">
								<p class="medium-color">Create your online portfolio in minutes with the professionally
									and lovingly designed REEN website template. Customize your site with versatile and
									easy to use features.</p>
								<span>Pranay Kalita</span>
								<p class="medium-text">Vitae lacinia augue urna quis</p>
							</div>
						</div>
					</div>

					<!-- testimonial 2 -->
					<div class="item">
						<div class="container">
							<div class="caption text-center">
								<p class="medium-color">Create your online portfolio in minutes with the professionally
									and lovingly designed REEN website template. Customize your site with versatile and
									easy to use features.</p>
								<span>Pranay Kalita</span>
								<p class="medium-text">Vitae lacinia augue urna quis</p>
							</div>
						</div>
					</div>

					<!-- testimonial 3 -->
					<div class="item">
						<div class="container">
							<div class="caption text-center">
								<p class="medium-color">Create your online portfolio in minutes with the professionally
									and lovingly designed REEN website template. Customize your site with versatile and
									easy to use features.</p>
								<span>Pranay Kalita</span>
								<p class="medium-text">Vitae lacinia augue urna quis</p>
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