<?php
	session_start();

	if (isset($_SESSION["user_id"])) {

		$mysqli = require __DIR__ . "/database.php";
	
		$sql = "SELECT * FROM user
				WHERE ID = {$_SESSION["user_id"]}";
	
		$result = $mysqli->query($sql);
	
		$user = $result->fetch_assoc();

		$current_user = $user["Email"];
		$current_user_name = $user["First_Name"];
		$date = date("Y-m-d H:i:s");

		// Handle form submission (comment)
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_comment"])) {
			$comment_text = mysqli_real_escape_string($mysqli, $_POST["comment"]);
			$comment_query = "INSERT INTO comment_tbl (comment, date, user_first_name) VALUES ('$comment_text', '$date', '$current_user_name')";
			mysqli_query($mysqli, $comment_query);
			header("Location: {$_SERVER['REQUEST_URI']}#commentAnchor");
        	exit();
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_message"])) {
			$message_text = mysqli_real_escape_string($mysqli, $_POST["message_text"]);
			$subject_text = mysqli_real_escape_string($mysqli, $_POST["subject_text"]);
			$message_query = "INSERT INTO message_tbl (subject, message, sender, date) VALUES ('$subject_text', '$message_text', '$current_user', '$date')";
			mysqli_query($mysqli, $message_query);
			header("Location: {$_SERVER['REQUEST_URI']}#feedbackAnchor");
        	exit();
		}
	
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	.bg1 {
		background-color: #1F2833;
	}
    .navbar {
        background-color: #000000;
    }
    .dropdown-menu {
    background-color: transparent;
    border: none;
    }
    .dropdown-item.btn-logout:hover {
    background-color: #DBDBDB;
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
	.fa-facebook {
		width: 255px;
		background: #3B5998;
		color: white;
	}
	.fa-github {
		background: #000000;
		color: white;
	}
	.fa-linkedin {
		background: #007bb5;
		color: white;
	}
	.fa {
		padding: 100px;
		font-size: 60px;
		height: 80%;
		text-align: center;
		text-decoration: none;
		margin: 5px 20px;
		border-radius: 50%;
	}
	.comments-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px; /* Adjust the margin as needed */
    }
    .comments-table th, .comments-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .comments-table th {
        background-color: #8b8b8b;
    }
	.user-column,
	.comment-column,
	.date-column{
		max-width: 900px; /* Adjust the width as needed */
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
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
	
	<section class="bg1 text-light p-5 text-center text-sm-start">
	<br>


		<div class="container ani-up">
			
			<center>
			<h1>GET IN TOUCH</h1>
            <p>Feel free to contact me with these social media platforms</p>
			<br>
			<br>



			<a target="_blank" href="https://www.facebook.com/SephUlysses123" class="fa fa-facebook"></a>
			<a target="_blank" href="https://github.com/Juicepol" class="fa fa-github"></a>
			<a target="_blank" href="https://www.linkedin.com/in/joseph-cruz-4a5831201/" class="fa fa-linkedin"></a>
			
			
		</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<hr>
	</section>

	<section class="bg1 text-light p-5 text-center text-sm-start">
	<a id="feedbackAnchor"></a>  <!--anchor for return-->
		<div class="container ani-up">
			
			<center>
			<h1>Message Me</h1>
			<h5>If you have any feedbacks or inquiries regarding the website</h5>
			<br>
			<br>
			<br>
			
			<?php if (!isset($_SESSION["user_id"])) : ?>
				<div class="container">
					<p>You need to be logged in first in order to inquire and feedback!</p>
					<a href="login.php" class="btn btn-message hovbtn"> 
					Log in </a>
				</div>
				
			<?php else : ?>

				<form action="contact.php" class="wrapper" method="post">

					<div class="input-box">
						<p>Subject:</p>
						<input type="text" name="subject_text" placeholder="Enter the feedback/inquiry subject" required>
						<br>
						<br>
					</div>

					<div class="input-box">
						<p>Message:</p>
						<textarea name="message_text" rows="4" required></textarea><br>
						<br>
						<br>
					</div>

					<button type="submit" name="submit_message" class="btn btn-success btn-rounded">Submit</button>

				</form>
			<?php endif; ?>
			
			
		</div>
	</section>

	<footer class="p-2 bg1 text-white text-center position-relative">
		<div class="container"><hr>
			<p class="lead">&copy; Joseph Cruz 2024</p>
		</div>
		
	</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>