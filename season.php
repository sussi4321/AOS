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
   background-image: url('Season.jpg');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size:cover;
}
</style>
     <h2>Enter season name:</h2>
	 
  <form method="post" action="server.php" >
  	<?php include('errors.php'); ?>
  	<label for="season">ENTER SEASON :</label>
               <input type="search" id="season" name="season">
              <button type="submit" class="btn" name="season_search">submit</button>
            
 
</form>

  
</body>
</html>