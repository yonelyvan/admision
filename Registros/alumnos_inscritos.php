<?php
 		session_start();
		include_once('../php_conexion.php'); 
		include_once('../Class/funciones.php'); 
		include_once('../Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		} 
	
		#paginas
		$maximo=8;
		if(!empty($_GET['pag'])){
			$pag=limpiar($_GET['pag']);
		}else{
			$pag=1;
		}
		$inicio=($pag-1)*$maximo;
		
			$cans=mysql_query("SELECT COUNT(nombre)as total FROM alumnos");
			if($dat=mysql_fetch_array($cans)){
				$total=$dat['total']; #inicializo la variable en 0
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/docs.css" rel="stylesheet">
    <link href="../js/google-code-prettify/prettify.js" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
    <table width="60%" border="0">
      <tr>
        <td>
       	  <table class="table table-bordered">
              <tr class="success">
                <td>
                    
                <div class="row-fluid">
                      <div class="span6">
                        	<h3><img src="../img/icono_alumno.jpg" class="img-circle img-polaroid" width="70" height="65"> 
                        	Registro De Inscripciones</h3>
                      </div>
                      <div class="span6">
                      	<div align="right">
                       	<a href="inscribir.php" class="btn">
                            	<strong><i class="icon-user"></i> Inscribir Nuevo</strong>
                        </a>
                        <div class="btn-group">
                            <button class="btn" data-toggle="dropdown">
                            	<i class="icon-search"></i> <strong>Filtrar por Cursos</strong> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <?php
									$query=mysql_query("SELECT * FROM salones WHERE estado='s'");
									while($consulta_salon=mysql_fetch_array($query)){
										echo '<li><a href="alumnos_inscritos.php?seccion='.$consulta_salon['id'].'">'.$consulta_salon['nombre'].'</a></li>';
									}
							?>
                            <li><a href="inscripcion_alumnos.php?seccion=0">Todos</a></li>
                            </ul>
                        </div>
                        <br><br>
                        <form name="form1" method="post" action="alumnos_inscritos.php">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input name="bus" type="text" placeholder="Buscar Alumno" class="input-xlarge" autocomplete="off">
                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                </td>
              </tr>
            </table>

        </td>
      </tr>
      <tr>
        <td>

        	<table class="table table-bordered table table-hover">
              <tr class="success">
                <td width="27%"><strong>Apellido y Nombre</strong></td>
                <td width="19%"><center><strong>Turno</strong></center></td>
                <td width="14%"><center><strong>Estado</strong></center></td>
                <td width="32%"><center><strong>Salon</strong></center></td>
                <td width="8%"><center><strong>Modificar</strong></center></td>
              </tr>
              <?php
                
                if(empty($_GET['seccion']))
                {
				   if(empty($_POST['bus']))
                   {
                        $sql="SELECT * FROM alumnos inner join inscripcion ON alumnos.id = inscripcion.id_alumno ORDER BY apellido LIMIT $inicio, $maximo"; 
                   }
                   else
                   {
                       $f_busqueda=limpiar($_POST['bus']);
                       $sql="Select * FROM alumnos inner join inscripcion ON alumnos.id=inscripcion.id_alumno where nombre LIKE '$f_busqueda%' or apellido LIKE '$f_busqueda%' or dni='$f_busqueda' ORDER BY apellido and id_turno LIMIT $inicio, $maximo" ;
                   }
                }
                else{
                    $filtrado_por_seccion=limpiar($_GET['seccion']);
					if($filtrado_por_seccion<>0){
						$sql="SELECT * FROM alumnos inner join inscripcion ON alumnos.id = inscripcion.id_alumno WHERE inscripcion.id_salones='$filtrado_por_seccion' ORDER BY apellido LIMIT $inicio, $maximo";
					}else{
						$sql="SELECT * FROM alumnos inner join inscripcion ON alumnos.id = inscripcion.id_alumno ORDER BY apellido LIMIT $inicio, $maximo";
					}
				} 
                    
		  	
			  	$can=mysql_query($sql);
				while($dato=mysql_fetch_array($can)){	
					$salones = new Consultar_Salones($dato['id_salones']);
                    $turno = new Consultar_Turno($dato['id_turno']);
			  ?>
                  <tr>
                    <td><i class="icon-user"></i> <?php echo trim($dato['apellido']).' '.trim($dato['nombre']); ?></td>
                    <td><center><?php echo $turno->consultar('nombre'); ?></center></td>
                    <td>
                    	<center>
                        <a href="alumnos.php?estado=<?php echo $dato['id']; ?>" title="Cambiar Estado">
							<?php echo estado($dato['estado']); ?>
                        </a>
                        </center>
                    </td>
                    <td><center> <?php echo $salones->consultar('nombre'); ?></center></td> 
                    <td>
                    	<a href="inscribir.php?doc=<?php echo $dato['id_inscripcion']; ?>" class="btn btn-mini" title="Modificar Inscripcion">
                    		<i class="icon-edit"></i>
                        </a>
                    </td>
                  </tr>
                  
              <?php } ?>
            </table>
			<?php 
				$can=mysql_query($sql);
				if(!$dato=mysql_fetch_array($can)){				
					echo '<div class="alert alert-info" align="center"><strong>No hay Alumnos Registrados en la BD</strong></div>';
				}
			?>
        </td>
      </tr>
    </table>
    <div class="pagination">
        <ul>
        	<?php
			if(empty($_GET['cursos']) and empty($_POST['busqueda'])){
				$tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
         		for	($n=1; $n<=$tp ; $n++){
					if($pag==$n){
						echo '<li class="active"><a href="alumnos.php?pag='.$n.'">'.$n.'</a></li>';	
					}else{
						echo '<li><a href="alumnos.php?pag='.$n.'">'.$n.'</a></li>';	
					}
				}
				
			}
			?>
        </ul>
    </div>
</div>
    

    

</body>
</html>