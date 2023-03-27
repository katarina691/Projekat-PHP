<!DOCTYPE html>
<html>
	<head>
		<title>Početna</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Dosis|Satisfy" rel="stylesheet">
  		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    	<link rel="stylesheet" href="styles/bootstrap.min.css">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    	<link rel="stylesheet" type="text/css" href="styles/style.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		<script>
			$(function(){
			  $('.bxslider').bxSlider({
			    auto: 'true',
			    slideWidth: 800	
			  });
			});
		</script>

	</head>
	<body>
		<?php include 'includes/header.php';?> <!-- header -->
		<?php include 'includes/sidebar.php';?> <!-- sidebar -->

		<section class="main">
			<div class="container"> <!-- container -->
				<?php include 'includes/slider.php';?> <!-- slider -->
			</div>
		</section>
		
		<?php include 'includes/footer.php';?> <!-- footer -->
	</body>
</html>