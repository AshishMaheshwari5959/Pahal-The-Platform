<?php
session_start();
require_once('database_connection.php');
 
if(isset($_POST['submit']))
{
    if(isset($_POST['org_name'],$_POST['org_username'],$_POST['org_mobilenumber'],$_POST['org_password']) && !empty($_POST['org_name']) && !empty($_POST['org_address']) && !empty($_POST['org_name']) && !empty($_POST['org_password']))
    {
        $org_name = trim($_POST['org_name']);
        $org_username = trim($_POST['org_username']);
        $org_mobilenumber = trim($_POST['org_mobilenumber']);
        $org_city= trim($_POST['org_city']);
        $org_state= trim($_POST['org_state']);
        $org_address= trim($_POST['org_address']);
        $org_password= trim($_POST['org_password']);
        $org_file= trim($_POST['org_file']);


        $options = array("cost"=>4);
        $hashPassword = password_hash($org_password,PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d H:i:s');
 
        if(filter_var($org_username, FILTER_VALIDATE_EMAIL))
    {
            $sql = 'select * from organization where org_username = :org_username';
            $stmt = $pdo->prepare($sql);
            $p = ['org_username'=>$org_username];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into organization (org_name, org_username, org_mobilenumber, org_city, org_state, org_address, org_password, org_file ) values(:org_name, :org_username, :org_mobilenumber, :org_city, :org_state, :org_address, :org_password, :org_file)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':org_name'=>$org_name,
                        ':org_username'=>$org_username,
                        ':org_mobilenumber'=>$org_mobilenumber,
                        ':org_city'=>$org_city,
                        ':org_state'=>$org_state,
                        ':org_address'=>$org_address,
                        ':org_password'=>$hashPassword,
                        ':org_file'=>$org_file,

                    ];
                    
                    $handle->execute($params);
                    
                    $success = 'Organization has been created successfully';
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {
                $org_name = $org_name;
                $org_username = '';
                $org_password = $org_password;
 
                $errors[] = 'Email address already registered';
            }
        }
        else
        {
            $errors[] = "Email address is not valid";
        }
    }
    else
    {
        if(!isset($_POST['org_name']) || empty($_POST['org_name']))
        {
            $errors[] = 'Organization name is required';
        }
        else
        {
            $org_name = $_POST['org_name'];
        }
        
        if(!isset($_POST['org_username']) || empty($_POST['org_username']))
        {
            $errors[] = 'Username is required';
        }
        else
        {
            $valEmail = $_POST['org_username'];
        }
 
        if(!isset($_POST['org_password']) || empty($_POST['org_password']))
        {
            $errors[] = 'Password is required';
        }
        else
        {
            $valPassword = $_POST['org_password'];
        }
        
    }
 
}
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
  <link href="assets/img/favicon.png" rel="icon">
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/signup.css" rel="stylesheet">

</head>
<body>
  <section class="wrapper">
    <div class="content">
      <header>
        <a href="index.php"><img src="assets\img\Pahal Logo.png" alt=""></a>
        <h1>Come and join our mission</h1>
      </header>
      <?php 
        if(isset($errors) && count($errors) > 0)
        {
          foreach($errors as $error_msg)
          {
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
          }
                }
                
                if(isset($success))
                {
                    
                    echo '<div class="alert alert-success">'.$success.'</div>';
                }
      ?>

      <center>
        <section  id="form">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form">
                <!-- Organization name-->
                <div class="input-group">
                  <input type="text" placeholder="Organization name" name="org_name" id="name" value="<?php echo ($org_name??'')?>">
                </div>
                <!-- Username or Email -->
                <div class="input-group">
                  <input type="email" placeholder="Username or Email" id="username" name="org_username" value="<?php echo ($org_username??'')?>">
                </div>
                <div class="input-group">
                    <input type="tel" placeholder="Mobile number" id="number" pattern="[0-9]{10}" name="org_mobilenumber" value="<?php echo ($org_mobilenumber??'')?>">
                </div>
                <!-- City-->
                <div class="input-group">
                  <input type="text" placeholder="Current working city" id="city" name="org_city" value="<?php echo ($org_city??'')?>">
                </div>
                <!-- State-->
                <div class="input-group">
                  <input type="text" placeholder="State" id="state" name="org_state" value="<?php echo ($org_state??'')?>">
                </div>
                <!-- Address -->
                <div class="input-group">
                  <input type="text" placeholder="Permanent Address" id="address" name="org_address" value="<?php echo ($org_address??'')?>">
                </div>
        </section>
        <section>
          <div class="input-group">
            <input type="password" placeholder="Password" id="password" name="org_password">
          </div>

          <div class="input-group">
            <input type="password" placeholder="Confirm password" id="c-password">
          </div>
          <div class="input-group uploadFile">
            <p style="margin-bottom: 0; margin-top: 10px;  align-self: flex-start;">Please upload a government ID proof</p>
            <input type="file" id="uploadID" name="org_file"/>
          </div>
          <div style="display: inline-flex;">
            <div class="input-group" style="margin-right: 5px;"><a href="index.php"><button id="signup" >Go back</button></a></div>
            <div class="input-group"><button id="signup" type="submit" name="submit">Signup</button></div>
          </div>
        </section>

        </form>
      
      <footer>
        <h6>Already have an account? <a href="login.php">Login here!</a></h6>
      </footer>
    </div>
  </center>  
  <script src="assets/js/signup.js"></script>
</body>

</html>