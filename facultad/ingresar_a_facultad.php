<?php
 		session_start();
		include_once('../Conexion/php_conexion.php'); 
		include_once('../clases/funciones.php'); 
		include_once('clase.php');

		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u')
        {
		
        }
        else
        {
			header('location:error.php');
		}
		
        $existe=FALSE;			
        $titulo='Registrar Nuevo Facultad';
		$nombre='';				
        $area='';			
        $cantidad_aulas='';			
		
		
        
		
		if(!empty($_GET['id']))
        {
			$id=limpiar($_GET['id']);
			$sql=mysql_query("SELECT * FROM facultad WHERE id='$id'");
			
            if($row=mysql_fetch_array($sql))
            {				
                $existe=TRUE;			
                $titulo='Actualizar Facultad';
		        $nombre=$row['nombre'];				
                $area=$row['area'];			
                $cantidad_aulas=$row['cantidad_aulas'];			
				$nombre_area_p=new Consultar_area($area);

			}
            else
            
            {
				header('Location: alumnos.php');
			}
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
    <table width="72.5%">
      <tr>
        <td>
        
		<?php 
            if(!empty($_POST['id']))
            {
           
                $nombre=limpiar($_POST['nombre']);			$area=limpiar($_POST['area']);
                $cantidad_aulas=limpiar($_POST['cantidad_aulas']);	$id=limpiar($_POST['id']);
               
                
                if($existe==FALSE){
                    
                    $oProceso=new Facultad('',$nombre,$cantidad_aulas,$area);						
                    $oProceso->crear();
                    
                              
                    echo mensajes('La Facultad "'.$nombre.'" Ha Sido Registrado Con Exito','verde');
                }
                else
                
                if($existe==TRUE)
                {
                  
                    $oProceso=new Facultad($id,$nombre,$cantidad_aulas,$area);						
                    $oProceso->actualizar();
    	
                    
                    
                    echo mensajes('La Facultad "'.$nombre.'" Ha Sido Actualizado Con Exito','verde');
                }
            }
        ?>
        	
            <table class="table table-bordered">
              <tr class="success">
                <td><h2 align="center"><?php echo $titulo; ?></h2></td>
              </tr>
            </table>
			
            <table class="table table-bordered">
              <tr>
                <td>
                	<form name="form1" enctype="multipart/form-data" method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                	<div class="row-fluid">
                        <div class="span6">
                        	<strong>Nombre</strong><br>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Seleccione un Area</strong><br>
                            <select name="area" >
                                <?php if($existe){
                                ?>
                                 <option> <?php echo $nombre_area_p->consultar('nombre'); ?></option>
                                <?php } ?>
                                
                                <?php
                                    $query=mysql_query("SELECT * FROM area");
                                    while($consulta_area=mysql_fetch_array($query))
                                    {
                                        echo "<option value ='".$consulta_area['id']."'>".$consulta_area['nombre']."</option>" ;
                                    } 
                                ?>

                            </select><br>
                        </div>
                        <div class="span6">
	                        <strong>Cantidad de aulas</strong><br>
                            <input type="number" name="cantidad_aulas" min=0 value="<?php echo $cantidad_aulas; ?>" required class="input-xxlarge" autocomplete="off"><br>                      
                            <button type="submit" class="btn btn-success"><strong>Registrar</strong></button>
                            <a href="facultad.php" class="btn"><strong>Volver</strong></a><br>
                    </div>
                    </form>
                </td>
              </tr>
            </table>
        
        </td>
      </tr>
    </table>
</div>
</body>
</html>