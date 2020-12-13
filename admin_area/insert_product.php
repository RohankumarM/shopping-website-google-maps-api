<?php
include("includes/db_connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>

<body bgcolor="#999999">

<form method="post" action="insert_product.php" enctype="multipart/form-data">

    <table width="700" align="center" border="1" bgcolor="#6666FF">
    
       <tr align="center">
         <td colspan="2"><h1> Insert new product:</h1></td>
       </tr>
       
       <tr>
         <td align="right"><b> Product title </b></td>
         <td><input type="text" name="product_title" size="50"/> </td>
       </tr>
       
       <tr>
       <td align="right"><b> Product Category</b></td>
         <td>
         <select name="product_cat">
          <option> Select a Category</option>
    <?php
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<option value='$cat_id'>$cat_title</option>";
	}
	?>
     <?php
	$get_cats = "select * from categories1";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<option value='$cat_id'>$cat_title</option>";
	}
	?>
    
     <?php
	$get_cats = "select * from categories2";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<option value='$cat_id'>$cat_title</option>";
	}
	?>
    
     <?php
	$get_cats = "select * from categories3";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<option value='$cat_id'>$cat_title</option>";
	}
	?>
    
     <?php
	$get_cats = "select * from categories4";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id= $row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
	
    echo "<option value='$cat_id'>$cat_title</option>";
	}
	?>
          
       </select>
       </td>
       
       </tr>
       
       <tr>
         <td align="right"><b> Product Image1 </b></td>
         <td><input type="file" name="product_img1"/> </td>
       </tr>
       <tr>
          <td align="right"><b> Product Image2 </b></td>
         <td><input type="file" name="product_img2"/> </td>
       </tr>
       <tr>
         <td align="right"><b> Product Image3 </b></td>
         <td><input type="file" name="product_img3"/> </td>
       </tr>
       <tr>
         <td align="right"><b> Product Price </b></td>
         <td><input type="text" name="product_price"/> </td>
       </tr>
       <tr>
         <td align="right"><b> Product Description </b></td>
         <td><textarea name="product_desc" cols="5" rows="5"></textarea> </td>
       </tr>
       <tr>
         <td align="right"><b> Product Keywords </b></td>
         <td><input type="text" name="product_keywords" size="50"/> </td>
       </tr>
       <tr align="center">
         <td colspan="2"><input type="submit" name="insert_product" value="Insert Product" /></td>
       </tr>


</form>
</body>
</html>
<?php

  if(isset($_POST['insert_product'])){
	  
	  
	  //this are text data variables
	  $product_title = $_POST['product_title'];
	  $product_cat = $_POST['product_cat'];
	  $product_price = $_POST['product_price'];
	  $product_desc = $_POST['product_desc'];
	  $status = 'on';
	  $product_keywords = $_POST['product_keywords'];
	  
	  //this are image names
	  $product_img1 = $_FILES['product_img1']['name'];
	  $product_img2 = $_FILES['product_img2']['name'];
	  $product_img3 = $_FILES['product_img3']['name'];
	  
	  //Image temp names
	  $temp_name1 = $_FILES['product_img1']['tmp_name'];
	  $temp_name2 = $_FILES['product_img2']['tmp_name'];
	  $temp_name3 = $_FILES['product_img3']['tmp_name'];
	  
	  //validating form
	  if($product_title=='' OR $product_cat=='' OR $product_price=='' OR       $product_desc=='' OR $product_keywords=='' OR $product_img1==''){       echo "<script>alert('Please fill all the fields!')</script>";   
	   exit();
	   }
	   
	   else {
		   
		   //uploading images to the folder
		   move_uploaded_file($temp_name1,"product_images/$product_img1");
		   move_uploaded_file($temp_name2,"product_images/$product_img2");
		   move_uploaded_file($temp_name3,"product_images/$product_img3");
		   
		   $insert_product =  "insert into products (cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status) values ('$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')"; 
		   
		   $run_product = mysqli_query($con, $insert_product);
		   
		   if($run_product){
		   echo "<script>alert('Product Inserted Successfully.')</script>";
		   }
		   else{
			   echo "Error:" .$insert_product."<br>". mysqli_error($con);
			   }
		   
	   }
	  
  }


?>