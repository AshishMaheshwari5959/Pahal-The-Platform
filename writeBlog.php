<?php
session_start();
include('database_connection.php');
if(!isset($_SESSION['user_id']) and !isset($_SESSION['org_id']))
{
  header('location:login.php');
}

if(isset($_SESSION['user_id']))
{
  $user_id = $_SESSION['user_id'];
  $stmt = $pdo->query("select * from user where user_id='$user_id;'");

  $row = $stmt->fetch();

  $userPicture = !empty($row[17])?$row[17]:'assets/img/user.jpg';
  $userPictureURL = $userPicture;
  $username = $row[1];

} elseif (isset($_SESSION['org_id'])) {
  $org_id = $_SESSION['org_id'];
  $stmt = $pdo->query("select * from organization where org_id='$org_id;'");

  $row = $stmt->fetch();

  $userPicture = !empty($row[13])?$row[13]:'assets/img/user.jpg';
  $userPictureURL = $userPicture;
  $username = $row[2];
  
} else{
  $userPicture = 'assets/img/user.jpg';
  $userPictureURL = $userPicture;
}

if(isset($_SESSION['user_id'])){
  if(isset($_REQUEST['btn_insert'])){
    try {
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
      } else if(empty($image_file)){
       echo "Please Select Image";
      } else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') { 
        if(!file_exists($path)) //check file not exist in your upload folder path
        {
          if($size < 5000000) //check file size 5MB
          {
            move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory directory to your upload folder
          } else {
            echo "Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
          }
        } else { 
          echo "File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
        }
      } else {
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
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Blog Created Succesfully")';  
        echo '</script>';   //execute query success message
        header("refresh:0;user-feed.php"); //refresh 3 second and redirect to index.php page
       }
      }
     }
     catch(PDOException $e)
     {
      echo $e->getMessage();
     }
  }
} elseif(isset($_SESSION['org_id'])){
  if(isset($_REQUEST['btn_insert'])){
    try {
      $title = $_REQUEST['title'];
      $content = $_REQUEST['content'];
      $uploaddate = date('Y-m-d H:i:s');
      $org_id = $_SESSION['org_id'];
      $name = $_REQUEST['title'];

      $image_file = $_FILES["txt_file"]["name"];
      $type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
      $size  = $_FILES["txt_file"]["size"];
      $temp  = $_FILES["txt_file"]["tmp_name"];
      
      $path="upload/".$image_file; //set upload folder path
      
      if(empty($title)){
       $errorMsg="Please Enter Title";
      } else if(empty($image_file)){
       echo "Please Select Image";
      } else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') { 
        if(!file_exists($path)) //check file not exist in your upload folder path
        {
          if($size < 5000000) //check file size 5MB
          {
            move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory directory to your upload folder
          } else {
            echo "Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
          }
        } else { 
          echo "File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
        }
      } else {
        echo "Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
      }
  
      if(!isset($errorMsg))
      {
       $insert_stmt=$pdo->prepare('INSERT INTO blog(org_id,title,content,image,uploaddate,image_name) VALUES(:org_id,:title,:content,:loc,:uploaddate,:image_file)'); //sql insert query     
       $insert_stmt->bindParam(':org_id',$org_id); 
       $insert_stmt->bindParam(':title',$title);
       $insert_stmt->bindParam(':content',$content);  
       $insert_stmt->bindParam(':loc',$path); 
       $insert_stmt->bindParam(':uploaddate',$uploaddate);
       $insert_stmt->bindParam(':image_file',$image_file);   //bind all parameter 
      
       if($insert_stmt->execute())
       {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Blog Created Succesfully")';  
        echo '</script>';   //execute query success message
        header("refresh:0;user-feed.php"); //refresh 3 second and redirect to index.php page
       }
      }
     }
     catch(PDOException $e)
     {
      echo $e->getMessage();
     }
  }
} else{
  header("login.php");
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
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

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
        
      </div>
      <form method="post" enctype="multipart/form-data">
        <input class="file-upload2" type="file" name="txt_file" accept="image/*"/>
        <div class="form-group title-container">
          <input type="text" class="form-control title" name="title" placeholder="Title"/>
          <span style="display: inline-flex; float: right;"><button type="submit" name="btn_insert" class="btn btn-primary form-control publish-btn">Publish</button></span>
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
          <textarea class="form-control bcontent" name="content" style="resize: none; overflow: auto; height: 100%" placeholder="Start writing from here..."></textarea>
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
                          <center><span class="user-name"><?php echo $username; ?></span></center>
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
              } elseif(isset($_SESSION['org_id'])){
            ?>
              <div class="sidebar-header">
                          <div class="circle" id="circlediv" style="background-image: url('<?php echo $userPicture; ?>');">
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
                            <center><span class="user-name"><?php echo $username; ?></span></center>
                          </div>
                        </div>
              <hr>
              <div class="sidebar-menu">
                <ul>
                  <li class="sidebar-dropdown">
                    <a href="org-profile.php"><i class="fa fa-user"></i><span>Profile</a>
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
                    <a href="chat.php"><i class="fas fa-comments"></i><span>Inbox</span></a>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="job-post.php"><i class="fas fa-graduation-cap"></i><span>Create a Job</span></a>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="org-myjobs.php"><i class="fa fa-thumbtack"></i><span>Track Jobs</span></a>
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
            } else {
          ?>
            <div class="sidebar-no-user">
              <img src="assets/img/Pahal Logo white.png" alt="">
              <center><p>A Platform to Empower The Women</p></center>
              <div class="ask">
                <div class="ask-login">
                  <a href="login.php">Log In</a>
                </div>
                <div class="ask-signup">
                  <a href="signup.php">Sign Up</a>
                </div>
              </div>
              <div class="sidebar-footer">
              <div class="copyright">
                <strong><span>pahal.in&copy; </span></strong>2021<br>
                Designed by <a>Code Smashers</a><br>
              </div>
            </div>
            </div>
            <?php
          }
          ?>
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
<!-- <script src="assets/js/dashboard.js"></script> -->
<script  src="assets/js/write-blog.js"></script>
<script  src="assets/js/dash-image.js"></script>

</body>

</html>