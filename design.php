<?php include('server.php') ?>
<DOCTYPE html>
<html>
<head>
<style>
h1{
  font-family: Georgia, serif;
  font-size: 60px;
  color: white;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;

  text-align: center;
 
}
h3{
  color:#ffe1c5;
  text-align: center;
  font-size: 2em;
}

.bottomleft{
   position:absolute;
   bottom:50px;
  left:100px;
font-size:50px;
font-color:red;

}
/*#grad3 {
  height: 80px;
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(180deg, red, yellow);
}*/
<body>{
   background-image: url('out2.png');
}</style>
</head>
<body>
<h1  >welcome to Agricultural optimation world </h1>
<h3>search by crop name<a href="crop.php" color:blue>CROP</a></h3>
<h3>search by season<a href="season.php" color:blue>SEASON</a></h3>
<h3>search by soil<a href="soil.php" color:blue>SOIL</a></h3>
<h3>search for npk ratio<a href="npk.php" color:blue>N:P:K</a></h3>
<h3>Information about Irrigation<a href="https://www.civilserviceindia.com/subject/General-Studies/notes/different-types-of-irrigation-and-irrigation-systems-storage.html" color:blue>Irrigation</a></h3>
<h3>Government Schemes for Agriculture<a href="https://www.india.gov.in/topics/agriculture" color:blue>Schemes</a></h3>
<h2><div class="bottomleft"><a href="login.php" color:#010b13>Logout</a></div></h2>
</body>
</html>