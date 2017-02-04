<?php
 		session_start();
		include_once('../Conexion/php_conexion.php'); 
		
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>


</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
    <div class="row-fluid">
        <div class="span6" align="center">
        	<img src="img/logo.png">
        </div>
        <div class="span6">
        	<?php
				$c=mysql_query("SELECT COUNT(nombre) as salon FROM salones WHERE estado='s'");
				if($d=mysql_fetch_array($c)){
					$t_salones=$d['salon'];
				}
				$c=mysql_query("SELECT COUNT(nombre) as alumno FROM alumnos WHERE estado='s'");
				if($d=mysql_fetch_array($c)){
					$t_alumno=$d['alumno'];
				}
			?><br><br><br><br>
        	<strong>Numero de Alumnos Registrados: </strong><span class="label label-success"><?php echo $t_alumno; ?></span>
            <br><br>
            <strong>Numero de Salones o Cursos Registrados: </strong><span class="label label-success"><?php echo $t_salones; ?></span>
        </div>
    </div>
</body>
</html>