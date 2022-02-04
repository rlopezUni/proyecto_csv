<?php




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
                $corregir = "/Centro HistÃ³rico";
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
                $corregir = "/TonalÃ¡";
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

