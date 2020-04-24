<?php
require_once('../conexion.php');

$tarea = $_POST["tarea"];
$fecha = $_POST["fecha"];

$sql = "INSERT iNTO tareas value(null, ?, ?)";
$consulta = $conexion->prepare($sql);
$consulta->bind_param("ss", $tarea, $fecha);

$consulta->execute();
$consulta->bind_result($resultado);
$consulta->fetch();

$consulta->close();
$conexion->close();
?>