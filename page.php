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
   background-image: url('field.jpg');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size:cover;
}
</style>
     <h2>		crop not found <br>		Try in another method</h2>
	 
  <form method="post" action="server.php">
  	<?php include('errors.php'); ?>
  	<label for="season">ENTER SEASON	:</label><br>
               <input type="search" id="season" name="season"><br>
                 <label for="soil">ENTER SOIL NAME	:</label><br>
               <input type="search" id="soil" name="soil"><br>
                 <label for="min_temp">ENTER MINIMUM TEMPERATURE	:</label>
               <input type="search" id="min_temp" name="min_temp"><br>
                 <label for="max_temp">ENTER MAXIMUM TEPERATURE	:</label>
               <input type="search" id="max_temp" name="max_temp"><br>               
            <br>  <button type="submit" class="btn" name="page">submit</button>
  </form>

</body>
</html>