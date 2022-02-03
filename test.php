<?php

# La longitud máxima de la línea del CSV. Si no la sabes,
# ponla en 0 pero la lectura será un poco más lenta
$longitudDeLinea = 1000;
$delimitador = ","; # Separador de columnas
$caracterCircundante = '"'; # A veces los valores son encerrados entre comillas
$nombreArchivo = "3.csv";
# Abrir el archivo
$archivo = fopen($nombreArchivo, "r");
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
          echo "Inicio Alumno<br>";
          echo "Matricula: $columna\n";
        }
        else if($numeroDeColumna == 1)
        {
          echo "Nombre: $columna\n";
        }
        else if($numeroDeColumna == 2)
        {
          echo "Apellido: $columna\n";
        }
        else if($numeroDeColumna == 3)
        {
          echo "Campus: $columna\n";
        }
        else if($numeroDeColumna == 4)
        {
          echo "Correo: $columna\n";
        }
        else if($numeroDeColumna == 5)
        {
          echo "Contraseña: $columna\n";
        }
        else if($numeroDeColumna == 6)
        {
          echo "Correo Personal: $columna\n";
          echo "Fin De un alumno <br>";
        }
       
        
        echo "</pre>";
      }
    }
    # Para separar la impresión
    echo "\n\n";
    # Aumentar el índice
    $numeroDeFila++;
}
# Al finar cerrar el archivo
fclose($archivo);