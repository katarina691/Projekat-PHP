<?php 
	include("includes/db.php");
	session_start();
?>
<header> <!-- header -->
	<div class="container pt-3 pb-3 clearfix"> <!-- container -->
		<div class="float-left mt-2">
			<a href="./index.php" class="logo">CraftyCorn Nakit</a>
		</div>
		<div class="float-right pt-3">
			<ul>
				<li class="nav-item"><a class="nav-link" href="./index.php">Početna</a></li>
				<li class="nav-item"><a class="nav-link" href="./jewelry.php">Nakit</a></li>
				<li class="nav-item"><a class="nav-link" href="./contact.php">Kontakt</a></li>
				<!-- ako je korisnik ulogovan vidi sledece: -->
				<?php if(isset($_SESSION["user_id"])){ ?>
					<li class="nav-item"><a class="nav-link" href="./cart.php">Korpa</a></li>
					<li class="nav-item"><a class="nav-link" href="./jewelry-favourite.php">Omiljen nakit</a></li>
					<li class="nav-item"><a class="nav-link" href="./logout.php">Logout</a></li>
				<?php } else { ?>
					<li class="nav-item"><a class="nav-link" href="./registration.php">Registruj se</a></li>
					<li class="nav-item"><a class="nav-link" href="./login.php">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</div> <!-- container end -->
</header> <!-- header end -->