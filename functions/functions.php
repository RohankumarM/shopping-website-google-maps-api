<?php
//Establishing the connection
$db = mysqli_connect("localhost","root","","myshop");

//For getting ip address
function getRealIpAddr()
{
if(!empty($_SERVER['HTTP_CLIENT_IP']))
//check if from share internet
{
	$ip = $_SERVER['HTTP_CLIENT_IP'];
}
 elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 //to check ip is pass from proxy
 {
	 $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 }
   else{
	   $ip = $_SERVER['REMOTE_ADDR'];
   }
   return $ip;
}

//Creating the function for cart
function cart(){

if(isset($_GET['add_cart'])){
	
	global $db;
	
	  $ip_add = getRealIpAddr();
	  
	  $p_id = $_GET['add_cart'];
	  
	  $check_pro = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
	  
	  $run_check = mysqli_query($db,$check_pro);
	  
	  if(mysqli_num_rows($run_check)>0){
		  
		  echo "";
	  }
		  else{
			  $q = "insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";
			  
			  $run_q = mysqli_query($db,$q);
			  
			  echo "<script>window.open('index.php','_self')</script>";
		  }
	  
}
}

//getting no of items from the cart
function items(){
	if(isset($_GET['add_cart'])){
		
		global $db;
		
	    $ip_add = getRealIpAddr();
		
		$get_items = "select * from cart where ip_add='$ip_add'";
		
		$run_items = mysqli_query($db,$get_items);
		
		$count_items = mysqli_num_rows($run_items);
		
	}
	else {
		
		global $db;
		
		$ip_add = getRealIpAddr();
		
		$get_items = "select * from cart where ip_add='$ip_add'";
		
		$run_items = mysqli_query($db,$get_items);
		
		$count_items = mysqli_num_rows($run_items);
				}
	
	echo $count_items;
	
}


//getting the total price of the items
function total_price() {
	
	    $ip_add = getRealIpAddr();
		
		global $db;
		
		$total=0;
		
		$sel_price = "select * from cart where ip_add='$ip_add'";
		
		$run_price = mysqli_query($db, $sel_price);
		
		while ($record= mysqli_fetch_array($run_price)){
			
			$pro_id = $record['p_id'];
			
			$pro_price = "select * from products where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($db,$pro_price);
			
			while($p_price=mysqli_fetch_array($run_pro_price)){
				
				$product_price = array($p_price['product_price']);
				
				$values = array_sum($product_price);
				
				$total += $values;
			}
			
		}
		
		echo "Rs" . $total;
	
}





function getPro(){
	global $db;
	
	if(!isset($_GET['cat'])){
		
		if(!isset($_GET['cat1'])){
			
			if(!isset($_GET['cat2'])){
				
				if(!isset($_GET['cat3'])){
					
					if(!isset($_GET['cat4'])){
		
		
	  	  
	  $get_products = "select * from products order by rand() LIMIT 0,6";
	  
	  $run_products = mysqli_query($db,$get_products);
	  
	  while($row_products=mysqli_fetch_array($run_products)){
		
		$pro_id = $row_products['product_id'];
		$pro_title = $row_products['product_title'];
		$pro_desc = $row_products['product_desc'];
		$pro_price = $row_products['product_price'];
		$pro_image = $row_products['product_img1'];
		
		echo "
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		<img     src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
		
		<p><b> Price: Rs $pro_price </b></p>
		
		<a href='details.php?pro_id=$pro_id' style='float:left;'> Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'> Add To Cart </button></a>
		
		</div>
		
		";
	  }
	
	}
}
			}
		}
	}
}
	

function getCatPro(){
	global $db;
	
	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
		 	  
	  $get_cat_pro = "select * from products where cat_id='$cat_id'";
	  
	  $run_cat_pro = mysqli_query($db,$get_cat_pro);
	  
	  $count = mysqli_num_rows($run_cat_pro);
	  
	  if($count==0){
		   echo"<h2> Sorry, no Products found in this category!</h2>";
	  }
	  
	  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		
		$pro_id = $row_cat_pro['product_id'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_desc = $row_cat_pro['product_desc'];
		$pro_image =$row_cat_pro['product_img1'];
		
		echo "
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		<img     src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
		
		<p><b> Price: Rs $pro_price </b></p>
		
		<a href='details.php?pro_id=$pro_id' style='float:left;'> Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'> Add To Cart </button></a>
		
		</div>
		
		";
	  }
	
	}
}


function getCat1Pro(){
	global $db;
	
	if(isset($_GET['cat1'])){
		
		$cat_id = $_GET['cat1'];
		 	  
	  $get_cat_pro = "select * from products where cat_id='$cat_id'";
	  
	  $run_cat_pro = mysqli_query($db,$get_cat_pro);
	  
	  $count = mysqli_num_rows($run_cat_pro);
	  
	   if($count==0){
		   echo"<h2> Sorry, no Products found in this category!</h2>";
	  }
	  
	  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		
		$pro_id = $row_cat_pro['product_id'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_desc = $row_cat_pro['product_desc'];
		$pro_image =$row_cat_pro['product_img1'];
		
		echo "
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		<img     src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
		
		<p><b> Price: Rs $pro_price </b></p>
		
		<a href='details.php?pro_id=$pro_id' style='float:left;'> Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'> Add To Cart </button></a>
		
		</div>
		
		";
	  }
	
	}
}



function getCat2Pro(){
	global $db;
	
	if(isset($_GET['cat2'])){
		
		$cat_id = $_GET['cat2'];
		 	  
	  $get_cat_pro = "select * from products where cat_id='$cat_id'";
	  
	  $run_cat_pro = mysqli_query($db,$get_cat_pro);
	  
	  $count = mysqli_num_rows($run_cat_pro);
	  
	   if($count==0){
		   echo"<h2> Sorry, no Products found in this category!</h2>";
	  }
	  
	  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		
		$pro_id = $row_cat_pro['product_id'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_desc = $row_cat_pro['product_desc'];
		$pro_image =$row_cat_pro['product_img1'];
		
		echo "
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		<img     src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
		
		<p><b> Price: Rs $pro_price </b></p>
		
		<a href='details.php?pro_id=$pro_id' style='float:left;'> Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'> Add To Cart </button></a>
		
		</div>
		
		";
	  }
	
	}
}



function getCat3Pro(){
	global $db;
	
	if(isset($_GET['cat3'])){
		
		$cat_id = $_GET['cat3'];
		 	  
	  $get_cat_pro = "select * from products where cat_id='$cat_id'";
	  
	  $run_cat_pro = mysqli_query($db,$get_cat_pro);
	  
	  $count = mysqli_num_rows($run_cat_pro);
	  
	   if($count==0){
		   echo"<h2> Sorry, no Products found in this category!</h2>";
	  }
	  
	  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		
		$pro_id = $row_cat_pro['product_id'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_desc = $row_cat_pro['product_desc'];
		$pro_image =$row_cat_pro['product_img1'];
		
		echo "
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		<img     src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
		
		<p><b> Price: Rs $pro_price </b></p>
		
		<a href='details.php?pro_id=$pro_id' style='float:left;'> Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'> Add To Cart </button></a>
		
		</div>
		
		";
	  }
	
	}
}



function getCat4Pro(){
	global $db;
	
	if(isset($_GET['cat4'])){
		
		$cat_id = $_GET['cat4'];
		 	  
	  $get_cat_pro = "select * from products where cat_id='$cat_id'";
	  
	  $run_cat_pro = mysqli_query($db,$get_cat_pro);
	  
	  $count = mysqli_num_rows($run_cat_pro);
	  
	   if($count==0){
		   echo"<h2> Sorry, no Products found in this category!</h2>";
	  }
	  
	  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		
		$pro_id = $row_cat_pro['product_id'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_desc = $row_cat_pro['product_desc'];
		$pro_image =$row_cat_pro['product_img1'];
		
		echo "
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		<img     src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
		
		<p><b> Price: Rs $pro_price </b></p>
		
		<a href='details.php?pro_id=$pro_id' style='float:left;'> Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'> Add To Cart </button></a>
		
		</div>
		
		";
	  }
	
	}
}




	
function kitchen (){
	global $db;
	
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($db, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<a href='index.php?cat=$cat_id'>$cat_title </a>";
	}
}


function baby_kids(){
	global $db;
	$get_cats = "select * from categories1";
	
	$run_cats = mysqli_query($db, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<a href='index.php?cat1=$cat_id'>$cat_title </a>";
	}
	
}

function Furniture(){
	global $db;
	
	$get_cats = "select * from categories2";
	
	$run_cats = mysqli_query($db, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<a href='index.php?cat2=$cat_id'>$cat_title </a>";
	}
}

function Appliances(){
	global $db;
	
	$get_cats = "select * from categories3";
	
	$run_cats = mysqli_query($db, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<a href='index.php?cat3=$cat_id'>$cat_title </a>";
	}
}

function Healthcare_Medicines(){
	global $db;
	
	$get_cats = "select * from categories4";
	
	$run_cats = mysqli_query($db, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<a href='index.php?cat4=$cat_id'>$cat_title </a>";
	}
}



?>
