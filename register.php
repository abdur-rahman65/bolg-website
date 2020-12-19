<?php 
	 require 'config/db.php';
 	 require 'config/config.php';

 	 if(isset($_POST['submit'])){
 	 	$username = stripslashes($_POST['username']);
 	 	$username = mysqli_real_escape_string($conn, $username);
 	 	$email = stripslashes($_POST['email']);
 	 	$email = mysqli_real_escape_string($conn, $email);
 	 	$password = stripslashes($_POST['password']);
 	 	$password = mysqli_real_escape_string($conn, $password);

 	 	$query = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '".md5($password)."')";
 	 	$result = mysqli_query($conn, $query);

 	 	if($result){
 	 		header('Location: login.php');
 	 	}
 	 }else{
 ?>


<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-6 offset-lg-3">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Sign Up Here</h3>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group">
								<label>User name</label>
								<input type="text" class="form-control" name="username">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email">
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
<?php } ;?>
<?php include 'inc/footer.php'; ?>