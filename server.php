<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
table
{
  border:2px solid violet;
 border-collapse: collapse;
  position:fixed;
  top:50;
  right:300;
  
 font-weight: 900;
font-size:25px;

}
.bottomleft{
   position:absolute;
   bottom:50px;
  left:100px;
font-size:50px;
font-color:white;
}
.head{
 position:absolute;
  top:10px;
 left:400px;
font-size:40px;
}
body{
color: black;
text-align: center;
   background-image: url('out2.png');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size:cover;
}
</style>
</head>
<body bgcolor="white">
<?php
session_start();
// initializing variables
$username = "";
$email    = "";
//$crop ="";
$errors = array(); 
// connect to the database

$db = mysqli_connect('localhost', 'root', '', 'registration');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You Are Successfully Registered.";
  	header('location: r_log.php');
  }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: design.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//crop search
if(isset($_POST['crop_search'])) {
  $crop = mysqli_real_escape_string($db,$_POST['crop']);
  $query = "SELECT * FROM mytable WHERE CROP='$crop'";
 $results = mysqli_query($db,$query);
$color="white";
echo '<div class="head"  style="color:'.$color.'">requirements for <br><br>'.$crop.' </div>';

 if(mysqli_num_rows($results)==0){ 
   echo "crop not found";
  header('location: page.php');
 }
 else{
  echo "<table border='' width='40%' height='50%'>";
  while($row = mysqli_fetch_array($results))
   {
      $crop_name = $row[0];
      $min_tem= $row[1];
      $max_tem= $row[2];
      $wl= $row[3];
      $tgp= $row[4];
      $n= $row[5];
      $p= $row[6];
      $k= $row[7];
      $sea= $row[8];
      $soil= $row[9];
   
      echo "<tr>";
      echo "<td>"."CROP NAME"."</td>";
      echo "<td>".$crop_name."</td>";
      echo "</tr>";   
      echo "<tr>";
      echo "<td>"."MINIMUM TEMPERATURE"."</td>";
      echo "<td>".$min_tem."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."MAXIMUM TEMPERATURE"."</td>";
      echo "<td>".$max_tem."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."WATER LEVEL"."</td>";
      echo "<td>".$wl."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."TOTAL GROWING PERIOD"."</td>";
      echo "<td>".$tgp."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."NITROGEN"."</td>";
      echo "<td>".$n."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."PHOSPHORUS"."</td>";
      echo "<td>".$p."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."POTASSIUM"."</td>";
      echo "<td>".$k."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."SEASON"."</td>";
      echo "<td>".$sea."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."SOIL"."</td>";
      echo "<td>".$soil."</td>";
      echo "</tr>";    


    }
echo "</table>";
}
echo '<div class="bottomleft"><a href="design.php"  style="color:white">Prev</a></div>';
}


//soil search
if(isset($_POST['soil_search'])) {
  $soil = mysqli_real_escape_string($db,$_POST['soil']);
  $query = "SELECT CROP FROM mytable WHERE SOIL ='$soil'";
  $results = mysqli_query($db,$query);

   if($results ->num_rows>0){
$color="red";
$size="10";
echo '<div class="head"  style="color:'.$color.'">crops for '.$soil.' type</div>';
echo "<table border='1' width='20%' height='50%'>";
echo "<tr>";
 echo "<td>"."S.NO"."</td>";
 echo "<td>"."CROP NAME"."</td>";
 echo "</tr>";
 $val=1;

     while($row= $results->fetch_assoc())
     { 
 $soil= $row['CROP'];
         echo "<tr>";
      echo "<td>".$val."</td>";
      echo "<td>".$soil."</td>";
      echo "</tr>"; 
  $val = $val+1;
   
     }
}

else
  { echo'<h1 style="color:white">No matches yet. It will fix it soon!<br>ensure spelling is correct!!</h1>';
echo'<img src="out3.png">';}
echo '<div class="bottomleft"><a href="design.php"  style="color:white">Prev</a></div>';
}
echo "</table>";

//season search
if(isset($_POST['season_search'])) {
  $season = mysqli_real_escape_string($db,$_POST['season']);
  $query = "SELECT CROP FROM mytable WHERE SEASON ='$season'";
  $results = mysqli_query($db,$query);

 $val=1;
$color="white";
$size="10";

   if($results ->num_rows>0){
echo '<div class="head"  style="color:'.$color.'">crops for '.$season.' season</div>';
echo "<table border='1' width='20%' height='50%'>";
   echo "<tr>";
 echo "<td>"."S.NO"."</td>";
 echo "<td>"."CROP NAME"."</td>";
 echo "</tr>";

     while($row= $results->fetch_assoc())
     { 
    $season= $row['CROP'];
         echo "<tr>";
      echo "<td>".$val."</td>";
      echo "<td>".$season."</td>";
      echo "</tr>"; 
  $val = $val+1;
     }
echo "</table>";
}
else
  { echo '<h1 style="color:white">No matches yet! It will fix it soon.<br>ensure spelling is correct</h1>';
echo'<img src="out3.png">'; }
echo '<div class="bottomleft"><a href="design.php"  style="color:white">Prev</a></div>';



}

//npk search
if(isset($_POST['npk_search'])) {
  $crop = mysqli_real_escape_string($db,$_POST['crop']);
  $query = "SELECT NITROGEN, PHOSPHORUS, POTASSIUM FROM mytable WHERE CROP ='$crop'";
  $results = mysqli_query($db,$query);


   if($results ->num_rows>0){
$color="white";
$size="10";

echo '<div class="head"  style="color:'.$color.'">n:p:k for '.$crop.' </div>';
echo "<table border='1' width='20%' height='30%'>";
   while($row = mysqli_fetch_array($results))
   {
        $n= $row[0];
      $p= $row[1];
      $k= $row[2];
    echo "<tr>";
      echo "<td>"."NITROGEN"."</td>";
      echo "<td>".$n."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."PHOSPHORUS"."</td>";
      echo "<td>".$p."</td>";
      echo "</tr>";    
  echo "<tr>";
      echo "<td>"."POTASSIUM"."</td>";
      echo "<td>".$k."</td>";
      echo "</tr>";    
  echo "<tr>";
}
}
else
  { echo '<h1 style="color:white">no matches yet! It will fix it soon<br>ensure the spelling is correct</h1>';
echo'<img src="out3.png">';}
echo '<div class="bottomleft"><a href="design.php"  style="color:white">Prev</a></div>';
echo "</table>";
}

//after wrong crop name
if(isset($_POST['page'])) {
  $soil = mysqli_real_escape_string($db,$_POST['soil']);
  $season = mysqli_real_escape_string($db,$_POST['season']);
  $min_temp = mysqli_real_escape_string($db,$_POST['min_temp']);
  $max_temp = mysqli_real_escape_string($db,$_POST['max_temp']);
  $query = "SELECT CROP FROM mytable WHERE SEASON ='$season' AND SOIL = '$soil' AND (MIN_TEMPERATURE>='$min_temp+10' OR MIN_TEMPERATURE<='$min_temp-10') AND (MAX_TEMPERATURE>='$max_temp+10' OR MAX_TEMPERATURE<='$max_temp-10')";
  $results = mysqli_query($db,$query);
$color="white";
$size="10";
  
   if($results ->num_rows>0){
$val=1;
echo "<table border='1' width='20%' height='30%'>";
   echo "<tr>";
 echo "<td>"."S.NO"."</td>";
 echo "<td>"."CROP NAME"."</td>";
 echo "</tr>";
     while($row= $results->fetch_assoc())
     {
  $season= $row['CROP'];
         echo "<tr>";
      echo "<td>".$val."</td>";
      echo "<td>".$season."</td>";
      echo "</tr>"; 
  $val = $val+1;
     }
}
else
  { echo '<h1 style="color:white">no matches yet! It will fix it soon.<br>ensure the spelling is correct</h1>';
echo'<img src="out3.png">';}
echo '<div class="center"><a href="design.php"  style="color:white">Prev</a></div>';
}
echo "</table>";
   
?>
</body>
</html>