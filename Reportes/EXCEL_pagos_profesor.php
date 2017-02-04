<?php
 		session_start();
	include_once('php_conexion.php'); 
	include_once('Class/funciones.php'); 
	include_once('Class/class_alumnos.php');
	
	if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
	}else{
		header('location:error.php');
	}
	
	if(!empty($_GET['fechaf']) and !empty($_GET['fechai']) and !empty($_GET['alumno'])){
		$fechai=limpiar($_GET['fechai']);
		$fechaf=limpiar($_GET['fechaf']);
		$alumno=limpiar($_GET['alumno']);
		
		$sql=mysql_query("SELECT * FROM alumnos WHERE nit='$alumno'");
		if($row=mysql_fetch_array($sql)){
			$nombre=$row['nombre'].' '.$row['apellido'];
		}
		
	}
	
	header("Content-Disposition: attachment; filename=Pagos_Alumno.xls"); 
	header("Pragma: no-cache");	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporte Pagos Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
	<table width="100%" border="1">
    	<tr>
            <td colspan="3"><center><strong>><?php echo $nombre.' | Fecha Inicio: '.fecha($fechai).' - '.fecha($fechaf); ?></strong></center></td>
        </tr>
        <tr>
            <td><strong>Fecha</strong></td>
            <td><strong>Concepto</strong></td>
            <td><div align="right"><strong>Valor</strong></div></td>
        </tr>
        <?php 
            $neto=0;
            $sql=mysql_query("SELECT * FROM pagos WHERE fecha between '$fechai' AND '$fechaf'");
            while($row=mysql_fetch_array($sql)){
                $neto=$neto+$row['valor']
        ?>
        <tr>
            <td><?php echo fecha($row['fecha']); ?></td>
            <td><?php echo $row['concepto']; ?></td>
            <td><div align="right">$ <?php echo number_format($row['valor']); ?></div></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2"></td>
            <td><div align="right">$ <?php echo number_format($neto); ?></div></td>
        </tr>
    </table>
</body>
</html>