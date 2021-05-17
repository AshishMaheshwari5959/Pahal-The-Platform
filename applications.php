<?php
session_start();
include('database_connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Applications | Pahal</title>
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
  <link rel="stylesheet" href="assets/css/application.css">
  <link href="/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>

  <!-- partial:index.partial.html -->
  <section class="wrapper">
    <ul class="tabs">
      <li class="active">Applied</li>
      <li>Shortlisted</li>
      <!--<li>About</li>-->
    </ul>
  
    <ul class="tab__content">
      <li class="active">
        <div class="container-fluid">
          <div class="row">
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="content__wrapper">
            <div class="table-responsive">
            <table id="customers">
              <tr>
                <th>Company</th>
                <th>Applied on</th>
                <th>Application Status</th>
                <th>Job Role</th>
                <th>Location</th>
                <th>Skills required</th>
              </tr>
              <tr>
                <td>Feeding India</td>
                <td>15 April'21</td>
                <td>Applied</td>
                <td>Volunteering</td>
                <td>Kolkata</td>
                <td>Social servicing</td>
              </tr>
              <tr>
                <td>Bringle Exvellence</td>
                <td>25 March'21</td>
                <td>Applied</td>
                <td>Marketing</td>
                <td>Thane</td>
                <td>Marketing,communicational skills</td>
              </tr>
              <tr>
                <td>Aashman Foundation</td>
                <td>1 April'21</td>
                <td>Not selected</td>
                <td>Fundraiser</td>
                <td>Panchkula</td>
                <td>Communicational skills</td>
  
              </tr>
              <tr>
                <td>Evidyaloka</td>
                <td>7 April'21</td>
                <td>Applied</td>
                <td>Teacher</td>
                <td>Bengaluru</td>
                <td>Teaching</td>
              </tr>
              <tr>
                <td>Hamari Pahchan</td>
                <td>5 May'21</td>
                <td>Applied</td>
                <td>Crafting</td>
                <td>New Delhi</td>
                <td>Art and craft</td>
              </tr>
              
              </table>
            <!--<table class="table table-striped table-sm">
              <thead>
              <tr>
                <th>Company Name</th>
                <th>Job Title</th>
                <th>Location</th>
                <th>Date Applied</th>
              </tr>
              </thead>
              <tbody id="jobBody">
              <tr>
                 <td>Tesla</td>
                <td>Software Engineer</td>
                <td>Palo Alto, California</td>
                <td>8/3/20</td>
                <td>No</td>
                <td>No</td>
                <td>No</td>
                <td>https://www.tesla.com/careers/job/software-engineerdataplatform-40000</td>
                <td>
                  <a class="add" title="Add" data-toggle="tooltip" id="create"><i class="material-icons">&#xE03B;</i></a>
                  <a class="edit" title="Edit" data-toggle="tooltip" id="update"><i class="material-icons">&#xE254;</i></a>
                  <a class="delete" title="Delete" data-toggle="tooltip" id="delete"><i class="material-icons">&#xE872;</i></a>
                </td> 
              </tr>
              </tbody>
            </table>-->
            </div>
            </div>
      
          </main>
          </div>
        </div>
          <!--<h2 class="text-color">Pick a color</h2>
          
          <ul class="colors">
            <li data-color="#2ecc71"></li>
            <li data-color="#D64A4B"></li>
            <li data-color="#8e44ad"></li>
            <li class="active-color" data-color="#46a1de"></li>
            <li data-color="#bdc3c7"></li>
          </ul>-->
        </div>
      </li>
      <li>
        <div class="content__wrapper">
          <div class="table-responsive">
            <table id="customers">
              <tr>
                <th>Company</th>
                <th>Job Role</th>
                <th>Shortlist Date</th>
                <th>Location</th>
                <th>Salary</th>
              </tr>
              <tr>
                <td>Aaweg Charitable Trust</td>
                <td>Story Writing</td>
                <td>2 May'21</td>
                <td>New Delhi</td>
                <td>5k-10k</td>
              </tr>
              <tr>
                <td>Lost and Found Foundation</td>
                <td>Fundraising</td>
                <td>23 April'21</td>
                <td>Mumbai</td>
                <td>5k-7k</td>
              </tr>
              <tr>
                <td>Jivanam Asteya Organization</td>
                <td>Art and Craft</td>
                <td>31 April'21</td>
                <td>Surat</td>
                <td>7k-10k</td>
              </tr>
              <tr>
                <td>Badlav Seva Samiti</td>
                <td>Fundraising</td>
                <td>5 May'21</td>
                <td>Lucknow</td>
                <td>8k-10k</td>
              </tr>
              
              </table>
            </div>
          <!--<h2 class="text-color">Her</h2>
          
          <img src="http://lewihussey.com/codepen-img/her.jpg">-->
        </div>
      </li>
      <li>
        <div class="content__wrapper">
          <h2 class="text-color">About</h2>
          
          <p>Created by <a class="text-color" href="http://lewihussey.com" target="_blank">Lewi Hussey</a></p>
        </div>
      </li>
    </ul>
  </section>
  <div class="s-layout">
    <div class="s-layout__sidebar">
      <a class="s-sidebar__trigger" href="#0">
        <i class="fa fa-bars"></i>
      </a>

      <nav class="s-sidebar__nav" id="sidebar">
          <div class="sidebar-header">
            <!-- <div class="user-pic" style="color: bisque;">
              <i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
            </div>
            <div class="user-info">
              <span class="user-name"> <strong><?php echo $_SESSION['fullname']; ?></strong></span>
            </div> -->
            <div class="circle">
              <!-- <img class="profile-pic" src="" style="padding: 0px"> -->
              <!-- <i class="fa fa-user fa-2x"></i> -->
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
              <li class="sidebar-dropdown">
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
              <li class="sidebar-dropdown active-tab">
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
          <hr style="height: 1px; margin: 10px 10px 0 10px;">
          <div class="sidebar-footer">
            <center>
            <div class="copyright">
              <strong><span>pahal.in&copy; </span></strong>2021<br>
              Designed by <a>Code Smashers</a><br>
            </div>
          </center>
          </div>
        </nav>
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
<script src="assets/js/dashboard.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="assets/js/application.js"></script>
  <script src="./table.js"></script>

</body>

</html>