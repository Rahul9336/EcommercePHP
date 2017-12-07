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
        <li><a href="#">All Products</a></li>
        <li><a href="#">MY Account</a></li>
		<li><a href="cart.php">Cart<span class="badge">8</span></a></li>
      </ul>
      <ul>  
      <form class="navbar-form navbar-left">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
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
			<div id="content_area">
			<div id="shopping_cart">
			<span>
			<marquee style="font-size:20px;" id="movinghead">Welcome To World OF Shopping</marquee>
			</span>
			</div>
			<div id="products_box" >
			<?php 
			$get_pro="select* from products";

$run_pro=mysqli_query($con, $get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];

echo"
<div id='single_product'>
<img src='admin/product_images/$pro_image' alt='Product image' width='180' height='180'/>
        <h3>$pro_title</h3>
		<p><b>RS:-$pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>Description</a>
		<a href='details.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>
</div>
";
} ?>
			</div>
			
			
			</div>
			
			
			
			</div>		
			</div>
			<div id="footer">
			
			<h2 style="text-align:center; padding-top:15px;">&copy; 2017 by Rahul Gupta</h2>
			</div>
</body>
</html>
