<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
   
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="stylesheet" href="reset.css" /> 
	<link rel="stylesheet" href="style.css" /> 
	 
	<title>Shopping cart</title> 
</head> 
 
 <?php 
	session_start(); 
	require("koneksi.php"); 
	if(isset($_GET['page'])){ 
		 
		$pages=array("products", "keranjang"); 
		 
		if(in_array($_GET['page'], $pages)) { 
			 
			$_page=$_GET['page']; 
			 
		}else{ 
			 
			$_page="products"; 
			 
		} 
		 
	}else{ 
		 
		$_page="products"; 
		 
	} 
?>
<body> 
	 
	<div id="container"> 
 
		<div id="main"> 
			 <?php require($_page.".php"); ?>
		</div><!--end main--> 
		 
		<div id="sidebar"> 
			 <h1>Cart</h1> 
				<?php 
				 
					if(isset($_SESSION['cart'])){ 
						 
						$sql="SELECT * FROM product WHERE product_kode IN ('"; 
						 
						foreach($_SESSION['cart'] as $id => $value) { 
							$sql.=$id.","; 
						} 
						 
						$sql=str_replace(",","','",substr($sql, 0, -1))."') ORDER BY product_name ASC"; 
						//echo $sql;
						$query=mysqli_query($conn, $sql); 
						while($row=mysqli_fetch_array($query)){ 
							 
						?> 
							<p><?php echo $row['product_name'] ?> x <?php echo $_SESSION['cart'][$row['product_kode']]['quantity'] ?></p> 
						<?php 
							 
						} 
					?> 
						<hr /> 
						<a href="chart.php?page=keranjang">NEXT</a> 
					<?php 
						 
					}else{ 
						 
						echo "<p>Your Cart is empty. Please add some products.</p>"; 
						 
					} 
				 
				?>
		</div><!--end sidebar--> 
 
	</div><!--end container--> 
 
</body> 
</html>