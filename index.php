<?php
include("includes/db_connect.php");
include("functions/functions.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Shopping Website </title>
<link  rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>

<!--Main Container Starts-->
<div class="main_wrapper">
 
<!--Header starts-->
<div class="header_wrapper">
   <a href="index.php"><img src="images/name.jpg" style="float:left;"></a>
   <img src="images/Adv-banner.jpg" style="float:right;">
</div>
<!--Header ends-->

<!--Navigation bar starts-->
<div id="navbar">

  <ul id="menu">
    <li><a href="index.php">Home </a></li>
    <li><a href="all_products.php">Products </a></li>
    <li><a href="my_account.php">My Account </a></li>
    <li><a href="user_register.php">Sign Up </a></li>
    <li><a href="cart.php">Shopping Cart </a></li>
    <li><a href="contact.php">Contact Us </a></li>
  </ul>
  
   <div id="form">
   <form method="get" action="results.php" enctype="multipart/form-data">
   <input type="text" name="user_query" placeholder="Search a Product"/> 
   <input type="submit" name="Search" value="Search"/>
   </form>
   </div>
  
</div>
<!--Navigation bar end-->

<div class="content_wrapper"> 

    <!--left_sidebar starts-->
    <div id="left_sidebar"> 
    
    <div id="sidebar_title"> Categories </div>
    
    <div class="dropdown">
    <button class="dropbtn"> Kitchen </button>
    <div class="dropdown-content">
    <?php
    kitchen();
	?>
    </div>
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>
    
    <div class="dropdown">
    <button class="dropbtn"> Baby & Kids </button>
    <div class="dropdown-content">
    <?php
	Baby_kids();
	?>
    </div>
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>
    
    <div class="dropdown">
    <button class="dropbtn"> Furniture </button>
    <div class="dropdown-content">
    <?php
	Furniture();
	?>
    </div>
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>
    
    <div class="dropdown">
    <button class="dropbtn"> Appliances </button>
    <div class="dropdown-content">
    <?php
	Appliances();
	?>
    </div>
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>
    
    <div class="dropdown">
    <button class="dropbtn"> Health care and Medicines </button>
    <div class="dropdown-content">
    <?php
	Healthcare_Medicines();
	?>
    </div>
    </div>
    
    
   
    </div>
    <!--left_sidebar ends-->
    <div id="right_content"> 
    <?php cart(); ?>
    
      <div id="headline">
        <div id="headline_content">
         <b>Welcome Guest</b>
         <b style="color:yellow;"> Shopping Cart:</b>
         <span>- Total Items: <?php items(); ?> - Total Price:<?php total_price(); ?></span>  
        </div>
      
      </div>
      
      <div id="products_box">
           <?php
		   getpro();
		   getCatPro();
		   getCat1Pro();
		   getCat2Pro();
		   getCat3Pro();
		   getCat4Pro();
		   ?>
      </div>
     </div>
      
<div class="footer"> Footer Area

<h1 style="color:#000; padding-top:30px; text-align:center;">&copy; 2017 - By Rohan & Rohit </h1>

</div>


</div>
<!--Main Container Ends-->
<p>&nbsp;</p>
</body>
</html>