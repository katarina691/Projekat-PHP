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
        <?php
            // ako je forma submitovana, unesi vrednosti u bazu podataka
            if (isset($_REQUEST['email'])){
                // brise backslashes i escapes specialne karaktere iz stringa
            	$name = mysqli_real_escape_string($conn, stripslashes($_REQUEST['name']));
                $surname = mysqli_real_escape_string($conn, stripslashes($_REQUEST['surname']));
                $email = mysqli_real_escape_string($conn, stripslashes($_REQUEST['email']));
                $adress = mysqli_real_escape_string($conn, stripslashes($_REQUEST['adress']));
            	$password = mysqli_real_escape_string($conn, stripslashes($_REQUEST['password']));

                $query = "INSERT INTO users (name, surname, email, adress, password, is_admin)
                        VALUES ('$name', '$surname', '$email', '$adress', '".md5($password)."', '0')";
                $result = mysqli_query($conn, $query);
                if($result){
                    header("Location: login.php");
                } else {
                    echo "Nije uspela registracija";
                }
            } else {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <h1 class="mt-4">Registrujte se</h1>
                        <form name="registration" action="" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Ime..." required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="surname" placeholder="Prezime..." required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email..." required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="adress" placeholder="Adresa..." required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Sifra..." required/>
                            </div>
                            <button class="btn btn-lg btn-success" type="submit" name="submit">Registrujte se</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php include 'includes/footer.php';?> <!-- footer -->
    </body> 
</html>