<?php
session_start();
  include('session.php');
?>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<h2> Welcome <?php echo $login_session; ?></h2>
	<h2><a href "logout.php"> Sign Out</a></h2>
</body>
</html>
