<?php
session_start();
require_once('database_connection.php');
 
if(isset($_POST['user_submit']))
{
    if(isset($_POST['fullname'],$_POST['username'],$_POST['mobilenumber'],$_POST['password']) && !empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $fullname = trim($_POST['fullname']);
        $username = trim($_POST['username']);
        $mobilenumber = trim($_POST['mobilenumber']);
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
                $sql = "insert into user (fullname, username, mobilenumber, password ) values(:fullname,:username,:mobilenumber,:password)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':fullname'=>$fullname,
                        ':username'=>$username,
                        ':mobilenumber'=>$mobilenumber,
                        ':password'=>$hashPassword
                    ];
                    
                    $handle->execute($params);

                    $query = "SELECT * FROM user WHERE username = :username";
                    $statement = $pdo->prepare($query);
                    $statement->execute(
                      array(
                        ':username' => $username
                      )
                    );
                    $count = $statement->rowCount();
                    if($count > 0){
                      $result = $statement->fetchAll();
                      foreach($result as $row)
                      {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['status'] = 'User has been created successfully';
                      }
                    }
                    
                    $success = 'User has been created successfully';
                    header("location:index.php");

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
<?php
require_once('database_connection.php');
if(isset($_POST['org_submit']))
{
    if(isset($_POST['org_name'],$_POST['org_username'],$_POST['org_mobilenumber'],$_POST['org_password']) && !empty($_POST['org_name']) && !empty($_POST['org_address']) && !empty($_POST['org_name']) && !empty($_POST['org_password']))
    {
        $org_name = trim($_POST['org_name']);
        $org_username = trim($_POST['org_username']);
        $org_mobilenumber = trim($_POST['org_mobilenumber']);
        $org_password= trim($_POST['org_password']);


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
                $sql = "insert into organization (org_name, org_username, org_mobilenumber, org_password ) values(:org_name, :org_username, :org_mobilenumber, :org_password)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':org_name'=>$org_name,
                        ':org_username'=>$org_username,
                        ':org_mobilenumber'=>$org_mobilenumber,
                        ':org_password'=>$hashPassword

                    ];
                    
                    $handle->execute($params);

                    $query = "select * from organization where org_username = :org_username";
                    $stmt = $pdo->prepare($query);
                    $p = ['org_username'=>$org_username];
                    $stmt->execute($p);
                    $count = $stmt->rowCount();
                    if($count > 0){
                      $result = $stmt->fetchAll();
                      foreach($result as $row)
                      {
                        $_SESSION['org_id'] = $row['org_id'];
                        $_SESSION['org_username'] = $row['org_username'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['status'] = 'Organization has been created successfully';
                      }
                    }
                    
                    $success = 'Organization has been created successfully';
                    
                    header("location:index.php");
                    
                    
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
    <meta charset="UTF-8"/>
    <title>Login</title>

    <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
    crossorigin="anonymous">
   <link rel="stylesheet" href="./assets/css/login.css"/>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
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
        <form method="POST">
            <h1>Wanna join our mission?<br><p style="margin: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: medium;">We would love to have you in<span style="font-family: Pacifico; font-size: 20px;"> pahal </span>family</p></h1><br>
            <input type="text" placeholder="Organization name" name="org_name" value="" required/>
            <input type="email" placeholder="Email" name="org_username" value="" required/>
            <input type="tel" placeholder="Mobile number" pattern="[0-9]{10}" name="org_mobilenumber" value="" required/>
            <span style="display: flex;">
            <input type="password" placeholder="Password" name="org_password" required />
            <span style="width: 20px;"></span>
            <input type="password" placeholder="Confirm password" required />
            </span>
            <span><button type="submit" name="org_submit" style="text-decoration:none; color: white;">Register</button></span>
            <p style="
            background-color: rgba(255, 255, 255, 0.651);
            color: #000000;
            padding: 4px;
            border-radius: 30px;
            width: 200%;
            "
            >Already have registered? <a href="login.php" style="color: #ff6d2a; font-weight: 600; font-size: 14px;">Login now!</a></p>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="POST">
            <h1>Wanna join us?<br><p style="margin: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: medium;">We would love to have you in<span style="font-family: Pacifico; font-size: 20px;"> pahal </span>family</p></h1><br>
            <input type="text" name="fullname" value="" placeholder="Full name" required/>
            <input type="email" name="username" value="" placeholder="Email" required/>
            <input type="tel" placeholder="Mobile number" name="mobilenumber" value="" pattern="[0-9]{10}" required/>
            <span style="display: flex;">
            <input type="password" placeholder="Password" name="password" maxlength="100" minlength="8" required />
            <span style="width: 20px;"></span>
            <input type="password" placeholder="Confirm password" name="re-password" maxlength="100" minlength="8" required />
            </span>
            <span><button type="submit" name="user_submit" style="text-decoration:none; color: white;">Register</button></span>
            <p style="
            background-color: rgba(255, 255, 255, 0.651);
            color: #000000;
            padding: 4px;
            border-radius: 30px;
            width: 200%;
            "
            >Already have registered? <a href="login.php" style="color: #ff6d2a; font-weight: 600; font-size: 14px;">Login now!</a></p>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Finding opportunities?</h1>
                <p>Register to our platform and explore new opportunities</p>
                <button class="ghost" id="signIn">Register as User</button>
                <hr>
                <button type="submit" class="ghost" id="cancel" style="border: none;"><a class="zoom" href="index.php">Go back to home</a></button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Not a user?</h1>
                <p>Click on below button to Register as organization</p>
                <button type="submit" class="ghost" id="signUp">Register as Organization</button>
                <hr>
                <button type="submit" class="ghost" id="cancel" style="border: none;"><a class="zoom" href="index.php">Go back to home</a></button>
            </div>
        </div>
    </div>
</div>
<script src="./assets/js/login.js"></script>
</body>
</html>