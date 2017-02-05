<?php
		session_start();
		include_once('../Conexion/php_conexion.php'); 
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}
        else{
			header('location:error.php');
		}
		if($_SESSION['tipo_usu']=='a'){
			$titulo='Administrador';
		}else{
			$titulo='Usuario';
		}

       $usuario=limpiar($_SESSION['username']);
       
		$sqll=mysql_query("SELECT * FROM usuarios WHERE usu='$usuario'");
		if($dato=mysql_fetch_array($sqll)){
			$nombre=$dato['nom'];
			$palabra=explode(" ", $nombre);
			$nomb=$palabra[0];
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $titulo; ?></title>
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

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color: #000;
	background-image: url(../Recursos/img/fondoP.png);
}
</style>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<table width="98%" border="0">
  <tr>
    <td>
    <div id="navbar-example" class="navbar navbar-static">
      <div class="navbar-inner">
        <div class="container" style="width: auto;">
          <a class="brand" href="Inicio_administracion.php" target="admin"><?php echo $titulo; ?></a>
          <ul class="nav" role="navigation">
            <li class="dropdown">
              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Mantenimiento <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../ProcesosA/proceso.php" target="admin"><i class="icon-list-alt"></i> A Proceso</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../Personal/personal.php" target="admin"><i class="icon-user"></i> A Personal</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../Cargo/cargo.php" target="admin"><i class="icon-list-alt"></i> A Cargos</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../facultad/facultad.php" target="admin"><i class="icon-list-alt"></i> A Facultad</a></li>
              

                  
                <!--<li role="presentation" class="divider"></li>-->  
              </ul>
            </li>
              
            
            
            <li class="dropdown">
              <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="r_alumnos.php" target="admin"><i class="icon-th-list"></i> 
                Reportes Pagos</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="reporte_pagos.php" target="admin"><i class="icon-th-list"></i>
                Reportes Asignacion de Aula</a></li>   
                <li role="presentation"><a role="menuitem" tabindex="-1" href="reporte_pagos.php" target="admin"><i class="icon-th-list"></i> 
                Reportes Gastos</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Bienvenido <?php echo $nombre=$dato['nom']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../usuarios/usuarios.php" target="admin"><i class="icon-user"></i> Crear Usuarios</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../usuarios/cambiar_clave.php" target="admin"><i class="icon-refresh"></i> Cambiar Contraseña</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../Conexion/php_cerrar.php"><i class="icon-off"></i> Salir</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </td>
  </tr>
  <tr>
    <td><iframe src="Inicio_administracion.php" frameborder="0" scrolling="yes" name="admin" width="100%" height="500"></iframe></td>
  </tr>
  <tr>
    <td>
    <pre><center><strong><a href="" target="_blank" style="color:#000">Sistema De Gestion De Procesos UNSA</a></strong></center></pre>
    </td>
  </tr>
</table>
</body>
</html>