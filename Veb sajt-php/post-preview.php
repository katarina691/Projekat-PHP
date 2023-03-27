<!DOCTYPE html>
<html>
    <head>
        <title>Pregled članka</title>
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
                    $id = $_GET['id'];

                    $query = "SELECT * FROM posts WHERE id='{$id}'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    echo "<h1>" . $row["title"] . "</h1>";
                    echo "<p>" . $row["description"] . "</p>";
                } 
            ?>
        </section>
        <?php include 'includes/footer.php';?> <!-- footer -->
    </body>
</html>