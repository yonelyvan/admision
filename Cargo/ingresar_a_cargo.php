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
        $titulo='Registrar Nuevo Cargo';
		$nombre='';
        $funcion='';
        $pago='';
        $observacion='';
        $tipo='';
		
		if(!empty($_GET['id']))
        {
			$id=limpiar($_GET['id']);
			$sql=mysql_query("SELECT * FROM cargo WHERE id='$id'");
			
            if($row=mysql_fetch_array($sql))
            {				
                $existe=TRUE;			$titulo='Actualizar Cargo';
		        $nombre=$row['nombre'];				$funcion=$row['funcion'];			$pago=$row['monto'];			$observacion=$row['observacion'];        $tipo=$row['tipo'];
				
						
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
           
                $nombre=limpiar($_POST['nombre']);			$funcion=limpiar($_POST['funcion']);
                $pago_asignado=limpiar($_POST['pago']);		$observacion=limpiar($_POST['observacion']);
                $tipo=limpiar($_POST['tipo']);
               
                
                if($existe==FALSE){
                    
                    $oProceso=new Cargo('',$nombre,$funcion,$pago_asignado,$observacion,$tipo);						
                    $oProceso->crear();
                
                    
                    
                    echo mensajes('El Cargo "'.$nombre.'" Ha Sido Registrado Con Exito','verde');
                }
                else
                
                if($existe==TRUE)
                {
                  
                    $oProceso=new Cargo($id,$nombre,$funcion,$pago_asignado,$observacion,$tipo);						
                    $oProceso->actualizar();
    	
                    
                    
                    echo mensajes('El Cargo "'.$nombre.'" Ha Sido Actualizado Con Exito','verde');
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
                        	<strong>Nombre del Cargo</strong><br>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Funcion</strong><br>
                            <input type="text" name="funcion" value="<?php echo $funcion; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            
                        </div>
                        <div class="span6">
                            <strong>Tipo</strong><br>
                            <select name="tipo">
                                
                                <option value ='Pago' <?php if($tipo == 'Pago') : ?> selected="selected" <?php endif; ?> >Pago</option>
                                <option value ='Descuento' <?php if($tipo == 'Descuento') : ?> selected="selected" <?php endif; ?> >Descuento</option>

                            </select><br>
	                        <strong>Monto</strong><br>
                            <input type="number" name="pago" min=0 value="<?php echo $pago; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Observacion</strong><br>
                            <input type="text" name="observacion" value="<?php echo $observacion; ?>"  class="input-xxlarge" autocomplete="off"><br>
                            
                            <button type="submit" class="btn btn-success"><strong>Registrar</strong></button>
                            <a href="cargo.php" class="btn"><strong>Volver</strong></a><br>
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