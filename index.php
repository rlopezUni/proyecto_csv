<html>
<h1>Prueba de "subida"</h1>
<br>
<form enctype="multipart/form-data" action="index.php" method="POST">
  <p>Archivo base: <input name="subir" type="file" accept=".csv"/></p>
  <p>Archivo con datos a agregar: <input name="subir_2" type="file" accept=".csv"/></p>
  <p> <input type="submit" value="Intento"/></p>
</form>
</html>

<?php

$file_b = $_FILES['subir']['tmp_name'];
$file_m = $_FILES['subir_2']['tmp_name'];
$openfile_b = fopen($file_b, "a");
$openfile_m = fopen($file_m, "r");
$data = array();
while (($data = fgetcsv($openfile_m, 1000, ","))!==FALSE){
  $num = count($data);
  for($c = 0; $c < $num; $c++) {
    fputcsv($openfile_b, $data[$c]);
  }
}
fclose($openfile_b);

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