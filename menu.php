<?php
define("TITLE" , "FOODZILLA | Menu");
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/menu.css" />
<link rel="stylesheet" href="css/menunew.css" />
<style>
	#items {
		scroll-padding-top: 150px;
	}

	.itmimage {
		max-width: 100%;
		max-height: 250px;
		overflow: hidden;
		object-fit: cover;
	}
</style>
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
	<?php include('include/header.php'); ?>+


	<!-- home section -->
	<!-- scroll to top -->
	<button type="button" onclick="topFunction()" id="myBtn"  class="btn btn-success btn-circle btn-xl"><i class="fas fa-arrow-up"></i></button>
	
	
	<!-- category -->
	<!-- <div class="row homecat mt-5">
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
						// $cat_sql = "SELECT * FROM `menucategory_tb` WHERE cat_status = '1'";
						// $data_ret = $conn->query($cat_sql);
						// while($row_ret = $data_ret->fetch_assoc()){
						// 	echo '<a class="dropdown-item" href="'."#".$row_ret["cat_name"].'">'.$row_ret["cat_name"].'</a>';
						// }
  						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- irtem card -->
	<?php 

	$sql = "SELECT * FROM `menucategory_tb` WHERE `cat_status` = '1'";
	$data = $conn->query($sql);
	while($row = $data->fetch_assoc())
	{
		echo '
		<!-- category -->
		<section class="scrollcontainer">

		<div class="row mx-2 mt-3">
			<div class="col categoryscroll" id="'.$row["cat_name"].'">
				<span class="badge badge-primary align-right px-2 py-2 mt-5" style="font-size: .9rem; font-weight:400;">
				'.$row["cat_name"].'
				</span>
			</div>
		</div>

		<div class="row shadowed mx-lg-5 mx-3 mt-3">';

		$menusql = "SELECT * FROM `menuitems_tb` where menu_category = '{$row["cat_name"]}' And menu_status = '1'";
		$menudata = $conn->query($menusql);

		while($mrow = $menudata->fetch_assoc())
		{
			echo '
			<!-- card loop -->

			<div class="col-sm-6 col-md-6 col-lg-2">
                <div class="food-card">
                    <div class="food-card_img">
                        <img src='.menu_img.$mrow["menu_image"].' alt="">
                        
                    </div>
                    <div class="food-card_content">
                        <div class="food-card_title-section">
                            <p class="food-card_title">'.$mrow["menu_name"].'</p>
                        </div>
						<div class="food-card_bottom-section">
                            <div class="space-between">
								<div class="pull-right">
								<span class="badge badge-success align-right">'.$mrow["menu_category"].'</span>
								</div>
                            </div>
                        </div>
						<hr>
                        <div class="food-card_bottom-section">
                            <div class="space-between">
								<div class="food-card_price">
                                    <span style="font-family:ROBOTO;">₹'.$mrow["menu_price"].'</span>
                                </div>
								<div class="pull-right">
								
								<form action="" method="post">
									<input type="hidden" name="iname" value="'.$mrow["menu_name"].'">
									<input type="hidden" name="iprice" value="'.$mrow["menu_price"].'">
									<input type="hidden" name="iimg" value="'.$mrow["menu_image"].'">
									<button class="btn btn-danger px-4 py-2 orderbutton" type="submit"  name="atcart"><i class="fas fa-cart-plus"></i> ORDER</button>
								</form>
								</div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
			<!-- end loop -->';
		}
		echo '
	</div>
	</section>	
	<!-- end card -->';
	}
	
	?>







	<!-- end contant -->

	<!-- footer common with common scripts -->
	<?php 
    include('include/footer.php');
	include('include/cmonscripts.php');
	
    ?>
	<script>
		//Get the button
		var mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
		    mybutton.style.display = "block";
		  } else {
		    mybutton.style.display = "none";
		  }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		  document.body.scrollTop = 0;
		  document.documentElement.scrollTop = 0;
		}
		</script>
</body>

</html>