<?php

//Para borar el contenido del csv al correr el código

$longitudDeLinea = 1000;
$delimitador = ","; 
$caracterCircundante = '"';

$ArchivoFinal = "./archivos/Excel Final.csv";
$ar = fopen($ArchivoFinal, "r+");
if(!$ar){
exit("No se pudo abrir el archivo $ArchivoFinal");
}

$arreglo = array();
$arreglo2 = array();

$numeroFila = 1;
while (($fila = fgetcsv($ar, $longitudDeLinea, $delimitador, $caracterCircundante))!== false){
 foreach($fila as $numeroDeColumna => $columna){
  if($numeroFila == 1){
   if($numeroDeColumna == 0){
    echo "<pre>";
    $arreglo[0] = $columna;
    echo "$columna\n";
   }
   if($numeroDeColumna == 1){
    $arreglo[1] = $columna;
    echo "$columna\n";
   }
   if($numeroDeColumna == 2){
    $arreglo[2] = $columna;
    echo "$columna\n";
   }
   if($numeroDeColumna == 3){
    $arreglo[3] = $columna;
    echo "$columna\n";
   }
   if($numeroDeColumna == 4){
    $arreglo[4] = $columna;
    echo "$columna\n";
   }
   if($numeroDeColumna == 5){
    $arreglo[5] = $columna;
    echo "$columna\n\n";
    echo "<br><br>";
    echo "</pre>";
   }
  }
  else if($numeroFila == 1)
  {
   if($numeroDeColumna == 0){
    echo "<pre>";
    $arreglo2[$numeroDeColumna] = NULL;
    echo "$columna\n";
   }
   if($numeroDeColumna == 1){
    $arreglo2[$numeroDeColumna] = NULL;
    echo "$columna\n";
   }
   if($numeroDeColumna == 2){
    $arreglo2[$numeroDeColumna] = NULL;
    echo "$columna\n";
   }
   if($numeroDeColumna == 3){
    $arreglo2[$numeroDeColumna] = NULL;
    echo "$columna\n";
   }
   if($numeroDeColumna == 4){
    $arreglo2[$numeroDeColumna] = NULL;
    echo "$columna\n";
   }
   if($numeroDeColumna == 5){
    $arreglo2[$numeroDeColumna] = NULL;
    echo "$columna\n";
    echo "<br><br>";
    echo "</pre>";
   }
   
  }
  fputcsv($ar, $arreglo2);
  $numeroFila++;
 }
 
}
fputcsv($ar, $arreglo);
fclose($ar);


//Leer todos los archivos de una carpeta


function listarArchivos( $path ){
    // Abrimos la carpeta que nos pasan como parámetro
    $dir = opendir($path);
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
            // Si es una carpeta
            if( is_dir($path.$elemento) ){
                // Muestro la carpeta
                echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
            // Si es un fichero
            } else {
                // Muestro el fichero
                echo "<br />". $elemento;
            }
        }
    }
}


listarArchivos("./archivos/");


//Leer un arhivo csv


# La longitud máxima de la línea del CSV. Si no la sabes,
# ponla en 0 pero la lectura será un poco más lenta
$longitudDeLinea = 1000;
$delimitador = ","; # Separador de columnas
$caracterCircundante = '"'; # A veces los valores son encerrados entre comillas
$nombreArchivo = "./archivos/6.csv";
$NA = "./archivos/Excel Final.csv";
$prueba = array(
0 => '',
1 => '',
2 => '',
3 => '',
4 => '',
5 => '');
# Abrir el archivo
$archivo = fopen($nombreArchivo, "r");
$A = fopen($NA, "a");
if (!$archivo) {
    exit("No se puede abrir el archivo $nombreArchivo");
}

#  Comenzar a leer, $numeroDeFila es para llevar un índice
$numeroDeFila = 1;
while (($fila = fgetcsv($archivo, $longitudDeLinea, $delimitador, $caracterCircundante)) !== false) {
    foreach ($fila as $numeroDeColumna => $columna) {

      if($numeroDeFila >1)
      {
         echo "<pre>";

        if($numeroDeColumna == 1)
        {
          echo "<br><br>";
          echo "Nombre: $columna\n";
          $prueba[0] = $columna;
        }
        else if($numeroDeColumna == 2)
        {
          echo "Apellido: $columna\n";
          $prueba[1] = $columna;
        }
        else if($numeroDeColumna == 3)
        {
            if($columna == "Plantel Jardines del Bosque")
            {
                $corregir = "/Jardines del bosque";
                echo "Campus: $corregir\n";
                $prueba[4] = $corregir;
            }
            else if($columna == "Plantel Tlaquepaque")
            {
                $corregir = "/Tlaquepaque";
                echo "Campus: $corregir\n";
                $prueba[4] = $corregir;
            }
            else if($columna == "OnLine")
            {
                $corregir = "/Online";
                echo "Campus: $corregir\n";
                $prueba[4] = $corregir;
            }
            else if($columna == "Plantel Ávila Camacho")
            {
                $corregir = "/Avila Camacho";
                echo "Campus: $corregir\n";
                $prueba[4] = $corregir;
            }
            else if($columna == "Plantel Centro Histórico R")
            {
                $corregir = "/Centro Histórico";
                echo "Campus: $corregir\n";
                $prueba[4] = $corregir;
            }
            else if($columna == "Plantel Loma Bonita")
            {
                $corregir = "/Loma Bonita";
                echo "Campus: $corregir\n";
                $prueba[4] = $corregir;
            }
            else if($columna == "Plantel Tonalá")
            {
                $corregir = "/Tonalá";
                echo "Campus: $corregir\n";
                $prueba[4] = $corregir;
            }
        }
        else if($numeroDeColumna == 4)
        {
          echo "Correo; $columna\n";
          $prueba[2] = $columna;
        }
        else if($numeroDeColumna == 5)
        {
          echo "Contraseña: $columna\n";
          $prueba[3] = "Univer1";
        }
        else if($numeroDeColumna == 6)
        {
          echo "Cambiar la contraseña la proxima vez que se inicie seción\n";
          $prueba[5] = "TRUE";
          echo "<br><br>";
        }
        echo "</pre>";
      }

    }
    fputcsv($A, $prueba);
    # Para separar la impresión
    echo "\n\n";
    # Aumentar el índice
    $numeroDeFila++;
}
# Al finar cerrar el archivo
fclose($archivo);
fclose($A);

?>