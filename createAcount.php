<!--NAME: TANISH DAGAR -->
  <?php
session_start(); //starting session 
include_once 'function.php';

if(isset($_POST["createAccount"])) {
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$image = $_POST['AboutImage'];
	$about = $_POST['About'];
	$name = $_POST['Name'];
	$myquery = "SELECT * FROM login WHERE Username = '$username'"; 
	$result = $conn->query($myquery);

	echo "$result->num_rows";
	if($result->num_rows > 0){
		while($row = $result-> fetch_assoc()){
			$dbusername = $row["Username"];
			$dbpassword = $row["Password"];

			if ($username == $dbusername) {
				echo "user already exists";
				header("Location: contact.php");
				exit;
        //break
			}
		}
	}
	else{
		$sql = "INSERT INTO users(UserID, Name, About, AboutImage) VALUES (NULL,'$name', '$about', '$image')"; //inserting values in the database
		// $insert_id=0;
		if ($conn->query($sql) == TRUE) {
			// echo "New user created successfully",$conn->insert_id ;
			// $insert_id=$conn->insert_id;
		}
		else
		{

		}
		$max_id = "SELECT MAX(userID) FROM users";

        $result = $conn->query($max_id);
        $id_array  = $result->fetch_assoc();

        $id = (int)$id_array['MAX(userID)'];
		$sql2 = "INSERT INTO login (LoginID, UserID, Username,Password) VALUES (NULL, '$id', '$username','$password')";
		if ($conn->query($sql2) == TRUE) {
			 echo "New user created successfully - login";
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		header("Location: contact.php");
				exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Create Account</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->
	<link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.PHP">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="addPost.php">Add Post</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Header -->
	<header class="masthead" style="background-image: url('img/logo.jpg')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="page-heading">
						<h1>Picturegram</h1>
						<span class="subheading">Create Account</span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
				<!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
				<!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
				<form name="sentMessage" method="POST" action = "" >
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Name</label>
							<input type="text" class="form-control" placeholder="Name" name="Name" required data-validation-required-message="Please enter your Name.">
							<p class="help-block text-danger"></p>
						</div>
					</div>

					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Tell us about you</label>
							<input type="text" class="form-control" placeholder="Tell us about you" name="About" required data-validation-required-message="Tell us about you.">
							<p class="help-block text-danger"></p>
						</div>
					</div>



					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Image</label>
							<input type="text" class="form-control" placeholder="Image" name="AboutImage" required data-validation-required-message="Image.">
							<p class="help-block text-danger"></p>
						</div>
					</div>





					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Username</label>
							<input type="text" class="form-control" placeholder="Username" name="Username" required data-validation-required-message="Please enter your username.">
							<p class="help-block text-danger"></p>
						</div>
					</div>




					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Password</label>
							<input type="Password" class="form-control" placeholder="Password" name="Password" required data-validation-required-message="Please enter your password.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<br>
					<div id="success"></div>
					<button type="submit" class="btn btn-primary" name="createAccount" id="sendMessageButton">Create Account</button>
				</form>
			</div>
		</div>
	</div>

	<hr>

	<!-- Footer -->
	<footer>
		<div class="container">
			<p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="js/jqBootstrapValidation.js"></script>
	<script src="js/contact_me.js"></script>

	<!-- Custom scripts for this template -->
	<script src="js/clean-blog.min.js"></script>

</body>

</html>
