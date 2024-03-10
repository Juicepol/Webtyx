<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $mysqli = require __DIR__ . "/database.php";

        $sql = sprintf("SELECT * FROM user
                        WHERE email = '%s'",
                        $mysqli->real_escape_string($_POST["email"]));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if ($user) {
            if(password_verify($_POST["password"], $user["Password"])) { //$user["column name sa database table"]

                session_start();

                $_SESSION["user_id"] = $user["ID"]; //set the user_id session varable to the ID column in database to ensure logged in

                header("Location: index.php");
                exit;

            }
        }
        $is_invalid = true;
    }

    session_start();
    if (isset($_SESSION["user_id"])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<style>
.container {
        width:100%;
	}
.wrapper {
    width: 100%;
    padding: 50px 16%;
    background: #FFFFFF;
    color: #1c0404;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}
img {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}
.navbar.bg1 {
    background-color: #000000;
}

.navkular:link {
	color: #FFFFFF;
    font-size: 20px;
    font-family: 'Lora';
}
@media (max-width: 768px) {
    .wrapper {
        padding: 50px 10%;
    }
}

@media (max-width: 576px) {
    .wrapper {
        padding: 50px 5%;
    }
}
.input-box input {
    width: 100%;
    height: 20px;
    background:  #fbf8f6;
    border: none;
    outline: none;
    border: 2px solid rgba(53, 44, 44, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #000000;
    padding: 20px;
}
.btn-login{
    width: 100%;
    border-radius: 40px;
}
.btn-regis{
    width: 100%;
    border-radius: 40px;
}
.btn-secondary{
    width: 100%;
    border-radius: 40px;
}
.col-md{
    padding: 0 !important;
    margin: 0 !important;
}
h2{

    font-weight: bold;
    font-size: 70px;
    align-content: left;
}
h1{
    font-weight: bold;
    font-family: 'Lora';
}
.p1{
    color: #808080;
}
.p2{
    color: #808080;
    font-size: 15px;
}
section {
    font-family: 'lato';
}
.rad{
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}
.bg1 {
    background-color: #1F2833;
}
.navparagraph{
    font-family: 'Verdana';
    font-weight: bold;
    color: #C2C2C1;
    font-size: 14px;
    position: absolute;
    top: 38px;
    right: 60px;
}
.navkular {
    color: #DBDBDB;
}
.navkular:hover {
    color: #DBDBDB;
}
.navkular:link {
    color: #DBDBDB;
}
.nav-item-color {
    font-weight: bold;
    color: #DBDBDB;
}
.nav-font-bold {
    font-weight: bold;
}
.custom-navbar2 {
    background-color: #0d0c0b;
}
.navbar-brand {
    font-size: 40px;
    font-family: 'Sans-serif';
    font-weight: bold;
    }
</style>
<body>

    <nav id="top" class="navbar navbar-expand-lg bg1 navbar-dark">
    <div class="container">
        <span class="navbar-brand">Webtyx</span>
        <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navigationbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center p-4 order-3 order-lg-2" id="navigationbar">
            <ul class="navbar-nav nav-font-bold">
                <li class="nav-item px-5">
                    <a href="index.php" class="nav-link navkular">Home</a>
                </li>
                <li class="nav-item px-5">
                    <a href="about.php" class="nav-link navkular">About Me</a>
                </li>
                <li class="nav-item px-5">
                    <a href="blog.php" class="nav-link navkular">Blog</a>
                </li>
                <li class="nav-item px-5">
                    <a href="contact.php" class="nav-link navkular">Contact Information</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>


    <section class="bg1 text-light p-5">
        <br>
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-md rad">
                    <?php
                    $errors = array();

                    if(isset ($_POST["login"])){
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                            require_once "database.php";
                            $sql = "SELECT * FROM user WHERE email = '$email'";
                            $result = mysqli_query($mysqli, $sql);
                            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            if ($user) {
                                if(password_verify($password, $user["Password"])) { //$user["column name sa table"]
                                    $_SESSION["user"] = "yes";
                                    header("Location: login.php");
                                    die();
                                
                                } else {
                                    array_push($errors, "Password does not match");
                                }
                            } else {
                                array_push($errors, "Email does not match");
                            }
                        }    
                    
                    ?>
                    
                    <form action="login.php" class="wrapper" method="post">
                        <h2> Login </h2><br>
                        <br><br>

                        <div class="input-box">
                            <h1>Email</h1>
                            <input type="email" name="email" placeholder="Enter your email address" required>
                            <?php
                                if (in_array("Email does not match", $errors)) echo "<br><span class='error-message'>Email does not exist</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                            <h1>Password</h1>
                            <input type="password" name="password" id="password" placeholder="Enter password" required>
                            <?php
                                if (in_array("Password does not match", $errors)) echo "<br><span class='error-message'>Password does not match</span>";
                            ?>
                        </div>
                        <br>
                        <button type="submit" name="login" class="btn btn-dark btn-login mt-3">Login</button>
                        <br>
                        <br>

                        <div style="width: 100%; height: 13px; border-bottom: 1px solid black; text-align: center">
                        <span style="font-size: 15px; background-color: #FFFFFF; padding: 20px;">
                            Don't have an account?
                        </span>
                        </div>
                        <br>
                        <a href="registration.php" name="register" class="btn btn-secondary mt-3">Register Now</a>
                        <br><br><br>

                    </form>
                </div>

                <div class="col-md">
                    <img class="object-cover w-full h-full mx-auto d-block" src="login.jpg" alt="img" />

                </div>

            </div>
        </div>
    <br><br><br>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>