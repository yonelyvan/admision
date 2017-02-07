<?php
include_once('../Conexion/php_conexion.php');
	$usuario=$_POST["usuario"]; 
	
	print_r($usuario);
	$v1 = $usuario["nombre"];
	$v2 = $usuario["usuario"];
	$v3 = $usuario["password"];
	$v4 = $usuario["tipo"];

	//conuslta SQL
	$sql = "INSERT INTO usuarios(nom, usu, con, tipo)";
	$sql .= "VALUES ('$v1', '$v2', '$v3', '$v4')";
	$result = mysql_query($sql);
	echo "<h1>echo</h1>";
	header('Location: ../Privilegios/Administrador.php');
