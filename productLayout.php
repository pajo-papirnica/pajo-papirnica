<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php
$upis = $_GET['fname']; 
#$upiss = strtolower($upis);
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Pajo_Papirnica";
$conn = new mysqli($servername, $username, $password, $dbname); # connectanje u databazu
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); # ako je error fuck offaj
}
$sql = "SELECT * FROM `Inventar` WHERE `id`='$upis'"; 
$result = $conn->query($sql);
?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div id="whole">
<center>
<ul class="opcije">
   <li><a href="#">Početna</a></li>
   <li><a href="#">O Nama</a></li>
   <li><a href="#">Asortiman</a></li>
   <li><a href="#">Kontakt</a></li>
   <li><a href="#">
	<form action="productLayout.php" method="get">
		<input type="text" id="fname" name="fname">
		<input type="submit" value="Pretraži">
	</form>
   
   </a></li>
</ul>
</center>
<div id="left">
<div id="bigPicture">
<?php
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	echo "<img id='mainPic' height='50%' width='50%' src=pajo-papirnica/".$row["slika"].">";
  }
} else {
  echo "0 results<br>";
}
?>
</div>
</div>
<div id="right">
<div id="naslov">
<center>
<h1><p>
<?php
$sql = "SELECT * FROM `Inventar` WHERE `id`='$upis'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	echo $row["artikal"];
  }
} else {
  echo "0 results<br>";
}
?>
</p></h1>
</center>
</div>
<div id="opis">
<br />
<br />
<br />
<p>
<?php
$sql = "SELECT * FROM `Inventar` WHERE `id`='$upis'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	echo $row["opis"];
  }
} else {
  echo "0 results<br>";
}
?>
</p>
</div>
<div id="cijena">
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<p>
<?php
$sql = "SELECT * FROM `Inventar` WHERE `id`='$upis'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	echo "Cijena: ".$row["cijena"];
  }
} else {
  echo "0 results<br>";
}
?>
</p>
</div>
<div id="dostupnost">
<p>
<?php
$sql = "SELECT * FROM `Inventar` WHERE `id`='$upis'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	echo "Dostupan: ".$row["dostupan"];
  }
} else {
  echo "0 results<br>";
}
?>
</p>
</div>
<div id="proizvodac">
<p>
<?php
$sql = "SELECT * FROM `Inventar` WHERE `id`='$upis'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	echo "Proizvodac: ".$row["proizvodac"];
  }
} else {
  echo "0 results<br>";
}
?>
</p>
</div>
</div>
</div>
</body>
</html>
