<!-- start php code -->
<?php
// php code for signup
// database connection
include_once("database_con.php");
if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);                     ;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $selquery = "SELECT * FROM signup WHERE name = '$name' AND email = '$email' AND password = '$pass'";
    $res = mysqli_query($conn, $selquery);
    $check = mysqli_num_rows($res);
    if($check > 0)
    {
        header("location:signup.php?run=fail");
    } else
    {
        $inquery = "INSERT INTO signup(name, email, password) VALUES('$name','$email','$pass')";
        mysqli_query($conn, $inquery);
        header("location:home.php");
    }
}
?>
<!-- ending of php code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS - Constructions</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"><!-- Bootstrap -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"><!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
    <link rel="stylesheet" href="css/style.css"><!-- custom css -->
</head>
<body>

   <!-- start navigation -->
   <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="index.php" class="navbar-brand"><img src="images/favicon.png" alt="brand" width="50px" height="50px">&nbsp;RS Constructions</a>
        <span class="navbar-text">
            Customer's Happiness Is Our Aim
        </span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mymenu">
            <ul class="navbar-nav ml-auto custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#members" class="nav-link">Memebers</a></li>
                <li class="nav-item"><a href="#projects" class="nav-link">Projects</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
   </nav>
   <!-- end navigation -->

   <!-- start banner section -->
    <header class="jumbotron image-full" style="background-image: url(images/banner.jpg);">
        <div class="custom-class header-text">
            <div class="shadow-lg custom-div">
                <h1 class="text-uppercase text-danger text-center">Sign Up to RS Constructions</h1><hr>
                <!-- start signup form -->
                <div>
                    <form action="" method="post">
                        <div class="form-group text-center text-light">
                            <label for="name" class="font-weight-bold"> Name </label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="true" autocomplete="off">
                        </div>
                        <div class="form-group text-center text-light">
                            <label for="username" class="font-weight-bold"> Email </label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required="true" autocomplete="off">
                        </div>
                        <div class="form-group text-center text-light">
                            <label for="password" class="font-weight-bold"> Password </label>
                            <input type="password" class="form-control" name="pass" placeholder="Enter Password" required="true">
                        </div>
                        <p class="form-text text-light" style="font-family:ubantu;">Already Have Account!! Please <a href="login.php"><b>LogIn</b></a></p>
                        <div> <!-- checking for already registered -->
                            <?php
                                if(isset($_GET['run']) && ($_GET['run']) == 'fail')
                                echo "<p class='form-text' style='color:#dc3545;'>Already Registered!! Please Login</p>";
                            ?>
                        </div>
                        <div class="pt-3 text-center">
                            <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-sign-in"></i> SignUp</button>
                         </div>
                    </form>
                </div>
                <!-- end signup form -->   
            </div>
        </div>
    </header>
    <!-- end banner section -->

    <!-- script files -->
    <script src="js/jquery-3.4.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <!-- end of script -->
</body>
</html>