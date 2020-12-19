<?php 
 require 'config/db.php';
 require 'config/config.php';

if(isset($_POST['submit'])){
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$author = mysqli_real_escape_string($conn, $_POST['author']);
	$body = mysqli_real_escape_string($conn, $_POST['body']);

	$query = "INSERT INTO posts(title,body,author) VALUES ('$title', '$body', '$author')";
	if(mysqli_query($conn,$query)){
		header('Location: index.php');
	}else{
		echo "Error to upload post".mysqli_error($conn);
	}
}

 
?>

<?php 
	include'inc/header.php';
 ?>
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3>Add New Post</h3>
		</div>
		<div class="card-body">
			<form action="" method="POST">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label>Author</label>
					<input type="text" class="form-control" name="author">
				</div>
				<div class="form-group">
					<label>Body</label>
					<textarea rows="6" cols="30" class="form-control" name="body"></textarea>
				</div>
				<input type="submit" name="submit" class="btn btn-success">
			</form>
		</div>
	</div>
</div>
 <?php 
	include 'inc/footer.php';
 ?>