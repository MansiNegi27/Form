<?php
 session_start();
 include('config.php');
 $usercheck=$_SESSION['login_user'];
 echo "I am '.$usercheck.' appy";
 $session_sql=mysqli_query($db,"SELECT id FROM users WHERE username='$usercheck'");
 $row=mysqli_fetch_assoc('$session_sql');
 $login_session=$row['username'];
if(!isset($_SESSION['login_user']))
{
 	header("location:index.html");
}
 ?>