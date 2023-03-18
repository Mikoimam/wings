<?php 
	include 'koneksi.php';
	
	error_reporting(0);
 
	session_start();
	 
	if (isset($_SESSION['user'])) {
		header("Location: berhasil_login.php");
	}
	 
	if (isset($_POST['submit'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];
	 
		$sql = "SELECT * FROM login WHERE user='$user' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user'] = $row['user'];
			header("Location: menu.php");
		} else {
			echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
		}
		 
	
}
?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>
	<form action="" method="POST" class="login-email">
		<div class="row">
			<div class="col-md-12" style="text-align:center;margin-top:150px;">
				<h3>Login</h3>
			</div>
			<div class="col-md-4" style="text-align:center">
			</div>
			<div class="col-md-4" style="text-align:center;margin-top:10px">
				<input type="text" class="form-control" placeholder="username"  name="user" />
				<input type="password" class="form-control" placeholder="password" style="margin-top:10px" name="password"/>
			</div>
			<div class="col-md-4" style="text-align:center">
			</div>
			<div class="col-md-12" style="text-align:center;margin-top:10px">
				<button class="btn btn-info" name="submit">Login</button>
			</div>
			
		<div>
	</form>
</body>
</html>