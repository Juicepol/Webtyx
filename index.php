
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
<link rel="stylesheet" href="style.css">


<title>Personal Website</title>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all elements with the class 'container'
        var containers = document.querySelectorAll(".ani");
		var containers2 = document.querySelectorAll(".ani-right");

        // Function to check if an element is in the viewport
        function isInViewport(element) {
            var rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Function to handle scroll events
        function handleScroll() {
            containers.forEach(function(container) {
                if (isInViewport(container)) {
                    container.classList.add("show-container");
                }
            });
			containers2.forEach(function(container) {
                if (isInViewport(container)) {
                    container.classList.add("show-container");
                }
            });
        }

        // Attach the handleScroll function to the scroll event
        window.addEventListener("scroll", handleScroll);

        // Trigger the handleScroll function once on page load
        handleScroll();
    });
</script>

<style>
.navbar {
        background-color: #000000;
    }
.btn:hover {
    background-color: #dbdbdb !important;
    color: #000 !important;
}
.dropdown-menu {
    background-color: transparent;
    border: none;
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
    .navbar-brand {
    font-size: 40px;
    font-family: 'Sans-serif';
    font-weight: bold;
    }
    h2 {
        font-family: 'Lora';
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
	
	<section class="bg1 text-light p-5 text-center">
		<div class="container">
		<center><h1>WEBTYX</h1></center>
			<img src="Logoz.png" width="700px" height="300px" alt="logo" class="img-fluid rounded"></img>		
		</div> 
	
	</section>
	
	<section id="skills" class="bg1 text-dark p-5">
	<br>

		<div class="container ani">
			
			<div class="row align-items-center justify-content-between">
				
				<div class="col-md">
					<img src="yellow.png" class="img-fluid rounded" alt="Photo">
				</div>
				
				<div class="col-md p-5">
				<!--adding padding to text element-->
					<h2>Get to know me</h2><hr>
					<p>Good day, I am Joseph Paul Cruz! Here is my website about different blogs in my life specifically in the field of Information Technology.<br><br>
					To get to know me more, kindly click here in the button.
					</p>
					<a href="about.php" class="btn btn-dark mt-3"> 
						<i class="bi bi-chevron-right"></i>About Me
					</a>
				
				</div>
				
				
			</div>

		</div>
		
	</section>
	
	<section class="bg1 text-light p-5 text-center text-sm-start">
		
		<div class="container ani-right">
    <div class="d-sm-flex align-items-center justify-content-between">
        <!--flex is used to divide the text to the image-->
        
        <div style="max-width: 50%;">
            <h2>A Blog in my life</h2><hr>
            <p>Discover different blogs and journeys here in my website. You can comment and add feedback if you like.<br><br>Click the button below if you want to browse blogs.</p>
            
            <a href="blog.php" class="btn btn-dark mt-3"> 
                <i class="bi bi-chevron-right"></i>Read Blog
            </a>
        </div>
        
        <img class="img-fluid rounded" src="blogs.jpg" alt="img" style="max-width: 50%;">
    </div>
</div>


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