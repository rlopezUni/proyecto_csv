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
$nombreArchivo = "./archivos/3.csv";
$NA = "./archivos/Ejemplo.csv";
$prueba = array();
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

        if($numeroDeColumna == 0)
        {
          echo "<br><br><br>";
          echo "Inicio Alumno<br>";
          echo "Matricula: $columna\n";
          $prueba[$numeroDeColumna] = $columna;
        }
        else if($numeroDeColumna == 1)
        {
          echo "Nombre: $columna\n";
          $prueba[$numeroDeColumna] = $columna;
        }
        else if($numeroDeColumna == 2)
        {
          echo "Apellido: $columna\n";
          $prueba[$numeroDeColumna] = $columna;
        }
        else if($numeroDeColumna == 3)
        {

            echo "Campus: $columna\n";
            $prueba[$numeroDeColumna] = $columna;
        }
        else if($numeroDeColumna == 4)
        {
          echo "Correo: $columna\n";
          $prueba[$numeroDeColumna] = $columna;
        }
        else if($numeroDeColumna == 5)
        {
          echo "Contraseña: $columna\n";
          $prueba[$numeroDeColumna] = "univer1";
        }
        else if($numeroDeColumna == 6)
        {
          echo "Correo Personal: $columna\n";
          $prueba[$numeroDeColumna] = $columna;
          echo "Fin De un alumno <br>";
        }
        echo "</pre>";
      }

    }
    fputcsv($A,  $prueba);
    # Para separar la impresión
    echo "\n\n";
    # Aumentar el índice
    $numeroDeFila++;
}
# Al finar cerrar el archivo
fclose($archivo);
fclose($A);

