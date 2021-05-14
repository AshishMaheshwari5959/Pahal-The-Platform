<?php
session_start();
require_once('database_connection.php');

if(!isset($_SESSION['user_id']) && !isset($_SESSION['org_id']))
            {
              header('location:index.php');
            }
if(isset($_SESSION['user_id']))
            {
              if(isset($_REQUEST['btn_insert'])){


                try
  {
  $title = $_REQUEST['title'];
  $content = $_REQUEST['content'];
  $uploaddate = date('Y-m-d H:i:s');
  $user_id = $_SESSION['user_id'];
  $name = $_REQUEST['title'];
  
   
  $image_file = $_FILES["txt_file"]["name"];
  $type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
  $size  = $_FILES["txt_file"]["size"];
  $temp  = $_FILES["txt_file"]["tmp_name"];
  
  $path="upload/".$image_file; //set upload folder path
  
  if(empty($title)){
   $errorMsg="Please Enter Title";
  }
  else if(empty($image_file)){
   echo "Please Select Image";
  }
  else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
  { 
   if(!file_exists($path)) //check file not exist in your upload folder path
   {
    if($size < 5000000) //check file size 5MB
    {
     move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory directory to your upload folder
    }
    else
    {
     echo "Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
    }
   }
   else
   { 
    echo "File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
   }
  }
  else
  {
   echo "Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
  }
  
  if(!isset($errorMsg))
  {
   $insert_stmt=$pdo->prepare('INSERT INTO blog(user_id,title,content,image,uploaddate,image_name) VALUES(:user_id,:title,:content,:loc,:uploaddate,:image_file)'); //sql insert query     
   $insert_stmt->bindParam(':user_id',$user_id); 
   $insert_stmt->bindParam(':title',$title);
   $insert_stmt->bindParam(':content',$content);  
   $insert_stmt->bindParam(':loc',$path); 
   $insert_stmt->bindParam(':uploaddate',$uploaddate);
   $insert_stmt->bindParam(':image_file',$image_file);   //bind all parameter 
  
   if($insert_stmt->execute())
   {
    $insertMsg="File Upload Successfully........"; //execute query success message
    header("refresh:3;user-feed.php"); //refresh 3 second and redirect to index.php page
   }
  }
 }
 catch(PDOException $e)
 {
  echo $e->getMessage();
 }
              }
            

            else{
              header("login.php");
            }
  
    
 
}
if(isset($_SESSION['org_id']))
            {}          


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Blog create</title>
  <!--Originally by Ross Andeson-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'><link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

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

  <!-- <link href="/css/index.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="assets/css/dashboard.css">

<!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
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
</head>

<body>

<!-- ======= Header ======= -->
<form method="POST" enctype="multipart/form-data">
<div class="newPost">
  <div class="avatar-upload">
    <div class="avatar-preview">
      <div id="imagePreview" style="background-image: url('assets/img/up.png';);"></div>
    </div>
    <div class="avatar-edit">
      <input type="file" name="txt_file" id="imageUpload" accept=".png, .jpg, .jpeg" />
      <label for="imageUpload"></label>
      </div>
  </div>

  <span class="top">
    <br>
    <h3>Write to inspire</h3>
    <div class="buttons top-right">
      <!--<button type="button">save draft</button>-->
      <button data-func="clear" type="button" id="clr">Clear  <i class="fa fa-trash"></i></button>
      <button data-func="save" type="button" >Save  <i class="fa fa-save"></i></button>
      <button type="submit" name="btn_insert">Submit</button>
    </div>
    <br><br><br>
    <input class="new" type="text" name="title" placeholder="Title">
      </span>
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
  <textarea name="content" rows="10" cols="150" ></textarea>
</div>
</form>
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
		              <a href="user_profile.php" style="font-size: medium; font-weight: bold;"><i class="fa fa-user"></i><span>Profile</a>
		            </li>
		            <li class="sidebar-dropdown">
		              <a href="user-feed.php" style="font-size: medium; font-weight: bold;"><i class="far fa-newspaper"></i><span>News Feed</span></a>
		            </li>
		            <li class="sidebar-dropdown active-tab">
		              <a href="writeBlog.php" style="font-size: medium; font-weight: bold;"><i class="fa fa-file-alt"></i><span>Write a blog</span></a>
		            </li>
		            <li class="sidebar-dropdown">
		              <a href="myblogs.php" style="font-size: medium; font-weight: bold;"><i class="fa fa-th-large"></i><span>My Blogs</span></a>
		            </li>
		            <!-- Maps -->
		            <li class="sidebar-dropdown">
		              <a href="applications.php" style="font-size: medium; font-weight: bold;"><i class="fa fa-thumbtack"></i><span>Application Tracking</span></a>
		            </li>
		            <li class="sidebar-dropdown" style="font-size: medium; font-weight: bold;"><a href="logout.php"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
		          </ul>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/write-a-blog-img.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./assets/js/writeBlog.js"></script>

</body>
</html>
