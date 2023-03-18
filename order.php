<?php
	session_start();
	include "koneksi.php";
	
	$sql_kode =" SELECT MAX(document_number) AS nilai FROM transaction_header";
	$result = mysqli_query($conn, $sql_kode);
	$row=mysqli_fetch_array($result);
	$row['nilai']++;
	$invID = str_pad($row['nilai'], 3, '0', STR_PAD_LEFT);
	//echo $invID;
	
	$sql_Insert = "insert into transaction_header(document_code,document_number,user,total,date) values ('TRX','$invID','smit','0',now())";
	$result = mysqli_query($conn, $sql_Insert);
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
						 $sql_detail = "insert into transaction_detail (document_code,document_number,product_code,price,quantity,unit,subtotal,currency) values ('TRX','$invID','".$row['product_kode']."','".$row['price']."','".$_SESSION['cart'][$row['product_kode']]['quantity']."','PCS','$subtotal','IDR')";
						// echo "$sql_detail<br>";
						 $result = mysqli_query($conn, $sql_detail);
					}

				 $sql_update = "update transaction_header set total='$totalprice' where document_number='$invID'";
				$result = mysqli_query($conn, $sql_update);
				
			
	// Finally, destroy the session.
	session_destroy();
?>

<h2>Transaksi Berhasil</h2>
<br>
<a href="chart.php?page=products">Go to Product</a> 
