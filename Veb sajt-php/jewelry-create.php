<!DOCTYPE html>
<html>
	<head>
		<title>Dodaj nakit</title>
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
						// ovu stranicu moze da vidi samo ulogovan
						include("includes/auth.php");

						if (isset($_REQUEST['submit'])){
							$name = mysqli_real_escape_string($conn, stripslashes($_REQUEST['name']));
							$description = mysqli_real_escape_string($conn, stripslashes($_REQUEST['description']));
							$picture_url = mysqli_real_escape_string($conn, stripslashes($_REQUEST['picture_url']));
							$price = (int) mysqli_real_escape_string($conn, stripslashes($_REQUEST['price']));

							$query = "INSERT INTO jewelry (name, description, picture_url, price) VALUES ('$name', '$description', '$picture_url', '$price')";
							$result = mysqli_query($conn, $query);
							if($result){
								echo "<div class='alert alert-success'>
								<h3>Uspesno ste se dodali nakit.</h3>
								Kliknite ovde da vidite sav nakit: <a href='jewelry.php'>Nakit</a>
								</div>";
							} else {
								echo "<div class='alert alert-danger'>Neuspesno</div>";
							}
						} 
					?>

					<form method="post">
						<div class="form-group">
	                    	<input type="text" name="name" placeholder="Unesite naziv nakita" class="form-control">
	                    </div>
	                    <div class="form-group">
	                    	<textarea name="description" placeholder="Unesite opis nakita" class="form-control"></textarea>
	                    </div>
	                    <div class="form-group">
	                    	<input type="text" name="picture_url" placeholder="Unesite url nakita" class="form-control">
	                    </div>
	                    <div class="form-group">
	                    	<input type="text" name="price" placeholder="Unesite cenu nakita" class="form-control">
	                    </div>
	                    <button type="submit" name="submit" class="btn btn-primary">Unesite</button>
	                </form>
				</div> <!-- /container -->
			</div> <!-- /jewelry-box -->
		</section>
		<?php include 'includes/footer.php';?> <!-- footer -->
	</body>
</html>