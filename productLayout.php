<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php 
$upis = $_GET['fname'];
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Pajo_Papirnica";
#$upiss = strtolower($upis);
function inputInfo($whatInfo) {
global $upis, $servername, $username, $password, $dbname;
$conn = new mysqli($servername, $username, $password, $dbname); # connectanje u databazu
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); # ako je error fuck offaj
}
$sql = "SELECT * FROM `Inventar` WHERE `id`='$upis'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	return $row["$whatInfo"];
  }
} else {
  echo "0 results";
}
}
?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<center>
<ul class="opcije">
   <li>
	<form action="productLayout.php" method="get">
		<input type="text" id="fname" name="fname">
		<input type="submit" value="Pretraži">
	</form>
   </li>
   <li><a href="#">Početna</a></li>
   <li><a href="#">O Nama</a></li>
   <li><a href="#">Asortiman</a></li>
   <li><a href="#">Kontakt</a></li>
</ul>
</center>
<div id="left">
<div id="bigPicture">
<?php
$slika = inputInfo("slika");
echo "<img id='mainPic' height='55%' width='60%' src=".$slika.">";
?>
</div>
</div>
<div id="right">
<div id="naslov">
<center>
<h1><p>
<?php
echo inputInfo("artikal");
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
echo inputInfo("opis");
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
echo "Cijena: ".inputInfo("cijena")." kn";
?>
</p>
</div>
<div id="dostupnost">
<p>
<?php
echo "Dostupan: ".inputInfo("dostupan");
?>
</p>
</div>
<div id="proizvodac">
<p>
<?php
echo "Proizvodac: ".inputInfo("proizvodac");
?>
</p>
</div>
</div>
</body>
</html>
