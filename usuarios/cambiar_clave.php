<?php
 		session_start();
		include('../Conexion/php_conexion.php'); 
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		}
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cambiar Clave</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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



    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<table width="50%" border="0">
<tr>
  <td>
<table border="0" class="table table-bordered">
  <tr class="success">
    <td>
    	<center><strong>
        	<h3><img src="../Recursos/img/seguridad.jpg" class="img-circle img-polaroid" width="50" height="65"> 
            Cambiar Contraseña</h3>
        </strong></center>
    </td>
  </tr>
  <tr>
    <td>
      <div align="center">
        <form name="form1" method="post" action="">
          <label><strong>Contraseña Antigua: </strong></label><input type="password" name="contra" id="contra" required>
          <label><strong>Nueva Contraseña: </strong></label><input type="password" name="c1" id="c1" required>
          <label><strong>Repita Nueva Contraseña: </strong></label><input type="password" name="c2" id="c2" required><br><br>
          <input type="submit" name="button" id="button" class="btn btn-primary" value="Cambiar Contraseña">
          </form>
        <?php 
	if(!empty($_POST['c1']) and !empty($_POST['c2']) and !empty($_POST['contra'])){
		if($_POST['c1']==$_POST['c2']){
			$usuario=limpiar($_SESSION['username']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE usuario='".$usuario."' and contra='".$contra."'");
			if($dato=mysql_fetch_array($can)){
				$cnueva=limpiar($_POST['c2']);
				$sql="Update usuarios Set contra='$cnueva' Where usuario='$usuario'";
				mysql_query($sql);
				echo '<div class="alert alert-info" align="center">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Contraseña!</strong> Actualizada con exito
					</div>';
			}else{
				echo '<div class="alert alert-error">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Contraseña!</strong> Digitada no corresponde a la antigua
					</div>';
			}
		}else{
			echo '<div class="alert alert-error">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Las dos Contraseña!</strong> Digitadas no soy iguales
					</div>';
		}
	}
	?>
        </div>
      </td>
    </tr>
</table>
</td></tr>
</table>
</div>
</body>
</html>