<?php 
$con =mysqli_connect("localhost","root","","shopping");

if(mysqli_connect_errno()){echo"Failed to connect to Database".mysqli_connect_error();}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function cart(){
	if(isset($_GET['cart'])){
		global $con;
		$ip=getIp();
		$pro_id=$_GET['cart'];
		$check_pro ="select * from cart where ip_address='$ip' AND product_id='$pro_id'";
		$run_check=mysqli_query($con,$check_pro);
		if(mysqli_num_rows($run_check)>0){echo"";}
		else{$insert_pro="insert into cart (product_id,ip_address,quantity) values ('$pro_id','$ip',0)";
		$run_pro=mysqli_query($con, $insert_pro);
		echo "<script>window.open('index.php','_self')</script>";
		}
	}
}
//Cart Total No of item
function total_item(){
	global $con;
	if(isset($_GET['cart'])){
		
		$ip=getIp();
		$get_items="select * from cart where ip_address='$ip'";
		$run_items = mysqli_query($con,$get_items);
		$count_items= mysqli_num_rows($run_items);
	}
	else{
	$ip=getIp();
		$get_items ="select * from cart where ip_address='$ip'";
		$run_items=mysqli_query($con,$get_items);
		$count_items= mysqli_num_rows($run_items);	
	}
	if($count_items==0){echo "";}else{
	echo $count_items;}
}
//Getting the total_price
function cartPrice(){
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
$value = array_sum($price);
$total += $value;
}
}
echo $total;
}
function getcats()
{
	global $con;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con,$get_cats);
	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		echo " <li class='list-group-item'><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";	
	}
}


function getbrands()
{
	global $con;
	$get_brand = "select * from brands";
	$run_brand = mysqli_query($con,$get_brand);
	while($row_cats=mysqli_fetch_array($run_brand)){
		$brand_id=$row_cats['brand_id'];
		$brand_title=$row_cats['brand_title'];
		echo " <li class='list-group-item'><a href='index.php?brand_id=$brand_id'>$brand_title</a></li>";	
	}
}

function getproduct()
{
	if(!isset($_GET['cat_id'])){
	if(!isset($_GET['brand_id'])){
	global $con;
$get_pro="select* from products order by RAND() LIMIT 0,6";

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
		<a href='index.php?cart=$pro_id'><button style='float:right'>Add to cart</button></a>
</div>
";
}}}}

function getcatproduct()
{
	if(isset($_GET['cat_id'])){
		$cat_id=$_GET['cat_id'];
	global $con;
$get_cat_pro="select* from products where product_cat='$cat_id'";

$run_cat_pro=mysqli_query($con, $get_cat_pro);
$count_cat=mysqli_num_rows($run_cat_pro);
if($count_cat==0){echo "<h2>No product In this Category</h2>";
exit();
}
while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
$pro_id=$row_cat_pro['product_id'];
$pro_cat=$row_cat_pro['product_cat'];
$pro_brand=$row_cat_pro['product_brand'];
$pro_title=$row_cat_pro['product_title'];
$pro_price=$row_cat_pro['product_price'];
$pro_image=$row_cat_pro['product_image'];


echo"
<div id='single_product'>
<img src='admin/product_images/$pro_image' alt='Product image' width='180' height='180'/>
        <h3>$pro_title</h3>
		<p><b>RS:-$pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>Description</a>
		<a href='details.php?cart=$pro_id'><button style='float:right'>Add to cart</button></a>
</div>
";
}}}


function getbrandproduct()
{
	if(isset($_GET['brand_id'])){
		$brand_id=$_GET['brand_id'];
	global $con;
$get_brand_pro="select* from products where product_brand='$brand_id'";

$run_brand_pro=mysqli_query($con, $get_brand_pro);
$count_brand=mysqli_num_rows($run_brand_pro);
if($count_brand==0){echo "<h2>No product In this Category</h2>";
exit();
}
while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
$pro_id=$row_brand_pro['product_id'];
$pro_cat=$row_brand_pro['product_cat'];
$pro_brand=$row_brand_pro['product_brand'];
$pro_title=$row_brand_pro['product_title'];
$pro_price=$row_brand_pro['product_price'];
$pro_image=$row_brand_pro['product_image'];


echo"
<div id='single_product'>
<img src='admin/product_images/$pro_image' alt='Product image' width='180' height='180'/>
        <h3>$pro_title</h3>
		<p><b>RS:-$pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>Description</a>
		<a href='deatils.php?cart=$pro_id'><button style='float:right'>Add to cart</button></a>
</div>
";
}}}





?>