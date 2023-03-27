<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Dosis|Satisfy" rel="stylesheet">
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    	<link rel="stylesheet" href="styles/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<?php include 'includes/header.php';?> <!-- header -->
		<?php include 'includes/sidebar.php';?> <!-- sidebar -->
		<?php 
			if (isset($_REQUEST['submit'])){
				$subject = mysqli_real_escape_string($conn, stripslashes($_REQUEST['email']));
				$message = mysqli_real_escape_string($conn, stripslashes($_REQUEST['message']));
				// salji poruku na mejl
				mail("milica.posa2699@gmail.com", $subject, $message);
			}
		?>
		<section class="main">
			<div class="contact-box"> <!-- contact-box -->
				<div class="container"> <!-- container -->
					<div class="row">
						<div class="col-md-7">
							<h2>Kontaktirajte nas</h2>
							<form method="POST">
								<div class="form-group">
									<input class="form-control" type="text" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<textarea class="form-control" name="message" rows="6" cols="25" placeholder="Poruka"></textarea>
								</div>
								<div class="text-center">
									<button class="btn btn-lg btn-success" type="submit">Pošalji</button>
								</div>
							</form>
						</div>
					</div>
				</div> <!-- /container -->
			</div> <!-- /contact-box -->
		</section>
		<?php include 'includes/footer.php';?> <!-- footer -->
	</body>
</html>