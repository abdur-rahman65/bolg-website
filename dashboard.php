<?php 
	 require 'config/db.php';
 	 require 'config/config.php';
 	 require 'auth.php';

 	 $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id ASC");
?>



<?php include 'inc/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<table class="table table-hover">
				<thead>
					<th>User Name</th>
					<th>Email</th>
				</thead>
				<tbody>
					<?php while($show = mysqli_fetch_array($result)){ ?>
						<tr>
							<td><?php echo $show['username']; ?></td>
							<td><?php echo $show['email']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>