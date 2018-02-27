<?php
session_start();
include('config.php');
if (isset($_POST['login_user'])) 
{
	$username= mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);

	$sql="SELECT id FROM users WHERE username ='$username' AND password ='$password'";
	$retval= mysqli_query($db,$sql);
	$row=mysqli_fetch_array($retval,MYSQLI_ASSOC);
	$rowscount= mysqli_num_rows($row);
	 
	//if result matches username and password count will be 1
	if($rowscount==1){
		
	    $_SESSION['login_user']= $username;
	    header('location:home.php');
	}
	else{
  		array_push($errors, "Wrong username/password combination");
	}
/*<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">*/
}
?>
<html>
<head>
	<title>
		LOGIN
	</title>
	<meta name="viewport" content="width=device-width, initial scale= 1.0" >
	<meta charset="UTF-8">
</head>
<body>
	<link rel="stylesheet" type="text/css" href="style.css">
	<div id="login">
		<center>Login</center>
    </div>
		
		<form action="login.php" method="post">
			<?php include('error.php'); ?>
		<div id="username">
			Username <br>
		</div>
			<input type="text" name="username" ><br>
			<div id="password">
			Password <br>
			<input type="password" name="password"><br>
			<button name="login_user" type="submit"> Submit </button>
		</div>
        </form>
	New user? <a href="register.php">Register here</a>
</body>
</html>	
