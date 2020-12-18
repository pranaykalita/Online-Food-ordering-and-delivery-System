<?php
include('php/connection.php');

 
if(isset($_POST['psubmit'])){
 
 
  // Assigning User Values to Variable
  $pname = $_POST['item'];
  $pava = $_POST['details'];
  $ptotal = $_POST['price'];
  $poriginalcost = $_POST['qty'];
  $psellingcost = $_POST['cat'];
  $pimage = $_POST['image'];

   $sql = "INSERT INTO `menu`(`item`, `details`, `price`, `quantity`, `category`, `image`) VALUES ('$pname','$pava','$ptotal','$poriginalcost','$psellingcost','$pimage')";
   echo $sql;
   $data = mysqli_query($conn, $sql);
   $return = mysqli_num_rows($data);

   if($return>0 ){
  
    $msg = ' no add';

   } else {
    
    $msg =  'Added Successfully';
   }
 }
 
?>

<h3 class="text-center">Add New Product</h3>
<form action="" method="POST">
    <div class="form-group">
        <label for="pname">Product Name</label>
        <input type="text" class="form-control" id="pname" name="item"></div>

    <div class="form-group">
        <label for="pava">details</label>
        <input
            type="text"
            class="form-control"
            id="pava"
            name="details"
            ></div>
    <div class="form-group">
        <label for="ptotal">price</label>
        <input
            type="text"
            class="form-control"
            id="ptotal"
            name="price"
            onkeypress="isInputNumber(event)"></div>
    <div class="form-group">
        <label for="poriginalcost">available qty</label>
        <input
            type="text"
            class="form-control"
            id="poriginalcost"
            name="qty"
            onkeypress="isInputNumber(event)"></div>
    <div class="form-group">
        <label for="psellingcost">category</label>
        <input
            type="text"
            class="form-control"
            id="psellingcost"
            name="cat"
            ></div>
    <div class="form-group">
        <label for="psellingcost">image</label>
        <input
            type="file"
            class="form-control"
            id="psellingcost"
            name="image"
          ></div>
    <div class="text-center">
        <button type="submit" id="psubmit" name="psubmit">Submit</button>
       
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
</form>
</div>


<?php
echo "available categorys rn"."<br><br><br>";
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  " categoryName: ". $row["category"]. "<br>";
    }
} else {
    echo "0 results";
}


?>
<br>
<?php
echo "available categorys rn"."<br><br><br>";
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  " item name: ". $row["item"]. "<br>";
    }
} else {
    echo "0 results";
}


?>
<!-- Only Number for input fields -->
<script>
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}
</script>