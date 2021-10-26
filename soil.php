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
   background-image: url('crop.png');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size:cover;
}
</style>
     <h2>Enter soil name:</h2>
	 
  <form method="post" action="server.php">
  	<?php include('errors.php'); ?>
  	<label for="soil">ENTER SOIL NAME:</label>
               <input type="search" id="soil" name="soil">
              <button type="submit" class="btn" name="soil_search">submit</button>
  </form>
 
</body>
</html>