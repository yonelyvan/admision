<?php
		session_start();
		include_once('../Conexion/php_conexion.php'); 
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}
        else{
			header('location:error.php');
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blanco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../Recursos/css/bootstrap.css" rel="stylesheet">
    <link href="../Recursos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../Recursos/css/docs.css" rel="stylesheet">
    <link href="../Recursos/js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="../Recursos/js/jquery.js"></script>
    <script src="../Recursos/js/bootstrap-transition.js"></script>
    <script src="../Recursos/js/bootstrap-alert.js"></script>
    <script src="../Recursos/js/bootstrap-modal.js"></script>
    <script src="../Recursos/js/bootstrap-dropdown.js"></script>
    <script src="../Recursos/js/bootstrap-scrollspy.js"></script>
    <script src="../Recursos/js/bootstrap-tab.js"></script>
    <script src="../Recursos/js/bootstrap-tooltip.js"></script>
    <script src="../Recursos/js/bootstrap-popover.js"></script>
    <script src="../Recursos/js/bootstrap-button.js"></script>
    <script src="../Recursos/js/bootstrap-collapse.js"></script>
    <script src="../Recursos/js/bootstrap-carousel.js"></script>
    <script src="../Recursos/js/bootstrap-typeahead.js"></script>
    <script src="../Recursos/js/bootstrap-affix.js"></script>
    <script src="../Recursos/js/holder/holder.js"></script>
    <script src="../Recursos/js/google-code-prettify/prettify.js"></script>
    <script src="../Recursos/js/application.js"></script>


</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
    <div class="row-fluid">
        <div class="span3" align="center">
        	<img src="../Recursos/img/logo.png">
        </div>
        <div class="span6">
        	<?php
				$c=mysql_query("SELECT COUNT(nombre) as cantidad_procesos FROM proceso");
				if($d=mysql_fetch_array($c)){
					$total_proceso=$d['cantidad_procesos'];
				}
				$c=mysql_query("SELECT COUNT(nombre) as cantidad_personal FROM personal");
				if($d=mysql_fetch_array($c)){
					$total_personal=$d['cantidad_personal'];
				}
			?><br><br><br><br>
        	<strong>Numero de Procesos de Admision Registrados: </strong><span class="label label-success"><?php echo $total_proceso; ?></span>
            <br><br>
            <strong>Cantidad de Personal Registrados: </strong><span class="label label-success"><?php echo $total_personal; ?></span>
        </div>
    </div>
</body>
</html>