<?php 
 require 'config/db.php';
 require 'config/config.php';

if(isset($_POST['submit'])){
   $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
   $title     = mysqli_real_escape_string($conn, $_POST['title']);
   $author    = mysqli_real_escape_string($conn, $_POST['author']);
   $body      = mysqli_real_escape_string($conn, $_POST['body']);

   $query = "UPDATE posts SET
				title  = '$title',
				author = '$author',
				body   = '$body'
			WHERE id   = {$update_id}";

	if(mysqli_query($conn,$query)){
		header('Location: index.php');
	}else{
		echo "Error".mysqli_error($conn);
	}
}
   
   $id = mysqli_real_escape_string($conn, $_GET['id']);

   $query = "SELECT * FROM posts WHERE id=".$id;

   $result = mysqli_query($conn, $query);

   $post = mysqli_fetch_assoc($result);

 
?>

<?php 
	include'inc/header.php';
 ?>
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3>Edit Post</h3>
		</div>
		<div class="card-body">
			<form action="" method="POST">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
				</div>
				<div class="form-group">
					<label>Author</label>
					<input type="text" class="form-control" name="author" value="<?php echo $post['author']; ?>">
				</div>
				<div class="form-group">
					<label>Body</label>
					<textarea rows="6" cols="30" class="form-control" name="body"><?php echo $post['body']; ?></textarea>
				</div>
				<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
				<input type="submit" name="submit" class="btn btn-success">
			</form>
		</div>
	</div>
</div>

 <?php 
	include 'inc/footer.php';
 ?>