<?php
session_start();
require_once('database_connection.php');

if(isset($_SESSION['user_id']))
            { 

              if(isset($_POST['submit']))
              {
                $title=$_POST['title'];
                $content=$_POST['content'];
                $uid=$_SESSION['user_id'];

                $sql = "INSERT INTO blog (user_id,title, content, uploaddate)
                         VALUES ('$uid','$title','$content',now())";
                

                if ($pdo->query($sql)) {
                  echo "<script type= 'text/javascript'>alert('Blog Successfully Submitted');</script>";
                      }
                else{
                  echo "<script type= 'text/javascript'>alert('Error occured.');</script>";
                  }

              }
                   
           }
if(isset($_SESSION['org_id']))
            {
  

              if(isset($_POST['submit']))
              {
                $title=$_POST['title'];
                $content=$_POST['content'];
                $oid=$_SESSION['org_id'];
                


                $sql = "INSERT INTO blog (org_id,title, content, uploaddate)
                    VALUES ('$oid','$title','$content',now())";
                

                if ($pdo->query($sql)) {
                  echo "<script type= 'text/javascript'>alert('Blog Successfully Submitted');</script>";
                      }
                else{
                  echo "<script type= 'text/javascript'>alert('Error occured.');</script>";
                  }

              }
            
      }


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Blog create</title>
  <!--Originally by Ross Andeson--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'><link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/writeBlog.css">
<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Asul' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top" style="background-color: rgba(21, 34, 43, 0.85);">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.html">pahal.in</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      
      <ul>
        <li>
         <?php
            if(isset($_SESSION['user_id'])){
              echo '<script type="text/javascript">myFuction();</script>';
              $var = $_SESSION['fullname'];
              echo '<li><a class="nav-link scrollto" href="#profile">';
              echo "$var";
              echo '</a></li>';
            }
            if(isset($_SESSION['org_id'])){
              echo '<script type="text/javascript">function myFunction() {var x = document.getElementById("snackbar");x.className = "show";setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);}</script>';
              $var = $_SESSION['org_name'];
              echo '<li><a class="nav-link scrollto" href="index.php">';
              echo "$var";
              echo '</a></li>';
            }
            ?></li>
        <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
      </ul>


      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>
<!-- End Header -->


<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="newPost">
  <div class="top">
  <br>
  <h3>Write to inspire</h3>
  
  <div class="buttons">
    <!--<button type="button">save draft</button>-->
    <button data-func="clear" type="button" id="clr">Clear <i class="fa fa-trash"></i></button>
    <button data-func="save" type="button" >Save <i class="fa fa-save"></i></button>
    <button type="submit" name="submit">Submit</button>
            
    
  </div>
  <br><br><br>
  </div>
  

  <input class="new" type="text" name="title" placeholder="Title">
  <div class="toolbar">
    <button type="button" data-func="bold"><i class="fa fa-bold"></i></button>
    <button type="button" data-func="italic"><i class="fa fa-italic"></i></button>
    <button type="button" data-func="underline"><i class="fa fa-underline"></i></button>
    <button type="button" data-func="justifyleft"><i class="fa fa-align-left"></i></button>
    <button type="button" data-func="justifycenter"><i class="fa fa-align-center"></i></button>
    <button type="button" data-func="justifyright"><i class="fa fa-align-right"></i></button>
    <button type="button" data-func="insertunorderedlist"><i class="fa fa-list-ul"></i></button>
    <button type="button" data-func="insertorderedlist"><i class="fa fa-list-ol"></i></button>
    <div class="customSelect">
      <select data-func="fontname">
        <optgroup label="Serif Fonts">
          <option value="Bree Serif">Bree Serif</option>
          <option value="Georgia">Georgia</option>
           <option value="Palatino Linotype">Palatino Linotype</option>
          <option value="Times New Roman">Times New Roman</option>
        </optgroup>
        <optgroup label="Sans Serif Fonts">
          <option value="Arial">Arial</option>
          <option value="Arial Black">Arial Black</option>
          <option value="Asap" selected>Asap</option>
          <option value="Comic Sans MS">Comic Sans MS</option>
          <option value="Impact">Impact</option>
          <option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Trebuchet MS">Trebuchet MS</option>
          <option value="Verdana">Verdana</option>
        </optgroup>
        <optgroup label="Monospace Fonts">
          <option value="Courier New">Courier New</option>
          <option value="Lucida Console">Lucida Console</option>
        </optgroup>
      </select>
    </div>
    <div class="customSelect">
      <select data-func="formatblock">
        <option value="h1">Heading 1</option>
        <option value="h2">Heading 2</option>
        <option value="h4">Subtitle</option>
        <option value="p" selected>Paragraph</option>
      </select>
    </div>
  </div>
  <textarea class="editor" name="content"></textarea>
</div>
</form>
<!-- partial -->
<script src="assets/js/main.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./assets/js/writeBlog.js"></script>
</body>
</html>
