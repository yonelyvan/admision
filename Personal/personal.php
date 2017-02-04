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
		
			$cans=mysql_query("SELECT COUNT(nombre)as total FROM personal");
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
                        	
                          PERSONAL</h3>
                      </div>
                      <div class="span6">
                      	<div align="right">
                       	<a href="ingresar_a_personal.php" class="btn">
                            	<strong><i class="icon-user"></i>Agregar Nuevo</strong>
                        </a>
                        <a href="subir_archivo.php" class="btn">
                          <strong><i class="icon-user"></i>Agregar por Archivo</strong>
                        </a>
                       
                        <div class="btn-group">
                            <button class="btn" data-toggle="dropdown">
                            	<i class="icon-search"></i> <strong>Filtrar por Cargo</strong> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <?php
									$query=mysql_query("SELECT * FROM cargo ");
									while($consulta_cargo=mysql_fetch_array($query))
                                    {
										echo '<li><a href="personal.php?filtro_cargo='.$consulta_cargo['id'].'">'.$consulta_cargo['nombre'].'</a></li>';
								    } 
                                ?>
							
                            <li><a href="personal.php?cargo=0">Todos</a></li>
                            </ul>
                        </div>
                                                                   
   
                            
                       <br><br>
                       <form name="form1" method="post" action="personal.php">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input name="busqueda_personal" type="text" placeholder="Buscar Personal" class="input-xlarge" autocomplete="off">
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
                <td width="14%"><center><strong>CODIGO</strong></center></td>
                <td width="23%"><center><strong>NOMBRE</strong></center></td>
                <td width="23%"><center><strong>APELLIDO</strong></center></td>
                <td width="32%"><center><strong>CARGO</strong></center></td>
                <td width="8%"><center><strong>MODIFICAR/ELIMINAR</strong></center></td>
              </tr>
              <?php
            
             if(empty($_GET['filtro_cargo']))
              {  
                if(empty($_POST['busqueda_personal']))
                   {
                        $sql="SELECT * FROM personal order by apellido"; 
                   }
                   else
                   {
                       $f_busqueda=limpiar($_POST['busqueda_personal']);
                       $sql="Select * FROM personal where nombre LIKE '$f_busqueda%' or apellido LIKE '$f_busqueda' or codigo='$f_busqueda'  ORDER BY nombre LIMIT $inicio, $maximo" ;
                   }
             }
            else 
            {
                $busqueda_cargo=limpiar($_GET['filtro_cargo']);
                if($busqueda_cargo<>0)
                {
                    $sql="SELECT * FROM personal where cargo='$busqueda_cargo' ORDER BY nombre LIMIT $inicio, $maximo";
                }
                else
                {
                    $sql="SELECT * FROM personal ORDER BY apellido LIMIT $inicio, $maximo";
                }
            }
                    
		  	
            $can=mysql_query($sql);
            while($dato=mysql_fetch_array($can)){	
                     $nombre_cargo=new Consultar_cargo($dato['cargo']);
				
			  ?>
                  <tr>
                    <td><i class="icon-user"></i> <?php echo trim($dato['codigo']); ?></td>
                      <td><i class="icon-tags"></i> <?php echo trim($dato['nombre']); ?></td>
                      <td><i class="icon-USD"></i> <?php echo trim($dato['apellido']); ?></td>
                     
                      <td><i class="icon-eye-open"></i> <?php echo $nombre_cargo->consultar('nombre'); ?></td>
                    
                    <td>
                    	<a href="ingresar_a_personal.php? actualizar=<?php echo $dato['codigo']; ?>" class="btn btn-mini" title="Modificar">
                    		<i class="icon-edit"></i>
                        </a>
                    </td>
                  </tr>
                  
              <?php } ?>
            </table>
			<?php 
				$can=mysql_query($sql);
				if(!$dato=mysql_fetch_array($can)){				
					echo '<div class="alert alert-info" align="center"><strong>No existe Registros de Personal </strong></div>';
				}
			?>
        </td>
      </tr>
    </table>
    <div class="pagination">
        <ul>
        	<?php
			if(empty($_POST['busqueda']) and empty($_POST['cargo'])){
				$tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
         		for	($n=1; $n<=$tp ; $n++){
					if($pag==$n){
						echo '<li class="active"><a href="personal.php?pag='.$n.'">'.$n.'</a></li>';	
					}else{
						echo '<li><a href="personal.php?pag='.$n.'">'.$n.'</a></li>';	
					}
				}
				
			}
			?>
        </ul>
    </div>
</div>
    

    

</body>
</html>