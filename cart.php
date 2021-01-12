<?php
error_reporting(0);
define("TITLE" , "coders Cafe | Cart");
include('include/dbcon.php');
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/cart.css" />

</head>

<body>

    <?php include('include/header.php'); ?>

    <!-- content -->

    <!-- home -->
	<section id="cart">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-11 mx-auto">
					<div class="row mt-5 gx-3">

						<!-- leftside -->
						<div class="col-md-12 col-lg-8 col-11 mx-auto maincart mb-lg-0 mb-5">
							<h2 class="py-4 font-weight-bold">Cart Items</h2>
							<div class="card p-3 shadow">
								<div class="row">
									<!-- image -->
									<div
										class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center  product_image">
										<img src="/images/salad.jpg" class="img-fluid" alt="">
									</div>
									<!-- cart details -->
									<div class="col-md-7 col-11 mx-auto p-4 mt-2">
										<div class="row">
											<!-- details -->
											<div class="col-6 cart_title">
												<h1>Paneer</h1>
											</div>

											<!-- quantity -->
											<div class="col-6">
												<ul class="pagination justify-content-end set_quantity">
													<li class="page-item"><button class="page-link"
															onclick="decreaseNumber('textbox')"><i
																class="fas fa-minus"></i></button></li>
													<li class="page-item"><input class="page-link" id="textbox" name=""
															type="text" value="1"></input></li>
													<li class="page-item"><button class="page-link"
															onclick="IncreseNumber('textbox')"><i
																class="fas fa-plus"></i></button></li>
												</ul>
											</div>
										</div>

										<!-- remove item -->
										<div class="row pt-4">
											<div class="col-8 d-flex justify-content-between  remove_item">
												<p><i class="fas fa-trash"></i> Remove Item</p>
											</div>
											<div class="col-4 d-flex justify-content-between price">
												<h3>$ <span id="itemval">0.00</span></h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr />
							<!-- item2 -->

							<div class="card p-4 shadow">
								<div class="row">
									<!-- image -->
									<div
										class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_image">
										<img src="/images/salad.jpg" class="img-fluid" alt="">
									</div>
									<!-- cart details -->
									<div class="col-md-7 col-11 mx-auto px-4 mt-2">
										<div class="row">
											<!-- details -->
											<div class="col-6 cart_title">
												<h1>Paneer</h1>
												<p class="mb-4">category: maincourse</p>
											</div>

											<!-- quantity -->
											<div class="col-6">
												<ul class="pagination justify-content-end set_quantity">
													<li class="page-item"><button class="page-link"
															onclick="IncreseNumber('textbox1')"><i
																class="fas fa-plus"></i></button></li>
													<li class="page-item"><input class="page-link" id="textbox1"
															type="text" value="1"></input></li>
													<li class="page-item"><button class="page-link"
															onclick="decreaseNumber('textbox1')"><i
																class="fas fa-minus"></i></button></li>
												</ul>
											</div>
										</div>

										<!-- remove item -->
										<div class="row">
											<div class="col-8 d-flex justify-content-between remove_item">
												<p><i class="fas fa-trash"></i> Remove Item</p>
											</div>
											<div class="col-4 d-flex justify-content-between price">
												<h3>$ <span id="itemval">0.00</span></h3>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
						<!-- rightside -->
						<div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5 ">

							<div class="rightside p-3 shadow bg-white mt-5">
								<h2 class="product_name">Total Amount Of</h2>
								<div class="price_individual d-flex justify-content-between">
									<p>product name</p>
									<p>$ <span>0.00</span> </p>
								</div>
								<div class="price_individual d-flex justify-content-between">
									<p>tax(18%)</p>
									<p>$<span>50.00</span> </p>
								</div>
								<hr />
								<div class="total_ammount d-flex justify-content-between font-weight-bold">
									<p>total amount</p>
									<p>$ <span id="total_cart_amt">100.00</span> </p>
								</div>
								<button class="btn btn-primary checkoutbtn text-uppercase">Checkout</button>
							</div>
						</div>
					</div>
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