<?php
session_start();
include('database_connection.php');
if(!isset($_SESSION['user_id']))
{
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Write a blog | Pahal</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css'> -->

  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <!-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
  <!-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> -->
  <!-- <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> -->
  <!-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
  
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdn.rawgit.com/bootstrap-wysiwyg/bootstrap3-wysiwyg/master/src/bootstrap3-wysihtml5.css'>
  
  <link rel="stylesheet" href="assets/css/dash-image.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/write-blog.css">

</head>

<body>

  <!-- partial:index.partial.html -->
  <div class="container">
  <div class="form-group">
    <span class="tagline">Write to inspire</span>
    <span style="display: inline-flex; float: right;">
    <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control publish-btn" />
    <!-- <div class="thumbnail-container">
      Upload thumbnail
      <span class="img-placeholder"></span>
    </div> -->
  </span>
 </div>
  <div class="row">
    <div class="col-md-12">
      <span id="demo"></span>
      <div class="thumbnail-container" id="myDiv">
        <button class="upload-button2"><i class="fa fa-image"></i> Upload thumbnail</button>
        <input class="file-upload2" type="file" accept="image/*"/>
      </div>
      <form method="post" role="form">
        <div class="form-group title-container">
          <input type="text" class="form-control title" name="title" placeholder="Title"/>
        </div>
        <!-- <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <span class="btn btn-primary btn-file">
                Upload thumbnail<input type="file" name="thumbnail" multiple accept=".jpeg, .png, .jpg">
              </span>
             </span>
            <input type="text" class="form-control" readonly>
           </div>
        </div> -->
        <div class="form-group content-container">
          <textarea class="form-control bcontent" name="content" placeholder="Start writing from here..."></textarea>
        </div>
      </form>
    </div>
  </div>
</div>
  <div class="s-layout">
    <div class="s-layout__sidebar">
      <a class="s-sidebar__trigger" href="#0">
        <i class="fa fa-bars"></i>
      </a>

      <nav class="s-sidebar__nav" id="sidebar">
        <?php
          if(isset($_SESSION['user_id'])){
        ?>
          <div class="sidebar-header">
            
            <div class="circle" id="circlediv">
              <div class="p-image">
                <center><i class="fa fa-camera fa-2x upload-button" style="color: orangered"></i></center>
                <input class="file-upload" type="file" accept="image/*"/>
              </div>
            </div>
            <div class="user-info">
              <center><span class="user-name"><strong><?php echo $_SESSION['fullname']; ?></strong></span></center>
            </div>
          </div>
          <hr style="height: 1px; margin: 10px 10px 0 10px;">
          <div class="sidebar-menu">
            <ul>
              <li class="sidebar-dropdown">
                <a href="user_profile.php"><i class="fa fa-user"></i><span>Profile</a>
              </li>
              <li class="sidebar-dropdown">
                <a href="user-feed.php"><i class="far fa-newspaper"></i><span>News Feed</span></a>
              </li>
              <li class="sidebar-dropdown active-tab">
                <a href="writeBlog.php"><i class="fa fa-file-alt"></i><span>Write a blog</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="myblogs.php"><i class="fa fa-th-large"></i><span>My Blogs</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="training.php"><i class="fas fa-graduation-cap"></i><span>Training</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="chat.php"><i class="fas fa-comments"></i><span>Inbox</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="joblist.php"><i class="fas fa-briefcase"></i><span>Explore Jobs</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="applications.php"><i class="fa fa-thumbtack"></i><span>Application Tracking</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="index.php"><i class="fas fa-home"></i><span>Go Back Home</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="index.php#contact"><i class="fas fa-headphones"></i><span>Feedback</span></a>
              </li>
              <li class="sidebar-dropdown"><a href="logout.php"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
            </ul>
          </div>
          <hr style="height: 1px; margin: 10px 10px 0 10px; color: rgba(255,255,255,0.7);">
          <div class="sidebar-footer">
            <center>
            <div class="copyright">
              <strong><span>pahal.in&copy; </span></strong>2021<br>
              Designed by <a>Code Smashers</a><br>
            </div>
          </center>
          </div>
        <?php 
          } else {}
        ?>
          <div class="sidebar-menu">

          </div>
      </nav>
    </div>
  </div>
<!-- partial -->
<!-- Vendor JS Files -->
<!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<!-- <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script> -->
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> -->
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

<!-- Template Main JS File -->
<script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdn.rawgit.com/bootstrap-wysiwyg/bootstrap3-wysiwyg/master/dist/bootstrap3-wysihtml5.all.min.js'></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

<!-- <script src="assets/js/main.js"></script> -->
<script src="assets/js/dashboard.js"></script>
<script  src="assets/js/write-blog.js"></script>
<script  src="assets/js/dash-image.js"></script>

</body>

</html>