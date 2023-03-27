<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Dosis|Satisfy" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>
    <body>
        <?php include 'includes/header.php';?> <!-- header -->
		<?php
			// ako je forma submitovana, unesi vrednosti u bazu podataka
			if (isset($_POST['email'])){
			    // brise backslashes i escapes specialne karaktere iz stringa
				$email = mysqli_real_escape_string($conn, stripslashes($_REQUEST['email']));
				$password = mysqli_real_escape_string($conn, stripslashes($_REQUEST['password']));
				// proverava da li je korisnik postojeci u bazi ili ne
				$query = "SELECT * FROM users WHERE email='$email' and password='".md5($password)."'";
				$result = mysqli_query($conn, $query);
				$rows = mysqli_num_rows($result);
		        if($rows == 1){
			    	$rowsingle = mysqli_fetch_array($result, MYSQLI_ASSOC);
		        	// postavlja vrednosti u session objektu
			    	$_SESSION['user_id'] = $rowsingle['id'];
			    	$_SESSION['is_admin'] = (int) $rowsingle['is_admin'];
		        	// preusmerava korisnika na index.php
			    	header("Location: index.php");
		        } else {
					echo "<div class='alert alert-danger'>Neuspesno</div>";
				}
			} else {
		?>
		<div class="container">
	        <div class="row">
	            <div class="col-md-6">
	            	<div class="form">
						<h1 class="mt-4">Ulogujte se</h1>
						<form action="" method="post" name="login">
							<div class="form-group">
								<input class="form-control" type="email" name="email" placeholder="Email..." required />
							</div>
							<div class="form-group">
								<input class="form-control" type="password" name="password" placeholder="Sifra..." required/>
							</div>	
							<button type="submit" name="submit" class="btn btn-lg btn-success">Ulogujte se</button>
						</form><br>
						<p>Jos uvek niste registrovani? <a href='registration.php'>Registrujte se ovde</a></p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php include 'includes/footer.php';?> <!-- footer -->
	</body>
</html>