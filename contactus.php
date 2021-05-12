<?php
session_start();
include('database_connection.php');


$conn = mysqli_connect('localhost', 'fred', 'zap' , 'pahal') or die($conn); 

if(!empty($_GET)){
 $name = $_GET['name'];
 $email = $_GET['email'];
 $subject = $_GET['subject'];
 $message = $_GET['message']; 
 mysqli_query($conn, "insert into tblcontact (user_name, user_email, subject, content) values ('$name', '$email', '$subject', '$message')"); 
 $toEmail = "m27sanjay@gmail.com";
 $mailHeaders = "From: " . $name . "<". $email .">\r\n";
 echo "Information Sent Successfully!";
}
?>