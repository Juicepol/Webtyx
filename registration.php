<?php
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
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!-- Include jQuery 1.8.0 from a CDN -->
    <script src="https://code.jquery.com/jquery-1.8.0.min.js" integrity="sha256-sal7UwPbfD8w3Ucxj9qc9viJsRwAKD3iq/A5Pd/WyW4=" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" crossorigin="anonymous" />
</head>

<style>
.container {
        width:100%;
	}
.wrapper {
    width: auto;
    height: auto;
    background: #FFFFFF;
    color: #1c0404;
    border-radius: 10px;
    padding-top:50px;
    padding-left: 7%;
    padding-right: 8%;
    margin: 5%;
}

img{
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
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
.bg-img {
    /* The image used */
    background-image: url("register.jpg");
  
    /* Control the height of the image */
    height: auto;
    width: 100%;
  
    /* Center and scale the image nicely */
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}

#countrySelect {
    width: 100%;
    background:  #fbf8f6;
    border: none;
    outline: none;
    border: 2px solid rgba(53, 44, 44, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #000000;
    padding: 20px;
}
.input-box input {
    width: 100%;
    background:  #fbf8f6;
    border: none;
    outline: none;
    border: 2px solid rgba(53, 44, 44, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #000000;
    padding: 20px;
}
#regionSelect {
    width: 100%;
    background:  #fbf8f6;
    border: none;
    outline: none;
    border: 2px solid rgba(53, 44, 44, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #000000;
    padding: 20px;
}
#barangaySelect {
    width: 100%;
    background:  #fbf8f6;
    border: none;
    outline: none;
    border: 2px solid rgba(53, 44, 44, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #000000;
    padding: 20px;
}
#citySelect {
    width: 100%;
    background:  #fbf8f6;
    border: none;
    outline: none;
    border: 2px solid rgba(53, 44, 44, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #000000;
    padding: 20px;
    font-color: #DBDBDB;
}
#provinceSelect {
    width: 100%;
    background:  #fbf8f6;
    border: none;
    outline: none;
    border: 2px solid rgba(53, 44, 44, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #000000;
    padding: 20px;
    font-color: #DBDBDB;
}
.navkular:link {
		color: #FFFFFF;
        font-size: 20px;
        font-family: 'Lora';
	}
.navbar {
        background-color: #000000;
    }
.navbar-brand {
    font-size: 40px;
    font-family: 'Sans-serif';
    font-weight: bold;
    }
    
/* Add media query for responsiveness */
@media screen and (max-width: 600px) {
    /* Center the form and reduce its width */
    form.wrapper {
        width: 80%;
        margin: auto;
    }

    .input-box input[type="text"],
    .input-box input[type="password"],
    .input-box input[type="email"],
    .input-box input[type="number"],
    .input-box select {
        width: 100%;
        overflow-wrap: break-word; /* This property ensures that long words break and do not overflow */
    }
}
    /* Center the button */
    form.wrapper button {
        width: 100%;
        margin: 10px auto;
    }

    h2 {
        font-size: 30px; /* Adjust the font size as needed */
    }
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

        <div class="container bg-img">
            <br>
            <?php
                $errors = array();

                if (isset($_POST["submit"])) {
                    $LastName = $_POST["LastName"];
                    $FirstName = $_POST["FirstName"];
                    $email = $_POST["Email"];
                    $password = $_POST["password"];
                    $lotblk = $_POST["LotBlk"];
                    $street = $_POST["Street"];
                    $subdiv = $_POST["PhaseSubdivision"];
                    $barangay = $_POST["Barangay"];
                    $region = $_POST["Region"];
                    $city = $_POST["City"];
                    $province = $_POST["Province"];
                    $country = $_POST["Country"];
                    $contact = $_POST["Contact"];    
                    $RepeatPassword = $_POST["repeat_password"];

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    if (empty($LastName) OR empty($FirstName) OR empty($email) OR empty($password) OR empty($RepeatPassword) OR empty($lotblk) OR empty($street)
                    OR empty($subdiv) OR empty($barangay) OR empty($city) OR empty($province) OR empty($province) OR empty($country) OR empty($contact) OR empty($region)) {
                        array_push($errors, "All fields are required");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid");
                    }
                    if (strlen($password) < 8) {
                        array_push($errors, "Password must be at least 8 characters long");
                    }
                    if ($password != $RepeatPassword) {
                        array_push($errors, "Password does not match");
                    }

                    require_once "database.php";
                    $sql = "SELECT * FROM user WHERE Email = '$email'";
                    $result = mysqli_query($mysqli, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        array_push($errors, "Email Already Exist!");
                    }

                    if (count($errors) == 0) {
                        $sql = "INSERT INTO user (Last_Name, First_Name, Email, Password, Lot_Blk, Street, Phase_Subdivision, Barangay, City_Municipality, Province, Country, Contact_Num, Region) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($mysqli);
                        $preparestmt = mysqli_stmt_prepare($stmt, $sql);

                        if ($preparestmt) {
                            mysqli_stmt_bind_param($stmt, "sssssssssssss", $LastName, $FirstName, $email, $passwordHash, $lotblk, $street, $subdiv, $barangay, $city, $province, $country, $contact, $region);

                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'> You are Registered Successfully! </div>";
                        } else {
                            die("Something went wrong");
                        }
                    }
                }
            ?>
              
            <form action="registration.php" class="wrapper" method="post">
            
                <center>
                        <h2>Register</h2><br>
                        
                </center>
                <h1>Full Name</h1>
                <br>

                        <div class="input-box">
                        <h1>Last Name*</h1>
                            <input type="text" name="LastName" placeholder="Enter Last Name" value="<?= htmlspecialchars($_POST["LastName"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>First Name*</h1>
                            <input type="text" name="FirstName" placeholder="Enter First Name" value="<?= htmlspecialchars($_POST["FirstName"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>
                    <h1>Address</h1> <br>
                        <div class="input-box">
                        <h1>Lot/Blk*</h1>
                            <input type="text" name="LotBlk" placeholder="Enter House Number" value="<?= htmlspecialchars($_POST["LotBlk"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>
                        
                        <div class="input-box">
                        <h1>Street*</h1>
                            <input type="text" name="Street" placeholder="Enter your Street" value="<?= htmlspecialchars($_POST["Street"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Phase/Subdivision*</h1>
                            <input type="text" name="PhaseSubdivision" placeholder="Enter your Subdivision" value="<?= htmlspecialchars($_POST["PhaseSubdivision"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="countrySelect"><h1>Country*</h1></label>
                            <select class="form-control" id="countrySelect" name="Country">
                            <option value="" selected disabled>Select a Country</option>
                            </select>
                        </div>

                        <div id="regionContainer" style="display:none;">
                            <br>
                            <div class="form-group">
                            <label for="regionSelect"><h1>Region*</h1></label>
                            <select class="form-control" id="regionSelect" name="Region">
                                <option value="" selected disabled>Select a Region</option>
                            </select>
                            </div>
                            <br>
                            <div id="provinceContainer" style="display:none;">
                            <div class="form-group">
                                <label for="provinceSelect"><h1>Province*</h1></label>
                                <select class="form-control" id="provinceSelect" name="Province">
                                <option value="" selected disabled>Select a Province</option>
                                </select>
                            </div>
                            <br>
                            <div id="cityContainer" style="display:none;">
                                <div class="form-group">
                                <label for="citySelect"><h1>City*</h1></label>
                                <select class="form-control" id="citySelect" name="City">
                                    <option value="Select a City"></option>
                                </select>
                                </div>
                                <br>
                                <div id="barangayContainer" style="display:none;">
                                <div class="form-group">
                                    <label for="barangaySelect"><h1>Barangay*</h1></label>
                                    <select class="form-control" id="barangaySelect" name="Barangay">
                                    <option value="" selected disabled>Select a Barangay</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <br>

                  <div class="input-box">
                        <h1>Contact Number*</h1>
                            <input type="number" name="Contact" placeholder="Enter your Contact Number" value="<?= htmlspecialchars($_POST["Contact"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>
                        <div class="input-box">
                        <h1>Email*</h1>
                            <input type="email" name="Email" placeholder="Enter Email Address" value="<?= htmlspecialchars($_POST["Email"] ?? "") ?>" required>
                            <?php 
                                if (in_array("Email is not valid", $errors)) echo "<span class='error-message'>Email is not valid</span>";
                                if (in_array("Email Already Exist!", $errors)) echo "<span class='error-message'>Email Already Exist!</span>"; 
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Password*</h1>
                            <input type="password" name="password" id="password" placeholder="Enter Password" required>
                            <?php 
                                if (in_array("Password must be at least 8 characters long", $errors)) echo "<span class='error-message'>Password must be at least 8 characters long</span>"; 
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Repeat Password*</h1>
                            <input type="password" name="repeat_password" placeholder="Repeat Password" required>
                            <?php 
                                if (in_array("Password does not match", $errors)) echo "<span class='error-message'>Password does not match</span>"; 
                            ?>
                            <br>
                            <br>
                        </div>

                        <button type="submit" name="submit" value="Register" class="btn btn-dark btn-regis mt-3"> Register</button>

                        <div class="Register-link">
                            <br>
                            <div style="width: 100%; height: 13px; border-bottom: 1px solid black; text-align: center">
                            <span style="font-size: 15px; background-color: #FFFFFF; padding: 20px;">
                                Have an account?
                            </span>
                            </div>
                            <br>
                            <a href="login.php" name="register" class="btn btn-secondary mt-3">Login Now</a>
                            <br><br><br>
                        </div>
                    
            </form>
            <br>
        </div>
    </section>

<script src="regisdropdown.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html>