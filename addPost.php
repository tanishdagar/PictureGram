<!--NAME: TANISH DAGAR
  ID: B00822133
  Assignment number: 4 -->
<?php
 session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!==true){
  header("location:contact.php");
  exit();
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Post</title>

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
      <a class="navbar-brand" href="about.php"><?php echo $_SESSION['Name']; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
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
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/logo.jpg')"><!-- displaying contents -->
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Picturegram</h1>
            <span class="subheading">ADD NEW POST</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->

  <?php
         require_once 'serverlogin.php';
         $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
         mysqli_select_db($conn, $db_database)
         or die("Unable to select database: " . mysql_error());

         if(isset($_POST['post_submit'])){
         
            $post_desc = $_POST['Post'];
            $img_name = $_POST['img_name'];
            $userid = $_SESSION["UserID"];
            
            $max_id = "SELECT MAX(PostID) FROM posts";

            $result = $conn->query($max_id);

            $id_array  = $result->fetch_assoc();
            $id = (int)$id_array['MAX(PostID)'];

            $id = $id + 1;
            

            $sql = "INSERT INTO `posts`(`PostID`, `UserID`, `PostImage`, `Post`, `Date`) VALUES ('$id', '$userid', '$img_name', '$post_desc', CURRENT_TIMESTAMP)";
              //inserting new values in database
          

            $conn->query($sql);
            
          
          } 
          
  ?>







  <div class="container">
   <div class = "container">
        <div class="card my-4">
          <h5 class="card-header">Add a Post:</h5>
          <div class="card-body">
            <form method="post" action= "addPost.php"; ?>
              <div class="form-group">
                Post:
                <input name="Post"required style="width: 1000px; height: 150px;">
                Image Filename:
                <input name="img_name"required style="width: 1000px; height: 75px;">
              </div>
              <button type="submit" name="post_submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
    <hr>
    <hr>
    <hr>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
