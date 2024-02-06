<?php
require '../conexion/conexion.php';
$tipo       = $_FILES['alumnoFile']['type'];
$tamanio    = $_FILES['alumnoFile']['size'];
$archivotmp = $_FILES['alumnoFile']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(",", $linea);
       
        $nombre                = !empty($datos[0])  ? ($datos[0]) : ' ';
        $aPaterno              = !empty($datos[1])  ? ($datos[1]) : ' ';
        $aMaterno              = !empty($datos[2])  ? ($datos[2]) : ' ';
        $email                = !empty($datos[3])  ? ($datos[3]) : ' ';
        $contrasena               = !empty($datos[4])  ? ($datos[4]) : ' ';
       
          $insertar=$conn->prepare("INSERT INTO alumnos (nombre,aPAterno,aMAterno,email,contrasena) VALUES(?,?,?,?,?) ");
          $ejecutar=$insertar->execute([$nombre,$aPaterno,$aMaterno,$email,$contrasena,]); 
           
        echo"exito";
        
        /**Caso Contrario actualizo el o los Registros ya existentes*/

    }
    $i++;
}
?>