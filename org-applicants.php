<?php
session_start();
include('database_connection.php');


if(!isset($_SESSION['user_id']))
{
  header('location:login.php');
}
$user_id = $_SESSION['user_id'];
$stmt = $pdo->query("select uploaddate,image,image_name from user where user_id='$user_id;'");

$row = $stmt->fetch();

$userPicture = !empty($row['image'])?$row['image']:'assets/img/user.jpg';
$userPictureURL = $userPicture;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Received Applications | Pahal</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css'>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dash-image.css">
  <link rel="stylesheet" href="assets/css/org-application.css">
  <link href="/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>

  <!-- partial:index.partial.html -->
  <section class="wrapper">
    <h2>Received Applicants for Mask Production</h2>
  
    <ul class="tab__content">
      <li class="active">
        <div class="container-fluid">
          <div class="row">
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="content__wrapper">
            <div class="table-responsive">
            <table id="customers">
              <tr>
                <th>Applicant</th>
                <th>Lives in</th>
                <th>Skills</th>
                <th>Qualification</th>
                <th>Applied on</th>
              </tr>
              <tr>
                <td><a href="#">Aayushi Bahukhandi</a></td>
                <td>Ajmer</td>
                <td>Communication Skills,Communication Skills,Communication Skills,Communication Skills,Communication Skills</td>
                <td>B.tech</td>
                <td>15 April 2021</td>
              </tr>
              <tr>
                <td><a href="#">Nishtha Garg</a></td>
                <td>Bhilwara</td>
                <td>Sewing</td>
                <td>B.tech</td>
                <td>10 May 2021</td>
              </tr>
              <tr>
                <td><a href="#">Aditi Birla</a></td>
                <td>Bhilwara</td>
                <td>Sewing</td>
                <td>12th Standard</td>
                <td>11 May 2021</td>
  
              </tr>
              <tr>
                <td><a href="#">Vilsi Jain</a></td>
                <td>Bharatpur</td>
                <td>Communication Skills</td>
                <td>B.tech</td>
                <td>11 May 2021</td>
              </tr>
              <tr>
                <td><a href="#">Divya Jangir</a></td>
                <td>Churu</td>
                <td>Mehandi Design</td>
                <td>12th Standards</td>
                <td>15 May 2021</td>
              </tr>
              
            </table>
            
            </div>
            </div>
      
          </main>
          </div>
        </div>
        </div>
      </li>
      <li>
        <div class="content__wrapper">
          <h2 class="text-color">About</h2>
          
          <p>Created by <a class="text-color" href="http://lewihussey.com" target="_blank">Code Smashers</a></p>
        </div>
      </li>
    </ul>
  </section>
  <div class="s-layout">
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
            
            <div class="circle" id="circlediv" style="background-image: url(<?php echo $userPicture; ?>);">
              <div class="p-image">
                <center><i class="fa fa-camera fa-2x upload-button" style="color: orangered"></i></center>
                <input class="file-upload" name="file" id="file" type="file" accept="image/*"/>
              </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script>
            $(document).ready(function(){
             $(document).on('change', '#file', function(){
              var name = document.getElementById("file").files[0].name;
              var form_data = new FormData();
              var ext = name.split('.').pop().toLowerCase();
              if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
              {
               alert("Invalid Image File");
              }
              var oFReader = new FileReader();
              oFReader.readAsDataURL(document.getElementById("file").files[0]);
              var f = document.getElementById("file").files[0];
              var fsize = f.size||f.fileSize;
              if(fsize > 2000000)
              {
               alert("Image File Size is very big");
              }
              else
              {
               form_data.append("file", document.getElementById('file').files[0]);
               $.ajax({
                url:"dpupload.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                 $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                },   
                success:function(data)
                {
                 $('#uploaded_image').html(data);
                }
               });
              }
             });
            });
            </script>

            <div class="user-info">
              <center><span class="user-name"><?php echo $_SESSION['fullname']; ?></span></center>
            </div>
          </div>
          <hr>
          <div class="sidebar-menu">
            <ul>
              <li class="sidebar-dropdown">
                <a href="user_profile.php"><i class="fa fa-user"></i><span>Profile</a>
              </li>
              <li class="sidebar-dropdown">
                <a href="user-feed.php"><i class="far fa-newspaper"></i><span>News Feed</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="writeBlog.php"><i class="fa fa-file-alt"></i><span>Write a blog</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="myblogs.php"><i class="fa fa-th-large"></i><span>My Blogs</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="training.php"><i class="fas fa-graduation-cap"></i><span>Create a job</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="chat.php"><i class="fas fa-comments"></i><span>Inbox</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="joblist.php"><i class="fas fa-briefcase"></i><span>Explore Jobs</span></a>
              </li>
              <li class="sidebar-dropdown  active-tab">
                <a href="applications.php"><i class="fa fa-thumbtack"></i><span>Application Tracking</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="index.php"><i class="fas fa-home"></i><span>Back to Home</span></a>
              </li>
              <li class="sidebar-dropdown">
                <a href="index.php#contact"><i class="fas fa-headphones"></i><span>Feedback</span></a>
              </li>
              <li class="sidebar-dropdown"><a href="logout.php"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
            </ul>
          </div>
          <hr>
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
  </div>
<!-- partial -->
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script  src="assets/js/dash-image.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<!-- <script src="assets/js/dashboard.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="assets/js/application.js"></script>
  <script src="./table.js"></script>

</body>

</html>