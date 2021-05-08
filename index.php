<?php
session_start();
include('database_connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pahal - A platform to empower the women</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!--link href="assets/img/favicon.png" rel="icon"-->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="text/javascript" src="assets\js\popup.js"></script>

  <!-- =======================================================
  * Template Name: Dewi - v4.1.0
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">pahal.in</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
            <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li> -->
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <?php
            if(!isset($_SESSION['user_id']) && !isset($_SESSION['org_id']))
            { 
              echo '<li>';
              echo '<a class="getstarted scrollto" href="login.php">Login</a>';
              echo '<li class="dropdown"><a class="getstarted scrollto" href="signup.php" style="background-color: orangered; border-color: orangered;">Signup</a>';
              echo '</li>';
            }
            if(isset($_SESSION['user_id'])){
              echo '<li class="dropdown"><a class="getstarted scrollto"  style="background-color: orangered;';
              echo 'border-color: orangered;">';
              echo  $_SESSION["fullname"];
              echo '<i class="bi bi-chevron-down"></i></a>';
              echo '<ul><li><a href="profile.php">Profile</a></li><li><a href="writeBlog.php">Write a Blog';
              echo '</a></li></ul></li>';
              echo '<li><a class="getstarted scrollto" href="logout.php">Logout</a></li>';
            }
            if(isset($_SESSION['org_id'])){
              $var = $_SESSION['org_name'];
              echo '<li><a class="nav-link scrollto" href="#profile">';
              echo "$var";
              echo '</a></li><li><a class="getstarted scrollto" href="logout.php">Logout</a></li>';
            }
            ?>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
      
        <img src="assets\img\Pahal Logo.png" alt="Pahal", width="300px" style="padding: 10px;">
     
      <!-- <h1>Plan. Launch. Grow.</h1> -->
      <h2>A platform to empower the women</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=6elzSKCRuGg" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Tutorial</span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Boxes Section ======= -->
    <section id="about-boxes" class="about-boxes">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="assets/img/about-boxes-1.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-brush-4-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Mission</a></h5>
                <p class="card-text">To help every woman break the cycle of suppression and poverty that prevents them from reaching their full potential.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="assets/img/about-boxes-2.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-calendar-check-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Plan</a></h5>
                <p class="card-text">To provide job opportunities to women as per their capabilities and empower them through a platform where their voices can be heard and will inspire others.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="assets/img/about-boxes-3.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-movie-2-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Vision</a></h5>
                <p class="card-text">We envision a world where every woman has the strength to speak up for themselves & to earn a living on their own.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Boxes Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">Jobs for women</a></h4>
              <p>We provide job opportunities to unemployed women to empower them.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4><a href="#">Recruitment for organizations</a></h4>
              <p>Organizations can recruit the candidates as per their needs.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-blockquote-right"></i>
              <h4><a href="#">Blogging</a></h4>
              <p>Blogging feature to inspire or motivate them for their bright future.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-laptop"></i>
              <h4><a href="#">Trainings</a></h4>
              <p>Provide training to make them industry ready.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-command"></i>
              <h4><a href="#">Direct User-Organisation Commuication</a></h4>
              <p>Instant messaging will keep the users in touch with organization for any doubt assistance.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://pbs.twimg.com/profile_images/1373353285566959619/0BNYgDUj_400x400.jpg" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Kiran Bedi</h3>
                <h4>Social Activist</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Empowered women who reach tough or unconventional positions make CHOICES not sacrifices.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://economictimes.indiatimes.com/thumb/height-450,width-600,imgsize-118036,msid-70419588/mary-kom.jpg?from=mdr" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Mary Kom</h3>
                <h4>Member of Parliament,Rajya Sabha</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Don't let anyone tell you are weak beacuse you are a WOMEN.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://back.3blmedia.com/sites/default/files/styles/ratio_3_2/public/triplepundit/wide/indra-nooyi.jpg" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Indra Nooyi</h3>
                <h4>PepsiCo CEO</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  An important attribute of success is to be YOUSELF.Never hide what makes you,YOU.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Arundhati_Roy_W.jpg/1200px-Arundhati_Roy_W.jpg" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Arundhati Roy</h3>
                <h4>Novelist</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  The only dream worth having, I told her, is to dream that you will live while you're alive and die only when you're dead.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

    <div class=" section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>JECRC Foundation, Jaipur</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>info@pahal.in<br>contact@pahal.in</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+919876543210</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>pahal.in</h3>
              <p>
                JECRC Foundation, Jaipur<br><br>
                <strong>Phone:</strong> +919876543210<br>
                <strong>Email:</strong> info@pahal.in<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Fill your email address to subscribe our Newsletter</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>pahal.in</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">Code Smashers</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php 
  if(isset($_SESSION['status']) and !isset($_SESSION['onetime'])){
    $var = $_SESSION['status'];
    $_SESSION['onetime'] = 'Done';
    echo '<div id="snackbar">';
    echo "$var";
    echo '</div>';
  }
  ?>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
</body>

</html>