<?php
define("TITLE" , "Coders Cafe | Menu");
include('include/head.php'); 
?>




<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/menu.css" />

</head>

<body>
	<!-- manage cart -->
	<?php
	if(isset($_REQUEST["atcart"])){
		$itm_name = $_REQUEST["iname"];
		$itm_price = $_REQUEST["iprice"];
		$itm_img = $_REQUEST["iimg"];

		if(isset($_SESSION['cart']))
		{
			$myitms = array_column($_SESSION['cart'], 'Item_name');
			if(in_array($itm_name,$myitms))
			{
				// echo "<script>alert('Item Already Added');window.location.href='menu.php';</script>";
				echo "<script>swal('Item Already Added');</script>";
				

			}
			else
			{
				$count_itm = count($_SESSION['cart']);
				$_SESSION['cart'][$count_itm] =  array('Item_img'=>$itm_img,'Item_name'=>$itm_name,'Item_price'=>$itm_price,'quantity' => 1);
				// echo "<script>alert('Item  Added');window.location.href='menu.php';</script>";
				echo "<script>swal('Item Added', '', 'success');</script>";
			
			}

		}
		else
		{
			$_SESSION['cart'][0] = array('Item_img'=>$itm_img,'Item_name'=>$itm_name,'Item_price'=>$itm_price,'quantity' => 1);
			// echo "<script>alert('Item Added');window.location.href='menu.php';</script>";
			echo "<script>swal('Item Added', '', 'success');</script>";
		}
	}

	if(isset($_POST['remove_item'])){
		foreach($_SESSION['cart'] as $key => $value)
		{
			print_r($key);
			if($value['Item_name'] == $_POST['itmname'])
			{
			unset($_SESSION['cart'][$key]);
			$_SESSION['cart'] = array_values($_SESSION['cart']);
			echo "<script>alert('Item Removed');window.location.href='cart.php';</script>";
			}
		}
	}
	?>
	<?php include('include/header.php'); ?>

	<!-- content -->

	<!-- home -->
	<section class="menuhome" id="home">
		<div class="row">
			<div class="item item-first">
				<div class="caption">
					<div class="container">
						<div class="col-md-8 col-sm-12">
							<h3>Coders Cafe &amp; Restaurant</h3>
							<h1>Our mission is to provide an unforgettable experience</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- home section -->
	<div class="row head">
		<div class="col p-3 text-center">
			<h1>OUR MENU</h1>
		</div>
	</div>

	<div class="row homecat">
		<div class="continer">
			<div class="col">
				<div class="p-5">
					<div class="dropdown">
						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Select Category
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						
						<?php
						$cat_sql = "SELECT * FROM `menu_category` WHERE cat_status = '1'";
						$data_ret = $conn->query($cat_sql);
						while($row_ret = $data_ret->fetch_assoc()){
							echo '<a class="dropdown-item" href='."#".$row_ret["cat_name"].'>'.$row_ret["cat_name"].'</a>';
						}
  						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- menu -->
	<section class="productmenu" id="items">
		<div class="container">

			<?php
			$sql = "SELECT * FROM `menu_category` WHERE `cat_status` = '1'";
			$data = $conn->query($sql);
			
			while($row = $data->fetch_assoc()){

				echo'<!-- loop category-->	
				<div class="itemcategory">
					<div class="row" id='.$row["cat_name"].'>
						<div class="category mt-2">
							<p>category: <span>'.$row["cat_name"].'</span></p>
						</div>
					</div>

					<!-- loop item-->
					<div class="row" >';
				$sql2 = "SELECT * FROM `menu_items` where menu_category = '{$row["cat_name"]}' And menu_status = '1'";
				$data2 = $conn->query($sql2);
				while($itm = $data2->fetch_assoc()){
					echo '
					<!-- item -->
					<div class="col-md-3 col-sm-6 col-6 py-3">
						<form method="POST" action="">
							<div class="product-grid">
								<div class="product-image">
									<a href="#" class="image">
										<img class="pic-1"
											src='.menu_img.$itm["menu_image"].'>
									</a>
								</div>
								<div class="product-content">
									
									<h3 class="title"><a href="#">'.$itm["menu_name"].'</a></h3>
									<div class="price">₹ '.$itm["menu_price"].'</div>
									<button class="add-to-cart" href="#" type="submit" name="atcart"><i class="fas fa-cart-plus"></i> Add</button>
									<input type="hidden" name="iname" value="'.$itm["menu_name"].'">
									<input type="hidden" name="iprice" value="'.$itm["menu_price"].'">
									<input type="hidden" name="iimg" value="'.$itm["menu_image"].'">
								</div>
							</div>
						</form>
					</div>';
				}
				echo'
					</div>
				</div>';
			}
			?>
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