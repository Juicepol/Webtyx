<?php
	session_start();

	if (isset($_SESSION["user_id"])) {

		$mysqli = require __DIR__ . "/database.php";
	
		$sql = "SELECT * FROM user
				WHERE ID = {$_SESSION["user_id"]}";
	
		$result = $mysqli->query($sql);
	
		$user = $result->fetch_assoc();
	
	}

?>

<!DOCTYPE html>
<html>
<!--browse by room and contact sales nalang missing pieces, then after non, add nalang ng mga extra shiz-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<title>Personal Website</title>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all elements with the class 'container'
        var containers = document.querySelectorAll(".container");

        // Loop through each container and add the 'show-container' class
        containers.forEach(function(container) {
            container.classList.add("show-container");
        });
    });
</script>



<style>
.card img {
    height: 350px; /* Set the desired height */
    object-fit: cover; /* This ensures the image covers the entire container */
}

	.bg1 {
		background-color: #1F2833;
	}
    .navbar {
        background-color: #000000;
    }
	.nav-item-color {
		font-weight: bold;
		color: #DBDBDB;
	}
	.nav-font-bold {
		font-weight: bold;
	}
	.custom-navbar2 {
		background-color: #1F2833;
	}
	.img {
		max-width: 100%;
		height: auto;
	}
	.navkular {
		color: #FFFFFF;
	}
	.navkular:hover {
		color: #FFFFFF;
	}
	.navkular:link {
		color: #FFFFFF;
        font-size: 20px;
        font-family: 'Lora';
	}
	.container {
		color: #FFFFFF;
	}
    .dropdown-menu {
    background-color: transparent;
    border: none;
    }
    .dropdown-item.btn-logout:hover {
    background-color: #DBDBDB;
    }
	p {
		font-size: 25px;
		font-family: 'Lora';
	}
	h1{
		font-size: 40px;
		font-family: 'Lora';
	}
	.btn {
		font-weight: bold;
	}
	.btn:hover {
    background-color: #dbdbdb !important;
    color: #000 !important;
}
	.bg2 {
		background-color: #1A0B30;
	}
	a:-webkit-any-link{
		text-decoration:none !important;
	}
	a {
		color: #DBDBDB;
	}
	a:hover {
		color: #DBDBDB;
	}
    .navbar-brand {
    font-size: 40px;
    font-family: 'Sans-serif';
    font-weight: bold;
    }

</style>


</head>

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
                <?php if(isset($_SESSION["user_id"])) : ?>
                <div class="dropdown navparagraph">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome, <?= $user["First_Name"]; ?>!</a>
                    <div class="dropdown-menu">
                        <a href="logout.php" class="dropdown-item btn btn-dark btn-logout">Logout</a>
                    </div>
                </div>
                <?php else : ?>
                <a href="login.php" class="btn btn-dark mt-3 login-btn"> 
                    Log In 
                </a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

	<!--main-->
	
	<section class="bg1 text-light p-1 text-center text-sm-start">
		<div class="container ani-up">
			<br>
			<br>
			<center><h1>BLOGS</h1></center>
			<br>
			<hr>
			<div class="card-group gap-5 animate__animated animate__fadeInLeft">
			  <div class="card bg-dark">
				<img src="Garden.jpg" class="img-fluid" alt="skygarden">
				<div class="card-body">
					<h3 class="card-title">A Day in Life of an IT student</h3>
					<p class="card-text">As the sun rises, another day begins in the busy world of an IT student. Here are my experiences everyday as I live my life as an IT student here at National University Fairview</p>
					<p class="card-text"><a class="btn btn-secondary" href="life.php">Click Here</a></p>
				</div>
			  </div>
			  <div class="card bg-dark">
				<img src="socmed.jpg" class="img-fluid" alt="socmedz">
				<div class="card-body">
					<h3 class="card-title">The Adverse Effects of Social Media</h3>
					<p class="card-text">Adapting media as your lifestyle have different negative effects in others and especially yourself. That's why we should be aware what are the negative effects of it as a student.<br>
					</p>
					<p class="card-text"><a class="btn btn-secondary" href="media.php">Click Here</a></p>
				</div>
			  </div>
			  
			  
			</div>
			
		</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	</section>

	<footer class="p-4 bg1 text-white text-center position-relative">
		
		<div class="container"><hr>
			<p class="lead">&copy; Joseph Cruz 2024</p>
		</div>
		
	</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>