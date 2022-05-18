<?php

session_start();
header('location:signup.html');

$far = mysqli_connect('localhost','root');
if($far){
	echo" Connection Successful";
}else{
	echo " No Connection";
}

mysqli_select_db($far, 'signup');
$username = $_POST['user_name'];
$mail = $_POST['email'];
$password = $_POST['password'];

$cheak = " select * from users where user_name = '$username' && email = '$mail'";

$han = mysqli_query($far, $cheak);

$count = mysqli_num_rows($han);

if($count == 1){
	echo"Already Registered, Please Login";
}else{
	$inster = "insert into users(user_name,email,password) values('$username','$mail','$password')";
	mysqli_query($far,$inster);
}

?>