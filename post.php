<!--NAME: TANISH DAGAR-->
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

  <title>Post</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<?php
  
  require_once 'serverlogin.php';


  if(isset($_GET['index']) == false){
    $not_set = true;
    die("THE POST IS NOT SELECTED");
  }

  else{
    $index_of_post = (int)$_GET['index'];
    $not_set = false;

    $sql = "SELECT * from posts where PostID = '$index_of_post'";
    $result = $conn->query($sql);

    $sql_for_author = "SELECT * from users where UserID = '1'";



    $auth_result = $conn->query($sql_for_author);
    $data_auth = $auth_result->fetch_assoc();
    $index = 0; //index starting from 0
    if($auth_result->num_rows > 0 && $result->num_rows > 0){
      $data = $result->fetch_assoc();
      $timestamp = (int)$data['Date'];
      $img_file = $data['PostImage'];
      
      // if($auth_result->num_rows > 0){
        $author = $data_auth['Name'];
      // }
      $associated_text = $data['Post']; 
      if(isset($_POST['comment_submit'])){//Checking if the comment is submitted 
        $comment_inputted = $_POST['comment'];
        $sql_insert = "INSERT INTO `comments` (`CommentID`, `UserID`, `PostID`, `Comment`, `Date`) VALUES (NULL, '1', '$index_of_post', '$comment_inputted', CURRENT_TIMESTAMP)";
        $conn->query($sql_insert);
      }
    }




   

  }

?>







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
  <header class="masthead" style="background-image: url('img/<?php echo "$img_file" ?>')"> 
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo "$associated_text"; ?></h1>
            <span class="meta">Posted by
              <a href="about.php"><?php echo $_SESSION['Name']; ?></a>
              on <?php echo date('F jS, Y - g:ia',$timestamp); ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
<!-- Comments Form -->
    <div class = "container">
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="post" action="./post.php?index=<?php echo($index_of_post); ?>">
              <div class="form-group">
                <input name="comment"required style="width: 1000px; height: 150px;">
                <!-- <input type="hidden" name="timestamp"> -->
                <!-- <textarea class="form-control" rows="3"></textarea> -->
              </div>
              <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        
        <?php

          $sql_comment = "SELECT * from comments,users where PostID = $index_of_post and comments.UserID = users.UserID" ;
          
          $result_comments = $conn->query($sql_comment);


          while($row = $result_comments->fetch_assoc()){
             $time_st = $row['Date'];
             $comment = $row['Comment'];
        ?>
        <!-- Single Comment -->
        <div class="media mb-4">
          <!-- <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt=""> -->
          <div class="media-body">


            <br>
            <h5 class="mt-0"><?php echo  date('F jS, Y - g:ia', strtotime($time_st)) . " Author: " . $_SESSION["Name"];  ?></h5> <!--converting timestamp to date and time-->
            <?php 
              echo "$comment";
            ?>
          </div>

        </div>
                        <?php
            }

          ?>
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

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
