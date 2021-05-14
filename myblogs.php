<?php 

include('database_connection.php');



 ?>       
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Blogs | Pahal</title>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

  <link href="/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link href="assets/css/myblogs.css" rel="stylesheet">

</head>

<body>

  <!-- partial:index.partial.html -->
  
  <main class="page-content" id="main">
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            

           <?php
            try {   
                session_start();
                $id = $_SESSION['user_id'];

               $stmt = $pdo->query('SELECT blog.uploaddate, blog.title, blog.content, blog.image, user.fullname FROM blog INNER JOIN  user ON blog.user_id=user.user_id where blog.user_id='."$id".' ORDER BY uploaddate desc;');
               $rows = $stmt->fetch();
                $n = sizeof($rows);
                $t = gettype($n);
                $stmt = $pdo->query('SELECT blog.uploaddate, blog.title, blog.content, blog.image, user.fullname FROM blog INNER JOIN  user ON blog.user_id=user.user_id where blog.user_id='."$id".' ORDER BY uploaddate desc;');
                if ($n > 1) {

                while($row = $stmt->fetch()){

              ?>
            <article class="entry">
              <div class="entry-img">
                <img src="<?php echo $row['image'];?>" alt="" class="img-fluid">
              </div>
              <h2 class="entry-title">
                <a href="blog-1.html"><?php echo $row["title"];?></a>
              </h2>
              <div class="entry-meta">
                <ul>
                  <li style="float: left;" class="d-flex align-items-center"><i class="bi bi-person"><a href="#">&nbsp;<?php echo $row["fullname"];?></a></i></li>
                  <li style="float: right;" class="d-flex align-items-center"><i class="bi bi-clock"><a href="#"><time datetime="2020-01-01">&nbsp;<?php echo $row["uploaddate"];?></time></a></i></li>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"><a href="#">&nbsp;12 Comments</a></i></li> -->
                </ul>
              </div>
              <div class="entry-content">
                <p>
                 <?php echo $row["content"];?>
                </p>
                <div class="read-more">
                  <a href="blog-1.html">Read More</a>
                </div>
              </div>
            </article>
          <?php 
               } } else {
                echo "Oops Please try after some time ................ Looks like there are no blogs";
               }
             }

               catch(PDOException $e) {
                  echo $e->getMessage();
                }
          ?>
    <!-- End blog entry -->
            
          </div><!-- End blog entries list --><!-- End blog sidebar -->
        </div>
      </div>
    </section>
  </main>
    <div class="s-layout">
	    <div class="s-layout__sidebar">
		    <a class="s-sidebar__trigger" href="#0">
		    	<i class="fa fa-bars"></i>
		    </a>

	    	<nav class="s-sidebar__nav" id="sidebar">
		        <div class="sidebar-header">
		          <div class="user-pic" style="color: bisque;">
		            <i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
		          </div>
		          <div class="user-info">
		            <span class="user-name"> <strong><?php echo $_SESSION['fullname']; ?></strong></span>
		          </div>
		        </div>
		        <div class="sidebar-menu">
		          <ul>
		            <li class="sidebar-dropdown">
		              <a href="profile.php"><i class="fa fa-user"></i><span>Profile</a>
		            </li>
		            <li class="sidebar-dropdown">
		              <a href="user-feed.php"><i class="far fa-newspaper"></i><span>News Feed</span></a>
		            </li>
		            <li class="sidebar-dropdown">
		              <a href="writeBlog.php"><i class="fa fa-file-alt"></i><span>Write a blog</span></a>
		            </li>
		            <li class="sidebar-dropdown  active-tab">
		              <a href="myblogs.php"><i class="fa fa-th-large"></i><span>My Blogs</span></a>
		            </li>
		            <!-- Maps -->
		            <li class="sidebar-dropdown">
		              <a href="applications.php"><i class="fa fa-thumbtack"></i><span>Application Tracking</span></a>
		            </li>
		            <li class="sidebar-dropdown"><a href="logout.php"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
		          </ul>
		        </div>
	        </nav>
	    </div>
    </div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- page-wrapper" -->
  <!-- partial -->
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/dashboard.js"></script>

</body>

</html>