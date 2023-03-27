<div class="sidebar"> <!-- sidebar -->
	<!-- ako je user ulogovan i ako je admin -->
	<?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) { ?>
		<a href="post-create.php" class="btn btn-lg btn-success mb-4">Dodaj članak</a></br>
	<?php } ?>

	<?php
		// prikazi poslednja 4 clanka
		// opis clanka skrati na 50 karaktera
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 4";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$link = "post-preview.php?id=" . $row["id"];
			echo "<div class='post'>";
			echo "<h4 class='font-weight-bold'><a style='color: #5e3b3b;' href='{$link}'>" . $row["title"] . "</a></h4>";
			echo "<p>" . substr($row['description'],0,50) . "..." . "</p>";
			echo "</div>";
		}
	?>			
</div> <!-- /sidebar -->