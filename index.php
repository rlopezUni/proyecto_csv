<html>
<h1>Prueba de "subida"</h1>
<br>
<form enctype="multipart/form-data" action="index.php" method="POST">
  <p>Subir archivo: <input name="subir" type="file" accept=".csv"/></p>
  <p> <input type="submit" value="Intento"/></p>
</form>
</html>

<?php

$xd = fopen("Ejemplo.csv", "a");
$file = $_FILES['subir']['tmp_name'];
$openfile = fopen($file, "r");
while ($data = fgetcsv($openfile, 1000, ";")){
  $num = count ($data);
  fputcsv($xd, $data);
}
fclose($xd);

/*
$file = "Ejemplo.csv";
$openfile = fopen($file, "r");
$cont = fread($openfile, filesize($file));
echo $cont;

echo "<br><br>";

$file = "Ejemplo1.csv";
$openfile = fopen($file, "r");
$cont = fread($openfile, filesize($file));
echo $cont;

$datos = array();

$xd = fopen("Ejemplo.csv", "a");
fputcsv($xd, $datos);
fclose($xd);

echo "<br>";
*/


?>