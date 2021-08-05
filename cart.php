<?php
define("TITLE" , "FOODZILLA | Cart");
include('include/dbcon.php');
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/cart.css" />

</head>

<body>
	<!-- manage cart -->
	<?php
	   // if update
	   if(isset($_REQUEST['itmqty']))
	   	{
		   $nq = $_REQUEST['itmquantity'];
		  
		   
			foreach($_SESSION['cart'] as $key => $value)
			{

			  if($value['Item_name'] == $_REQUEST['item_qty'])
			  {
			  $_SESSION['cart'][$key] =  array_replace($value, ['quantity'=> $nq]);
			  echo "<script>swal('Quantity Updated');</script>";
			
			  }
		  
			}
	   	}
		// remove item
	   if(isset($_POST['remove_item']))
	   	{
		   foreach($_SESSION['cart'] as $key => $value)
		   {
			  
			   if($value['Item_name'] == $_POST['itmname'])
			   {
			   unset($_SESSION['cart'][$key]);
			   $_SESSION['cart'] = array_values($_SESSION['cart']);
			   echo "<script>swal('Item Removed', '', 'success');</script>";
			   }
		   }
		}
	?>
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

							<?php 
							if(isset($_SESSION['cart']))
							{
								foreach($_SESSION['cart'] as $key => $value)
								{
									$total = $total+$value['Item_price']*$value['quantity'];
									
									?>
							<!-- item 1 -->
							<div class="card p-3 shadow">
								<div class="row">

									<!--item  image -->
									<div
										class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center  product_image">
										<img src="<?php echo menu_img.$value['Item_img'];?>" class="img-fluid" alt="">
									</div>
									<!-- cart details -->
									<div class="col-md-7 col-11 mx-auto p-4 mt-2">
										<div class="row">
											<!-- details -->
											<div class="col-6 cart_title">
												<!-- itmname -->
												<h1><?php echo $value['Item_name'];?></h1>
											</div>

											<!-- item quantity -->

											<div class="col-6">
											<form action="" method="POST">
												<ul class="pagination justify-content-end set_quantity">
													<ul class="pagination justify-content-end set_quantity">

														<!-- <li class="page-item"><a class="page-link"onclick="decreaseNumber('textbox')"><i
																	class="fas fa-minus"></i></a></li> -->
														<a onclick="this.parentNode.querySelector('.qtyitm').stepDown()" class="page-link"><i
																	class="fas fa-minus"></i></a>			

														<li class="page-item"><input class="page-link qtyitm" id="textbox"
																name="itmquantity" type="number" min="1" max="5" value='<?php echo $value['quantity'];?>'></input></li>

														<!-- <li class="page-item"><a class="page-link" onclick="IncreseNumber('textbox')"><i
																	class="fas fa-plus"></i></a></li> -->
														<a onclick="this.parentNode.querySelector('.qtyitm').stepUp()" class="page-link"><i class='fas fa-plus'></i></a>

													<button class='btn btn-sm btn-outline-danger' name='itmqty'><i class='fas fa-sync'></i></button>
													<input type='hidden' name='item_qty' value='<?php echo $value['Item_name'];?>'>

												</ul>
											</form>
											</div>

										</div>

										<!-- item remove  -->
										<form action="" method="POST">
											<div class="row pt-4">

												<button class="col-8 d-flex justify-content-between remove_item"
													name="remove_item">
													<p><i class="fas fa-trash text-danger"></i> Remove Item</p>
												</button>
												<input type="hidden" name="itmname"
													value="<?php echo $value['Item_name']; ?>">

												<div class="col-4 d-flex justify-content-between price">
													<h3>₹ <span id="itemval"><?php echo $value['Item_price'];?></span>
													</h3>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php
								}
							}
								
							?>
							<hr />
							<!-- end item -->

						</div>
						<!-- rightside -->
						<div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5 ">
							<form>
								<div class="rightside p-3 shadow bg-white mt-5">
									<h2 class="product_name">Total Amount Of</h2>
								<?php
								$stotal = 0;
								foreach($_SESSION['cart'] as $key => $minval)
								{
									$stotal = $minval['Item_price']* $minval['quantity'];
									?>
									<div class="price_individual d-flex justify-content-between">
										<p><?php echo $minval['Item_name']; ?></p>
										<p>₹ <span><?php echo $stotal; ?></span> </p>
									</div>
									<?php
								}
								?>

									<hr />
									<div class="total_ammount d-flex justify-content-between font-weight-bold">
										<p>total amount</p>
										<p>₹ <span id="total_cart_amt"><span><?php echo $total; ?></span> </p>
									</div>
									<a type="submit" class="btn btn-primary checkoutbtn text-uppercase"
										name="checkout" href="payment.php" >Checkout</a>
									<input type="hidden" name="" value="<?php echo $minval['Item_name']; ?>">
									<input type="hidden" name="" value="<?php echo $stotal; ?>">
								</div>
							</form>
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