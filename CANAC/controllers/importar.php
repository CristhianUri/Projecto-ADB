<?php

    $contenido= $_FILES['alumnoFile'];

    $contenido= file_get_contents($contenido['tmp_name']);
    $contenido= explode("\n", $contenido);

    $contenido= array_filter($contenido);

    foreach ($contenido as $content) {
        # code...
        $contenidolista[]= explode(",",$content);
    }
    print_r($contenidolista);

    exit();
  /*   <?php
require '../conexion/conexion.php';
//require '../libreria/PhpSpreadsheet/src/Spreadsheet.php';
require_once __DIR__.'/../libreria/PhpSpreadsheet\src\PhpSpreadsheet\Spreadsheet.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica si se ha subido un archivo
        if (isset($_FILES['excelFile'])) {
            $uploadedFile = $_FILES['alumnoFile'];
    
            // Verifica si no hubo errores durante la subida
            if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
                // Carga el archivo Excel
                $spreadsheet = IOFactory::load($uploadedFile['tmp_name']);
    
                // Resto del código para procesar y guardar en la base de datos
                // ...
                 // Selecciona la hoja de cálculo
            $sheet = $spreadsheet->getActiveSheet();

            // Itera sobre las filas de la hoja de cálculo
            foreach ($sheet->getRowIterator() as $row) {
                // Obtiene los valores de cada celda en la fila
                $rowData = $row->toArray();

                // Prepara la consulta SQL para insertar los datos en la tabla
                $sql = "INSERT INTO datos_excel (nombre, aPaterno, aMaterno, email,contrasena,estatus) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                // Ejecuta la consulta con los valores de la fila
                $stmt->execute($rowData);
            }

                echo "Archivo subido y procesado correctamente.";
                $conn= null;
            } else {
                echo "Error al subir el archivo.";
            }
        } else {
            echo "No se ha seleccionado ningún archivo.";
        }
    } else {
        echo "Método no permitido.";
    }
/* 
    $contenido= file_get_contents($contenido['tmp_name']);
    $contenido= explode("\n", $contenido);

    $contenido= array_filter($contenido);

    foreach ($contenido as $content) {
        # code...
        $contenidolista[]= explode(",",$content);
    } */
  

    exit();
?> */
?>