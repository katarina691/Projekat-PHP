<!DOCTYPE html>
<html>
    <head>
        <title>Obriši nakit</title>
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
                // ovu stranicu moze da vidi samo ulogovan korisnik
                include("includes/auth.php");

                if(isset($_GET['id'])!="") {
                    $id = $_GET['id']; // uhvati parametar ID iz url-a

                    $query = "DELETE FROM jewelry WHERE id='{$id}'";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        echo "<div class='alert alert-success'>Uspešno ste se obrisali nakit.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Neušpesno</div>";
                    }
                } 
            ?>
        </section>
        <?php include 'includes/footer.php';?> <!-- footer -->
    </body>
</html>