<?php 
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		 
		$id=$_GET['id']; 
		 
		if(isset($_SESSION['cart']["$id"])){ 
			 
			$_SESSION['cart']["$id"]['quantity']++; 
			 
		}else{ 
			 
			$sql_s="SELECT * FROM product
				WHERE product_kode='$id'"; 
				//echo $sql_s;
			$query_s=mysqli_query($conn, $sql_s); 
			if(mysqli_num_rows($query_s)!=0){ 
				$row_s=mysqli_fetch_array($query_s); 
				$kode = $row_s['product_kode'];
				$_SESSION['cart']["$kode"]=array( 
						"quantity" => 1, 
						"price" => $row_s['price'] 
					); 
				 
				 
			}else{ 
				 
				$message="This product id it's invalid!"; 
				 
			} 
			 
		} 
		 
	} 
 
?>
<a href="menu.php">Go back to menu</a> 
<h1>Product List</h1> 
	<table> 
	   <?php 
 
			$sql="SELECT * FROM product ORDER BY product_name ASC"; 
			$query = mysqli_query($conn, $sql);
			 
			while ($row=mysqli_fetch_array($query)) { 
			if($row['diccount']>0){
				$diskon = $row['price'];
				$hargaDiskon = $row['price']*$row['diccount']/100;
				$harga = $row['price']-$hargaDiskon;
			}else{
				$diskon = "";
				$harga=$row['price'];
			}
		?> 
				<tr> 
					<td><a href="detail_product.php?id=<?php echo $row['product_kode'] ?>"><?php echo $row['product_name'] ?></a></td> 
					<td><del> <?php echo $diskon?></del> <?php echo number_format($harga) ?></td> 
					<td><a href="chart.php?page=products&action=add&id=<?php echo $row['product_kode'] ?>">BUY</a></td> 
				</tr> 
		<?php 
				 
			}
			?>
	</table>