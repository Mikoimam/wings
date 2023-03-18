<?php 
	
include 'koneksi.php';
 
?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>
<a href="chart.php?page=products" style="font-size:10px;">Go back to products page</a>
	<form action="" method="POST" class="login-email">
  <div class="container">
  <?php
			$sql = "SELECT * FROM product where product_kode='".$_GET['id']."'";
			
			$query = mysqli_query($conn, $sql);

			if (!$query) {
				die ('SQL Error: ' . mysqli_error($conn));
			}
			while ($row = mysqli_fetch_array($query)){
			if($row['diccount']>0){
				$hargaDiskon = ($row['price']*$row['diccount']/100);
				$harga = $row['price']-$hargaDiskon;
			}else{
				$harga =$row['price'];
			}
			
			//print_r($row);
		?>
	<div class="row justify-content-md-center" style="margin-top:200px;" id="test">
		<div class="col col-lg-2">
		<?php
			if($_GET['id']=="GVB"){
				?>
					<img src="giv_biru.jpg" style="height:100px;widht:100px">
				<?php
			}elseif($_GET['id']=="SKLNL"){
				?>
					<img src="soklin_liquid.jpg" style="height:100px;widht:100px">
				<?php
			}else{
				?>
					<img src="soklin_pewangi.jpg" style="height:100px;widht:100px">
				<?php
			}
		?>
		</div>
		<div class="col-md-auto">
			<?php echo $row['product_name'];?>
			<br>
			<?php
				if($row['diccount']>0){
					?>
						<del><?php echo number_format($row['price']);?></del>
					<?php
				}
			?>
			<br>
			<?php echo number_format($harga);?>
			<br>
			<a style="font-size:13px;">Dimension :<?php echo $row['dimension'];?></a>
			<br>
			<a style="font-size:13px;">Price Unit : PCS</a>
		</div>
	</div>
	<?php
		}
	?>
</div>
  <?php
	$x = 'http://localhost/transaksi/chart.php?page=keranjang_detail';
	$y = 'location.href="'.$x.'"';
  ?>
	
  <form method="post">
	<div class="col-md-12 btnCHek" style="text-align:center;margin-top:10px">
		<a href="chart.php?page=products&action=add&id=<?php echo $_GET['id']?>" style="background-color:#00bfff;color:#ffffff;">BUY</a>
	</div>
  </form>
  
</body>
</html>