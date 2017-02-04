<?php
 		session_start();
		include_once('../Conexion/php_conexion.php'); 
		include_once('../clases/funciones.php'); 
		include_once('clase.php');
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
		
			$cans=mysql_query("SELECT COUNT(id)as total FROM facultad");
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
    <link href="../Recursos/css/bootstrap.css" rel="stylesheet">
    <link href="../Recursos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../Recursos/css/docs.css" rel="stylesheet">
    <link href="../Recursos/js/google-code-prettify/prettify.js" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="../Recursos/js/jquery.js"></script>
    <script src="../Recursos/js/bootstrap-dropdown.js"></script>
    <script src="../Recursos/js/bootstrap.min.js"></script>
    <script src="../Recursos/js/bootstrap.js"></script>
    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
    <table width="80%" border="0">
      <tr>
        <td>
       	  <table class="table table-bordered">
              <tr class="success">
                <td>
                    
                <div class="row-fluid">
                      <div class="span6">
                        	<h3><img src="../Recursos/img/lis.png" class="img-circle img-polaroid" width="70" height="65">
                        	FACULTADES</h3>
                      </div>
                      <div class="span6">
                      	<div align="right">
                       	<a href="ingresar_a_facultad.php" class="btn">
                            	<strong><i class="icon-plus"></i>Crear Facultad</strong>
                        </a>
                          
                            
                       <br><br>
                        <form name="form1" method="post" action="facultad.php">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input name="busqueda_facultad" type="text" placeholder="Buscar Facultad" class="input-xlarge" autocomplete="off">
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
                <td width="25%"><center><strong>Nombre</strong></center></td>
                <td width="20%"><center><strong>Cantidad de Aulas</strong></center></td>
                <td width="25%"><center><strong>Area</strong></center></td>
                <td width="12%"><center><strong>Agregar Aulas</strong></center></td>
                <td width="18%"><center><strong>Modificar/Eliminar</strong></center></td>
              </tr>
              <?php
                
                if(empty($_POST['busqueda_facultad']))
                   {
                        $sql="SELECT * FROM facultad ORDER BY area"; 
                   }
                   else
                   {
                       $f_busqueda=limpiar($_POST['busqueda_facultad']);
                       $sql="Select * FROM facultad where nombre LIKE '$f_busqueda%' ORDER BY area LIMIT $inicio, $maximo" ;
                   }
                
                    
		  	
			  	$can=mysql_query($sql);
                while($dato=mysql_fetch_array($can)){	
				              $nombre_area=new Consultar_area($dato['area']);

			  ?>
                  <tr>
                    <td><i class="icon-tags"></i> <?php echo trim($dato['nombre']); ?></td>
                    <td><i class="icon-tags"></i> <?php echo trim($dato['cantidad_aulas']); ?></td>
                      <td><center><i class="icon-blackboards"></i> <?php echo $nombre_area->consultar('nombre'); ?></center></td>
                      
                      
                      <td><center>
                    	<a href="ingresar_a_facultad.php?id=<?php echo $dato['id']; ?>" class="btn btn-mini" title="Modificar Facultad">
                    		<i class="icon-plus"></i>
                        </a></center>
                      </td>
                    
                      <td><center>
                        <a href="ingresar_a_facultad.php?id=<?php echo $dato['id']; ?>" class="btn btn-mini" title="Modificar Facultad">
                    		<i class="icon-edit"></i>
                        <a href="eliminar.php?id=<?php echo $dato['id']; ?>" class="btn btn-mini" title="Eliminar Facultad">
                        <i class="icon-remove"></i>
                        </a>
                        </a></center>
                    </td>
                  </tr>
                  
              <?php } ?>
            </table>
			<?php 
				$can=mysql_query($sql);
				if(!$dato=mysql_fetch_array($can)){				
					echo '<div class="alert alert-info" align="center"><strong>No hay Cargos Registrados </strong></div>';
				}
			?>
        </td>
      </tr>
    </table>
    <div class="pagination">
        <ul>
        	<?php
			if(empty($_POST['busqueda_facultad'])){
				$tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
         		for	($n=1; $n<=$tp ; $n++){
					if($pag==$n){
						echo '<li class="active"><a href="cargo.php?pag='.$n.'">'.$n.'</a></li>';	
					}else{
						echo '<li><a href="cargo.php?pag='.$n.'">'.$n.'</a></li>';	
					}
				}
				
			}
			?>
        </ul>
    </div>
</div>
    

    

</body>
</html>