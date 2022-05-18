<?php

session_start();

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

$cheak = " select * from users where email = '$mail' && password = '$password'";

$han = mysqli_query($far, $cheak);

$count = mysqli_num_rows($han);

if($count == 1){
	$_SESSION['user_name'] = $username;
	$_SESSION['email'] = $mail;
	header('location:logedin.php');
}

else{
	header('location:signup].html');
}
?>