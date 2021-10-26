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
   background-image: url('Ferti.jpg');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size:cover;
}
</style>
     <h2>Enter a crop name:</h2>
	 
  <form method="post" action="server.php">
  	<?php include('errors.php'); ?>
  	<label for="crop">ENTER CROP NAME:</label>
               <input type="search" id="crop" name="crop">
              <button type="submit" class="btn" name="npk_search">submit</button>
            
  </form>

</body>
</html>