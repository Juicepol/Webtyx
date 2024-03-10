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
		var containers3 = document.querySelectorAll(".ani-up");

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
			containers3.forEach(function(container) {
            container.classList.add("show-container");
        });
        }

        // Attach the handleScroll function to the scroll event
        window.addEventListener("scroll", handleScroll);

        // Trigger the handleScroll function once on page load
        handleScroll();
    });
</script>


<style>

	.bg1 {
		background-color: #1F2833;
	}
	.nav-item-color {
		font-weight: bold;
		color: #DBDBDB;
	}
    .navbar {
        background-color: #000000;
    }
	.nav-font-bold {
		font-weight: bold;
	}
	.custom-navbar2 {
		background-color: #1F2833;
	}
    .dropdown-menu {
    background-color: transparent;
    border: none;
    }
    .dropdown-item.btn-logout:hover {
    background-color: #DBDBDB;
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
	span {
		color: #DBDBDB;
	}
	span:visited {
		color: #DBDBDB;
	}
	a:-webkit-any-link{
		text-decoration:none !important;
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
	
	<section id="skills" class="bg1 text-dark p-2">
		<div class="container ani-up">
			<br>
			<br>
			<center><h1>ABOUT ME</h1></center>
			<br>
			<div class="row align-items-center justify-content-between">
				
				<div class="col-md">
						<img src="profile.jpeg" class="img-fluid" width="500" height="500" id="profileImage">
				</div>
				
				<div class="col-md p-5">
					<h1>Introduction</h1>
					<hr>
					<p>I am a 2nd year student, currentlly taking the program of Information Technology from National University Fairview. My education has equipped me with a strong foundation of having knowledge from different expertise and be hands-on on different types of work in IT industry.
					</p>
				
				</div>
				
				
			</div>

		</div>
		
	</section>

	<section class="bg1 text-light p-2 text-center text-sm-start">
		
		<div class="container ani-right">
			<div class="d-sm-flex align-items-center justify-content-between">
			<!--flex is used to divide the text to the image-->
			
				<div class="row align-items-center justify-content-between">
					
					<div class="col-md">
						<h1 align="right">Passion</h1>
						<hr>
						<p align="right">I am passionate about exploring different kinds of technologies. My kind of pastime are playing video games specifically RPG and MOBA games; reading books & manga, listening to music of any kind of genre and watching anime, k-drama and western series & movies. I also play musical instruments like keyboards. But now, I only play keyboard in my computer.</p>

					</div>
					
					<div class="col-md p-5">
					<img src="pc.jpg" class="img-fluid" width="600" height="400" id="profileImage">
					</div>
					
					
				</div>

			</div>

		</div>

	</section>
	
	<section id="skills" class="bg1 text-dark p-2">
	
		<div class="container ani">

			<div class="row align-items-center justify-content-between">
				
				<div class="col-md">
				<img src="skill.JPG" class="img-fluid" width="600" height="300" id="profileImage">
				</div>
				
				<div class="col-md p-5">
					<h1>Skills</h1>
					<hr>
					<p>With a strong foundation in Information Technology, I possess a diverse range of technical skills. I am proficient in programming languages such as Java and Python allowing me to develop robust and efficient software solutions. Additionally, I am also skilled in web development, utilizing HTML, CSS, and frameworks to create responsive and visually appealing websites.
					</p>
				
				</div>
				
				
			</div>

		</div>
		
	</section>
		
	<section class="bg1 text-light p-5 text-center text-sm-start">
		
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