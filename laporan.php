<?php 
	include 'koneksi.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
   
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	 
	<title>Report Penjualan</title> 
</head> 
<body> 
<a href="menu.php">Go back to Menu</a> 
<h4 align='left'>Report Penjualan</h4> 
	<table align='center' class="table table-bordered border-primary"> 
	    <tr> 
	        <th>Transaction</th> 
	        <th>User</th> 
	        <th>Total</th> 
	        <th>Date</th> 
	        <th>Item</th> 
	    </tr> 
	   <?php 
 
			$sql="SELECT * FROM transaction_header ORDER BY document_number ASC"; 
			$query = mysqli_query($conn, $sql);
			 
			while ($row=mysqli_fetch_array($query)) { 
				 
		?> 
				<tr> 
					<td><?php echo $row['document_code'] ?>-<?php echo $row['document_number'] ?></td> 
					<td><?php echo $row['user'] ?></td> 
					<td align="right"><?php echo number_format($row['total']) ?></td> 
					<td><?php echo date("d F Y", strtotime($row['date']))?></td> 
					<td>
					<?php
						$sql2="SELECT b.product_name,a.quantity FROM transaction_detail a inner join product b on a.product_code=b.product_kode where a.document_number='".$row['document_number']."'"; 
						//echo $sql2;
						//exit;
						$query2 = mysqli_query($conn, $sql2);
						 
						while ($row2=mysqli_fetch_array($query2)) {
							?>
							<table>	
								<tr>
									<td><?php echo $row2['product_name']?> x <?php echo $row2['quantity']?><td>
								</tr>
							</table>
							<?php
						}
					?>
					</td> 
				</tr> 
		<?php 
				 
			}
			?>
	</table>
 
</body> 
</html>