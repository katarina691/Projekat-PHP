<!DOCTYPE html>
<html>
	<head>
		<title>Dodaj članak</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Dosis|Satisfy" rel="stylesheet">
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    	<link rel="stylesheet" href="styles/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<?php include 'includes/header.php';?> <!-- header -->
		<?php include 'includes/sidebar.php';?> <!-- sidebar -->
		<section class="main">
			<div class="jewelry-box"> <!-- jewelry-box -->
				<div class="container"> <!-- container -->

				<?php
					include("includes/auth.php");

					if (isset($_REQUEST['submit'])){
						$title = mysqli_real_escape_string($conn, stripslashes($_REQUEST['title']));
						$description = mysqli_real_escape_string($conn, stripslashes($_REQUEST['description']));

						$query = "INSERT INTO posts (title, description) VALUES ('$title', '$description')";
						$result = mysqli_query($conn, $query);
						if($result){
							echo "<div class='alert alert-success'>
							<h3>Uspesno ste se dodali post.</h3>
							</div>";
						} else {
							echo "<div class='alert alert-danger'>
								Neuspesno
							</div>";
						}
					} 
				?>


					<form method="post">
						<div class="form-group">
	                    	<input type="text" name="title" placeholder="Unesite naziv" class="form-control">
	                    </div>
	                    <div class="form-group">
	                    	<textarea name="description" placeholder="Unesite opis" class="form-control"></textarea>
	                    </div>
	                    <button type="submit" name="submit" class="btn btn-primary">Unesite</button>
	                </form>
				</div> <!-- /container -->
			</div> <!-- /jewelry-box -->
		</section>
		<?php include 'includes/footer.php';?> <!-- footer -->
	</body>
</html>