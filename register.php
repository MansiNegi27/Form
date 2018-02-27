<?php 
session_start();
$username = "";
$user_email  = ""; //set the variables to 0
include('config.php');
if(isset($_POST['Submit'])){
    //recieve all input values from the form
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $user_email=mysqli_real_escape_string($db,$_POST['user_email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);


	 //now check that the user doesn't exists before
	//$check= "SELECT * FROM users WHERE username ='$username' OR email ='$user_email' LIMIT 1";
	//$result= mysqli_query($db,$check);
	//$user= mysqli_fetch_assoc($result);
	//if ($user) { // if user exists
    //if ($user['username'] === $username) {
     // array_push($errors, "Username already exists");
   // }

    //if ($user['email']  === $user_email) {
     // array_push($errors, "email already exists");
   // }
//}
  

  //  register user if there are no errors in the form
  //if (count($errors) == 0) {
  	
  	$query = "INSERT INTO users (username, email, password) VALUES('$username', '$user_email', '$password1')";
  	mysqli_query($db, $query);
  	$_SESSION['login_user'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
  //}


  
}


 ?>
<html>
<head>
	<title>
		REGISTER
    </title>
    <meta name="viewport" content="width=device-width intial scale=1.0">
    <meta charset="UTF-8">
</head>
<body>
    <link rel="stylesheet" type="text/css" href="style.css">
	<div id="register">
		REGISTER <br><br>
	</div>
	<form method="POST" action= "register.php" >
		<?php include('error.php'); ?>
    <div id="name">
		First name:
		<input type="text" name="first_name" width="10">
	    Last name:
	    <input type="text" name="last_name" width="10">
	</div>
    <div id="email">
    	E-mail ID:
    	<input type="email" name="user_email" required>
    </div>
    <div id ="username">
    	 Username:
    <input type="text" name="username" required>
    </div>
    <div id="password">
        Password:
    <input type="password" name="password1"  >
    </div>
    <button type="submit" name="Submit" > submit </button>
</form>
    <div id="click1">
        Already registered? <a href="login.php">Click Here</a>
    </div>

    
 
</body>
</html>
