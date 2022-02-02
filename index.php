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
$fila = 1;
$openfile_b = fopen($file_b, 'ab');
if (($gestor = fopen($file_m, 'r')) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        $numero = count($datos);
        echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
        $fila++;
        for ($c=0; $c < $numero; $c++) {
            echo $datos[$c] . "<br />\n";
            fputcsv($openfile_b, (array) $datos[$c]);

        }
    }
    fclose($gestor);
    fclose($openfile_b);
}

/*
$file_b = $_FILES['subir']['tmp_name'];
$file_m = $_FILES['subir_2']['tmp_name'];
$openfile_b = fopen($file_b, "a");
$openfile_m = fopen($file_m, "r");
while (($data = fgetcsv($openfile_m, 100, ","))){
  $num = count($data);
  for($c = 0; $c < $num; $c++) {
    fputcsv($openfile_b, (array) $data[$c]);
  }
}
fclose($openfile_b);
fclose($openfile_m);
*/

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