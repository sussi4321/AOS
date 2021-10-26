<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
 <style>
 body{
   background-image: url('field1.jpg');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size:cover;
}
</style>
	 
  <form method="post" action="r_log.php">
  	<?php include('errors.php'); ?>
            <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
<style>
  h3{
    text-align:center;
   color: #4CAf50;
   } 
</style>
<h3>You Are Successfully Registered.</h3>
  	<br><p>
  		do you want sign in? <a href="login.php?login='1'" style="color: red;"> <br>Login</a>
  	</p>
               <br> <p> <a href="login.php?logout='1'" style="color: red;">Logout</a> </p>
  </form>
</body>
</html>