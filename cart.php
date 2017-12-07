<?php session_start();?>
<!DOCTYPE html>
<?php 
include("functions/function.php");
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/style.css"/>
  <link rel="stylesheet" href="styles/sidebar.css"/>
</head>
<body>
					<div class="header_wrapper">
						<a href="index.php"><img  class="img-responsive" src="images/logo.png" alt="logo" id="logo"/></a>
						<img id="banner" src="images/download.jpg"/>
					</div>
					<div>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <a class="navbar-brand" href="#">World OF shopping</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <li><a href="all_product.php">All Products</a></li>
        <li><a href="#">MY Account</a></li>
		<li><a href="cart.php">Cart<span class="badge"><?php total_item(); ?></span></a></li>
      </ul>
      <ul>  
      <form class="navbar-form navbar-left" action="result.php">
      <div class="input-group">
        <input type="text" name="search_box" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="search_button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Login</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Sign up</a></li>
      </ul>
    </div>
  </div>
</nav>
</nav>
</div>
			<div class="container">
			<div class="content_wrapper">
			<div id="sidebar">
			
			<div id="sidebar_title">Categories</div>
			  <ul class="list-group" id="cats">
			<?php getcats(); ?>
				</ul>
				<div id="sidebar_title">Brands</div>
				 <ul class="list-group" id="cats">
   <?php getbrands(); ?>
				</ul>
			</div>
			<?php echo $ip=getip(); ?>
			<div id="content_area"> <?php cart(); ?>
			<div id="shopping_cart">
			<span>
			<marquee style="font-size:20px;" id="movinghead">Welcome To World OF Shopping</marquee>
			</span>
			</div>
			<div id="products_box" >
			<form action="cart.php" method="post" enctype="multipart/form-data">
		          <div align="center">
  <table width="700" bgcolor="skyblue">
      <tr align="center">
        <th>Remove</th>
        <th>Products</th>
        <th>Quantity</th>
        <th>Total Price</th>
      </tr>
	  <?php 
	  	global $con;
	$ip = getIp();
	$total = 0;
	$select_price = "select * from cart where ip_address='$ip'";
	$run_select = mysqli_query($con, $select_price);
while ($product_select=mysqli_fetch_array($run_select)) {
$product_id = $product_select['product_id'];
$product_price = "select * from products where product_id='$product_id'";
$run_price = mysqli_query($con, $product_price);
while ($pro_price = mysqli_fetch_array($run_price)) {
$price = array($pro_price['product_price']);
$title=$pro_price['product_title'];
$image=$pro_price['product_image'];
$single_price=$pro_price['product_price'];
$value = array_sum($price);
$total += $value;
	  ?>
	  <tr>
	  <td><input type="checkbox" name="delete[]" value="<?php echo $product_id;?>"/></td>
	  <td><?php echo $title; ?><br><img src="admin/product_images/<?php echo $image; ?>"width="80" height="80"/></td>
	  <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td>
	 <?php
	 global $con;
	 if(isset($_POST['update_cart'])){
		 $qty=$_POST['qty'];
		 $update_qty="update cart set quantity='$qty'";
		 $run_qty=mysqli_query($con,$update_qty);
		 $_SESSION['qty']=$qty;
		 $total= $total*$qty;
	 }
	 
	 ?> 
	  <td><b>RS <?php echo $single_price; ?></b></td>
	  </tr>
<?php }}?>
<tr align="right">
<td colspan="5"><b>Sub Total:<?php echo "RS " . $total;?></b></td>
  </tr>
  <tr align="center">
  <td><input type="submit" name="update_cart" value="Update Cart"/></td>
  <td><input type="submit" name="continue" value="Continue Shopping"/></td>
  <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button> </td>
  </tr>
  </table>
  </form>
  <?php
  function updatecart(){
  global $con;
  $ip=getIp();
  if(isset($_POST['update_cart'])){
	  foreach($_POST['delete'] as $remove_id){
		$delete_product ="delete from cart where product_id='$remove_id' AND ip_address='$ip'";
$run_delete=mysqli_query($con,$delete_product);
if($run_delete){
	echo "<script>window.open('cart.php','_self')</script>";
}		
	  }
  }}
  if(isset($_POST['continue'])){echo "<script>window.open('index.php','_self')</script>";}
  echo @$up_cart = updatecart();
  ?>
  </div>
			</div>
			
			
			</div>
			
			</div>		
			</div>
			<div id="footer">
			
			<h2 style="text-align:center; padding-top:15px;">&copy; 2017 by Rahul Gupta</h2>
			</div>
</body>
</html>
