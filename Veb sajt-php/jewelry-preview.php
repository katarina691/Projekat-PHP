<!DOCTYPE html>
<html>
    <head>
        <title>Nakit pregled</title>
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
            <?php
                if(isset($_GET['id'])!="") {
                    $id = $_GET['id']; // uhvati id parametar iz url-a

                    $query = "SELECT * FROM jewelry WHERE id='{$id}'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    $buy = "cart.php?id=" . $row['id'];
                    
                    echo "<div class='card d-inline-block card-large'>";
                    echo "<img class='card-img-top' src=" . $row['picture_url'] . ">";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
                    echo "<p class='card-text'>" . $row['description'] . "</p>";
                    echo "<p class='card-text'>" . $row['price'] . "rsd</p>";
                    echo "</div>";
                    echo "<div class='text-center card-body'>";
                            echo "<a href='{$buy}' class='card-link btn btn btn-success'>Kupi</a>";
                            echo "</div>";
                    echo "</div>";
                } 
            ?>
        </section>
        <?php include 'includes/footer.php';?> <!-- footer -->
    </body>
</html>