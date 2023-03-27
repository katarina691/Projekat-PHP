<!DOCTYPE html>
<html>
	<head>
		<title>Korpa</title>
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
						// id ulogovanog korisnika
			            $user_id = $_SESSION['user_id'];

						// parametar je ID od nakita	
						// ako postoji onda je kliknuo na buy dugme i treba da se unese u bazu da je kupio nakit        
			            if(isset($_GET['id'])) {
			            	$id = $_GET['id'];
				            $query = "INSERT INTO bought_jewelry (user_id, jewelry_id) VALUES ('$user_id', '$id')";
							$result = mysqli_query($conn, $query);
						}
			            
			            // vrati id od nakita koji je ulogovan korisnik kupio
			            $sql = "SELECT jewelry_id FROM bought_jewelry WHERE user_id='$user_id'";
			            $result = mysqli_query($conn, $sql);
			            $j_ids[] = array();
	                    while($row = mysqli_fetch_array($result)){
	                        array_push($j_ids, $row['jewelry_id']);
	                    }

	                    // pripremi niz id nakita prema kome ce da se radi query
	                    $ids = join(',', array_map('intval', $j_ids));

			            $sql = "SELECT * FROM jewelry WHERE id IN ($ids)";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<div class='card d-inline-block'>";
							echo "<img class='card-img-top' src=" . $row['picture_url'] . ">";
							echo "<div class='card-body'>";
							echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
							echo "<p class='card-text'>" . $row['description'] . "</p>";
							echo "<p class='card-text'>" . $row['price'] . "rsd</p>";
							echo "</div>";
							echo "</div>";
						}
					?>
				</div> <!-- /container -->
			</div> <!-- /jewelry-box -->
		</section>
		<?php include 'includes/footer.php';?> <!-- footer -->
	</body>
</html>