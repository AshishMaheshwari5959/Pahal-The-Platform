<!--User-->

<?php
session_start();
include('database_connection.php');
$message = '';
if(isset($_SESSION['user_id']))
{
  header('location:index.php');
}

if(isset($_POST['login']))
{
  $query = "
    SELECT * FROM user 
      WHERE username = :username
  ";
  $statement = $pdo->prepare($query);
  $statement->execute(
    array(
      ':username' => $_POST["username"]
    )
  );  
  $count = $statement->rowCount();
  if($count > 0)
  {
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["password"], $row["password"]))
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['status'] = "Login Successful";
        $sub_query = "
        INSERT INTO login_details 
          (user_id) 
          VALUES ('".$row['user_id']."')
        ";
        $statement = $pdo->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $pdo->lastInsertId();
        header('location:index.php');
      }
      else
      {
        $message = '<label>Wrong Password</label>';
      }
    }
  }
  else
  {
    $message = '<label>Wrong Username</labe>';
  }
}
?>
<?php
$message = '';
if(isset($_SESSION['org_id']))
{
  header('location:index.php');
}

if(isset($_POST['org_login']))
{
  $query = "
    SELECT * FROM organization 
      WHERE org_username = :org_username
  ";
  $statement = $pdo->prepare($query);
  $statement->execute(
    array(
      ':org_username' => $_POST["org_username"]
    )
  );  
  $count = $statement->rowCount();
  if($count > 0)
  {
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["org_password"], $row["org_password"]))
      {
        $_SESSION['org_id'] = $row['org_id'];
        $_SESSION['org_username'] = $row['org_username'];
        $_SESSION['org_name'] = $row['org_name'];
        $_SESSION['status'] = "Login Successful";
        $sub_query = "
        INSERT INTO org_details 
          (org_id) 
          VALUES ('".$row['org_id']."')
        ";
        $statement = $pdo->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $pdo->lastInsertId();
        header('location:welcome_org.php');
      }
      else
      {
        $message = '<label>Wrong Password</label>';
      }
    }
  }
  else
  {
    $message = '<label>Wrong Username</label>';
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
   <link rel="stylesheet" href="./assets/css/login.css" />
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <?php echo $message; ?>
        <form method="POST">
            <h1>Login as Oraganization</h1><br>
            <input type="email" name="org_username" placeholder="Email" required />
            <input type="password" name="org_password" placeholder="Password" required />
            <a class="zoom" href="#">Forgot your password?</a>
            <button type="submit" name="org_login" style="text-decoration:none; color: white;">Login</button>
            <p style="
              background-color: rgba(255, 255, 255, 0.651);
              color: #000000;
              padding: 4px;
              border-radius: 30px;
              width: 200%;
              "
            >Haven't registered yet? <a href="org_signup.php" style="color: #ff6d2a; font-weight: 600; font-size: 14px;">Sign up now!</a></p>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="POST">
            <h1>Hi, welcome back<br><p style="margin: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: medium;">Login here to explore new opportunities</p></h1><br>
            <input type="email" name="username" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <a class="zoom" href="#">Forgot your password?</a>
            <span><button type="submit" name="login" style="text-decoration:none; color: white;">Login</button></span>
            <p style="
            background-color: rgba(255, 255, 255, 0.651);
            color: #000000;
            padding: 4px;
            border-radius: 30px;
            width: 200%;
            "
            >Haven't registered yet? <a href="user_signup.php" style="color: #ff6d2a; font-weight: 600; font-size: 14px;">Sign up now!</a></p>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Finding opportunities?</h1>
                <p>Login to our platform and explore new opportunities</p>
                <button class="ghost" id="signIn">Login as User</button>
                <button type="submit" class="ghost" id="cancel" style="border: none;"><a class="zoom" href="index.php">Go back to home</a></button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Not a user?</h1>
                <p>Login to share job opportunities and fulfill your demands</p>
                <button type="submit" class="ghost" id="signUp">Login as Organization</button>
                <button type="submit" class="ghost" id="cancel" style="border: none;"><a class="zoom" href="index.php">Go back to home</a></button>
            </div>
        </div>
    </div>
</div>
<script src="./assets/js/login.js"></script>
</body>
</html>