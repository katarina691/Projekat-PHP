<!DOCTYPE html>
<html>
	<head>
		<title>Nakit</title>
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
					<!-- ako je user ulogovan i ako je admin -->
					<?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) { ?>
						<a href="jewelry-create.php" class="btn btn-lg btn-primary mb-4">Dodaj nakit</a></br>
					<?php } ?>

					<?php
						// vrati sve nakite i izlistaj ih
						// dodaj 3 buttona za preview, favourite, buy, delete
			            $sql = "SELECT * FROM jewelry";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$preview = "jewelry-preview.php?id=" . $row['id'];
							$favourite = "jewelry-favourite.php?id=" . $row['id'];
							$buy = "cart.php?id=" . $row['id'];
							$delete = "jewelry-delete.php?id=" . $row['id'];
							echo "<div class='card d-inline-block'>";
							echo "<img class='card-img-top' src=" . $row['picture_url'] . ">";
							echo "<div class='card-body'>";
							echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
							echo "<p class='card-text'>" . substr($row['description'], 0, 30) . "..." . "</p>";
							echo "</div>";
							echo "<div class='text-center card-body'>";
							// preview dugme mogu svi da vide
							echo "<a href='{$preview}' class='card-link btn btn-sm btn-primary'>Pogledaj</a>";

							// prikazi favourite i buy dugme samo ulogovanim korisnicima
							if(isset($_SESSION['user_id'])) {
								echo "<a href='{$favourite}' class='card-link btn btn-sm btn-warning'>Dodaj u omiljene</a>";
								echo "<a href='{$buy}' class='card-link btn btn-sm btn-success'>Kupi</a>";
							}

							// prikazi delete dugme samo adminu
							if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
								echo "<a href='{$delete}' class='card-link btn btn-sm btn-danger'>Obriši</a>";
							}
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