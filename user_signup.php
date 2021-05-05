<?php
session_start();
require_once('database_connection.php');
 
if(isset($_POST['submit']))
{
    if(isset($_POST['fullname'],$_POST['username'],$_POST['mobilenumber'],$_POST['password']) && !empty($_POST['fullname']) && !empty($_POST['dob']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $fullname = trim($_POST['fullname']);
        $username = trim($_POST['username']);
        $mobilenumber = trim($_POST['mobilenumber']);
        $dob= trim($_POST['dob']);
        $gender= trim($_POST['gender']);
        $city= trim($_POST['city']);
        $state= trim($_POST['state']);
        $maritalstatus= trim($_POST['maritalstatus']);
        $language= trim($_POST['language']);
        $password= trim($_POST['password']);


        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d H:i:s');
 
        if(filter_var($username, FILTER_VALIDATE_EMAIL))
		{
            $sql = 'select * from user where username = :username';
            $stmt = $pdo->prepare($sql);
            $p = ['username'=>$username];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into user (fullname, username, mobilenumber, dob, gender, city, state, maritalstatus, language, password ) values(:fullname,:username,:mobilenumber,:dob,:gender,:city,:state,:maritalstatus,:language,:password)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':fullname'=>$fullname,
                        ':username'=>$username,
                        ':mobilenumber'=>$mobilenumber,
                        ':dob'=>$dob,
                        ':gender'=>$gender,
                        ':city'=>$city,
                        ':state'=>$state,
                        ':maritalstatus'=>$maritalstatus,
                        ':language'=>$language,
                        ':password'=>$hashPassword
                    ];
                    
                    $handle->execute($params);
                    
                    $success = 'User has been created successfully';
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {
                $fullname = $fullname;
                $username = '';
                $password = $password;
 
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
        if(!isset($_POST['fullname']) || empty($_POST['fullname']))
        {
            $errors[] = 'Full name is required';
        }
        else
        {
            $fullname = $_POST['fullname'];
        }
        
        if(!isset($_POST['username']) || empty($_POST['username']))
        {
            $errors[] = 'Username is required';
        }
        else
        {
            $valEmail = $_POST['username'];
        }
 
        if(!isset($_POST['password']) || empty($_POST['password']))
        {
            $errors[] = 'Password is required';
        }
        else
        {
            $valPassword = $_POST['password'];
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
        <h1>Fill your details</h1>

        <!--Who-->
      <div>
        <p style="margin-bottom: 0;">User Signup</p>
        
      </header>

      <center>
        <section  id="form">
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
                    //header('location:login.php');
                }
			?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form">
          <!-- Full name-->
          <div class="input-group">
            <input type="text" placeholder="Full name" id="name" name="fullname" value="<?php echo ($fullname??'')?>">
          </div>

          <!-- Username or Email -->
          <div class="input-group">
            <input type="email" placeholder="Username or Email" id="username" name="username" value="<?php echo ($username??'')?>">
          </div>

          <!-- Mobile number -->
          <div class="input-group">
            <input type="tel" placeholder="Mobile number" id="number" pattern="[0-9]{10}" name="mobilenumber" value="<?php echo ($mobilenumber??'')?>">
          </div>

          <!-- DOB -->
          <div class="input-group">
            <input type="date" placeholder="Date of birth" id="dob" name="dob">
          </div>

          <!--Gender-->
          <div class="input-group">
            <p style="margin-bottom: 0; align-self: flex-start;">What's your gender?</p>
            <div style="align-self: flex-start;">
              <input type="radio" id="female" name="gender" value="female">
              <label for="female">Female</label>

              <input type="radio" id="other" name="gender" value="other">
              <label for="other">Rather not to say</label>
            </div>
          </div>

          <!-- City-->
          <div class="input-group">
            <input type="text" placeholder="Current city" id="city" name="city" value="<?php echo ($city??'')?>">
          </div>

          <!-- State-->
          <div class="input-group">
            <input type="text" placeholder="State" id="state" name="state" value="<?php echo ($state??'')?>">
          </div>

          <!-- Address -->
          

          <!--Martial Status -->
          <div class="input-group">
            <p style="margin-bottom: 0; align-self: flex-start;">What's your marital status?</p>
            <div style="align-self: flex-start;">
              <input type="radio" id="single" name="maritalstatus" value="single">
              <label for="single">Single</label>

              <input type="radio" id="married" name="maritalstatus" value="married">
              <label for="married">Married</label>

              <input type="radio" id="divorced" name="maritalstatus" value="divorced">
              <label for="divorced">Divorced</label>
            </div>
          </div>

          <!--Language Known -->
          <div class="input-group">
            <p style="margin-bottom: 0;  align-self: flex-start;">What's language you speak?</p>
            <div style="align-self: flex-start;">
              <input type="checkbox" id="hindi" name="language" value="hindi">
              <label for="hindi">Hindi</label>

              <input type="checkbox" id="english" name="language" value="english">
              <label for="english">English</label>

              <input type="checkbox" id="other" name="language" value="other">
              <label for="other">Other local language</label>
            </div>
          </div>
        </section>
        <section>
          <div class="input-group">
            <input type="password" placeholder="Password" id="password" name="password">
          </div>

          <div class="input-group">
            <input type="password" placeholder="Confirm password" id="re-password" name="re-password">
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