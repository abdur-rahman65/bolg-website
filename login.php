<?php 
	 require 'config/db.php';
 	 require 'config/config.php';

 	 session_start();

 	 if (isset($_POST['submit'])){
 	 	$username = stripcslashes($_POST['username']);
 	 	$password = stripcslashes($_POST['password']);

 	 	$query = "SELECT * FROM users WHERE username= '$username' and password= '".md5($password)."'";
 	 	$result = mysqli_query($conn, $query) or die (mysqli_error());

 	 	$rows = mysqli_num_rows($result);

 	 	if ($rows === 1) {
 	 		$_SESSION['username'] = $username;
 	 		header('Location: dashboard.php');

 	 	}else{
 	 		echo "username/password incorrect";
 	 	}
 	 }

 ?>


<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-6 offset-lg-3">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-center">User Login</h3>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group">
								<label>User Name</label>
								<input type="text" class="form-control" name="username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<input type="submit" name="submit" class="btn btn-success btn-block">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'inc/footer.php'; ?>