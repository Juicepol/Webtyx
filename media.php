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
        var containers = document.querySelectorAll(".ani");

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
    .dropdown-menu {
    background-color: transparent;
    border: none;
    }
    .dropdown-item.btn-logout:hover {
    background-color: #DBDBDB;
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
        width:100%;
		color: #FFFFFF;
	}
	p {
		font-size: 20px;
		font-family: 'Verdana';
	}
	h1 {
		font-size: 40px;
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
	
	<section class="bg1 text-light p-1 text-center text-sm-start" >
		<div class="container">
			<br>
			<br>
			<a href="blog.php">
			<span style='font-size:30px;'>&#11164;</span></a>
			<center><h1>The Adverse Effects of Panic<br> caused by the Media</h1></center>
			<br>
			
			<p align="justify">Adapting media as your lifestyle have different negative effects in others and especially yourself. Media and any media platforms may cause hysteria, depression, and anxieties especially the latest news that have been heard and seen by millions of people. Did media really benefit us or just giving us pessimistic mindset? For you, what is the role of media in your life? is it convenient or annoying?</p><br>
			<p align="justify">Using technology really saves our life especially now that we are in pandemic and in community quarantine but as we use it always, it can cause illness and disorder in our health especially in our mental health. As we read newspaper, watch television for news, people are bombarded with fear and anxieties. In addition, the fake news that are spreading in social media that makes people overthink their situation as a family or itself.</p><br>
			<p align="justify">As the pandemic takes longer, people became more hysteric because of the news of having another Covid-19 variant. People chooses to panic buy again, having sleep problems or insomnia due to the problems they are facing and some have poor school performance because of insufficient funds. Social Media became toxic and some are addicted to it that some expose themselves that is not appropriate to their age. Did media really help us or the media makes it worse?</p><br>
			<p align="justify">I’ll leave you with this quote “The good news about computers is that they do what you tell them to do. The bad news is that they do what you tell them to do.” – Ted Nelson. This is the sad reality that we face right now, as we became focus on media & social media, we became used to it and go with the flow to the point that the media or social media tells us what to do. Letting yourself be depressed, fear and have anxieties because of what the media told you. Letting yourself to submit to its negative effects and just live the life that full of pessimistic mindset.</p><br>
			<p align="justify">In conclusion, we can say that the media and other media platforms make the current situation worse. Having pessimistic mindset of being toxic, depressed, hysteric, fearful and full of anxieties that letting you go with the flow that we just let the media controls us. So, I’ll repeat the question, for you, what is the role of media in your life? Is it really convenient or annoying?</p><br>
			
		</div>
	
	</section>
    <section class="bg1 text-light p-5 text-center text-sm-start">

	<a id="commentAnchor"></a>  <!--anchor for return-->


		<div class="container ani-up table-responsive" id="commentpage">
			
			<center>
			<h1>COMMENTS</h1>
			<br>
			<br>
			<br>
			
			<?php if (!isset($_SESSION["user_id"])) : ?>
				<div class="container">
					<p>You need to be logged in first to see and leave a comment!</p>
					<a href="login.php" class="btn btn-message hovbtn"> 
					Log in here! </a>
				</div>
				
			<?php else : ?>
				<form action="contact.php" class="wrapper" method="post">

					<table class="comments-table">
						<tr>
							<th>User</th>
							<th>Comment</th>
							<th>Date</th>
						</tr>

						<?php
						// Retrieve comments data
						$comments_query = "SELECT * FROM comment_tbl ORDER BY comment_tbl.date DESC LIMIT 6";
						$comments_result = $mysqli->query($comments_query);

						if ($comments_result->num_rows > 0) {
							while ($comment_row = $comments_result->fetch_assoc()) {
								echo "<tr>";
								echo "<td class='user-column'>" . $comment_row["user_first_name"] . "</td>";
								echo "<td class='comment-column'>" . $comment_row["comment"] . "</td>";
								echo "<td class='date-column'>" . $comment_row["date"] . "</td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan='3'>No comments yet</td></tr>";
						}
						?>
					</table>

					<br>
					<br>
					<br>
					<br>
					<div class="input-box">
						<p>Leave a comment here! (Limit: 100 characters)</p>
						<textarea id="commentText" name="comment" rows="2" maxlength="100" required></textarea>
						<br>
						<br>
						<br>
					</div>
					
					<a href="#commentpage">
					<button type="submit" name="submit_comment" class="btn btn-success btn-rounded">Post Comment</button>

				</form>
			<?php endif; ?>
			
			
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