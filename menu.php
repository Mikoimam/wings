<?php
	
	if (isset($_POST['submit'])) {
		session_start();
		session_destroy();
		 
		header("Location: index.php");
	}
	
	if (isset($_POST['product'])) {
		session_start();
		//session_destroy();
		 
		header("Location: chart.php");
	}
	
	if (isset($_POST['laporan'])) {
		session_start();
		//session_destroy();
		 
		header("Location: laporan.php");
	}
	
	//session_start();
//	echo $_SESSION['user'];
	//exit;
?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>
	<form action="" method="POST" class="login-email">
		<div class="row">
			<div class="col-md-12" style="text-align:center;margin-top:150px;">
			</div>
			<div class="col-md-4" style="text-align:center">
			</div>
			<div class="col-md-4" style="text-align:center">
			</div>
			<div class="col-md-12" style="text-align:center;margin-top:10px">
				<button class="btn btn-info" name="product">Product List</button>
			</div>
			<div class="col-md-4" style="text-align:center">
			</div>
			<div class="col-md-12" style="text-align:center;margin-top:10px">
				<button class="btn btn-info" name="laporan">Report Penjualan</button>
			</div>
			<div class="col-md-4" style="text-align:center">
			</div>
			<div class="col-md-12" style="text-align:center;margin-top:10px">
				<button class="btn btn-info" name="submit">Logout</button>
			</div>
			
		<div>
	</form>
</body>
</html>