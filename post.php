<?php 
 require 'config/db.php';
 require 'config/config.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = 'SELECT * FROM posts WHERE id='.$id;

$result = mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($result);
 
?>

<?php 
	include'inc/header.php';
 ?>
<div class="container">
	<h3><?php echo $post['title']; ?></h3>
	<small>Created on <?php echo $post['created_at']; ?> By <?php echo $post['author']; ?></small>
	<p><?php echo $post['body']; ?></p>
	<a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-info">Edit</a> ||
	<a href="delete.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">Delete</a>
</div>

 <?php 
	include 'inc/footer.php';
 ?>