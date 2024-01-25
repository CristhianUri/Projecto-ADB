<?php
$host= 'localhost';
$dbname= 'pruebas';
$usuario='root';
$contraseña='';
try {
    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $usuario, $contraseña);
   
    $conn = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>