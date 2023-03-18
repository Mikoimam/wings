<?php
if(isset($_POST['submit'])){ 
 
foreach($_POST['quantity'] as $key => $val) { 
	if($val==0) { 
		unset($_SESSION['cart'][$key]); 
	}else{ 
		$_SESSION['cart'][$key]['quantity']=$val; 
	} 
} 
 
}
?>
<h1>View cart</h1> 
<a href="chart.php?page=products">Go back to products page</a> 
<form method="post" action="chart.php?page=keranjang"> 
     
	<table> 
	     
		<tr> 
		    <th>Name</th> 
		    <th>Quantity</th> 
		    <th>Price</th> 
		    <th>Items Price</th> 
		</tr> 
		 
		<?php 
		 
			$sql="SELECT * FROM product WHERE product_kode IN ('"; 
					 
					foreach($_SESSION['cart'] as $id => $value) { 
						$sql.=$id.","; 
					} 
					
					$sql=str_replace(",","','",substr($sql, 0, -1))."') ORDER BY product_name ASC"; 
					//echo $sql;
					$query=mysqli_query($conn, $sql); 
					$totalprice=0; 
					while($row=mysqli_fetch_array($query)){ 
						$subtotal=$_SESSION['cart'][$row['product_kode']]['quantity']*$row['price']; 
						$totalprice+=$subtotal; 
					if($row['diccount']>0){
						$hargaDiskon = $row['price']*$row['diccount']/100;
						$row2['price'] = $row['price']-$hargaDiskon;
					}else{
						$row2['price'] = $row['price'];
					}
					?> 
						<tr> 
						    <td><?php echo $row['product_name'] ?></td> 
						    <td><input type="text" name="quantity[<?php echo $row['product_kode'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['product_kode']]['quantity'] ?>" /></td> 
						    <td><?php echo $row2['price'] ?></td> 
						    <td><?php echo $_SESSION['cart'][$row['product_kode']]['quantity']*$row2['price'] ?></td> 
						</tr> 
					<?php 
						 
					} 
		?> 
					<tr> 
					    <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
					</tr> 
		 
	</table> 
	<br /> 
	<button type="submit" class="btn btn-info" name="submit">Update Cart</button> 
	<button type="button" class="btn btn-info" name="submit" onclick="window.location='order.php';">Checkout</button> 
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>