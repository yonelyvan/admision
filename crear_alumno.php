<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');

		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u')
        {
		
        }
        else
        {
			header('location:error.php');
		}
		
		$id='';					$existe=FALSE;			$titulo='Registrar Nuevo Alumno';
		$nombre='';				$apellido='';			$dni='';			$telefono='';
		$fechan=date('Y-m-d');	$estado='';				$email='';			$direccion='';
        $tipo_sangre='';
		
        $dibu='<img src="alumnos/defecto.jpg" width="100" height="100">';
		
		if(!empty($_GET['doc']))
        {
			$documento=limpiar($_GET['doc']);
			$sql=mysql_query("SELECT * FROM alumnos WHERE dni='$documento'");
			
            if($row=mysql_fetch_array($sql))
            {
				
                $id=$row['id'];						$existe=TRUE;
				$nombre=$row['nombre'];				$apellido=$row['apellido'];			$dni=$row['dni'];					$telefono=$row['telefono'];
				$fechan=$row['fechan'];				$estado=$row['estado'];				$email=$row['email'];				$direccion=$row['direccion'];
                $tipo_sangre=$row['tipo_sangre'];
                    
                $titulo='Actualizar Datos de Alumno "'.$nombre.' '.$apellido.'"';
				
				if (file_exists("alumnos/".$dni.".jpg"))
                    
                {
					$dibu='<img src="alumnos/'.$dni.'.jpg" width="100" height="100" class="img-circle img-polaroid">';
				}
                
                else
                {
					$dibu='<img src="alumnos/defecto.jpg" width="100" height="100">';
				}
				
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


    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
    <table width="90%">
      <tr>
        <td>
        
		<?php 
            if(!empty($_POST['nombre']))
            {
                $nombre=limpiar($_POST['nombre']);			$apellido=limpiar($_POST['apellido']);
                $dni=limpiar($_POST['dni']);				$telefono=limpiar($_POST['telefono']);
                $fechan=limpiar($_POST['fechan']);		    $email=limpiar($_POST['email']);			
                $direccion=limpiar($_POST['direccion']);    $tipo_sangre=limpiar($_POST['tipo_sangre']);
                
                if($existe==FALSE){
                    $oProceso=new Proceso_Alumnos('',$nombre,$apellido,$dni,$telefono,$fechan,$email,$direccion,$tipo_sangre);						
                    $oProceso->crear();
                
                    //subir la imagen del alumno
                    $nameimagen = $_FILES['imagen']['name'];
                    $tmpimagen = $_FILES['imagen']['tmp_name'];
                    $extimagen = pathinfo($nameimagen);
                    $ext = array("png","jpg");
                    $urlnueva = "alumnos/".$dni.".jpg";			
                    if(is_uploaded_file($tmpimagen)){
                        if(array_search($extimagen['extension'],$ext)){
                            copy($tmpimagen,$urlnueva);	
                        }else{
                            echo mensajes("Error al Cargar la Imagen","rojo");
                        }
                    }
                    
                    echo mensajes('El Alumno/a "'.$nombre.' '.$apellido.'" Ha Sido Registrado Con Exito','verde');
                }else
                
                if($existe==TRUE)
                {
                    $nuevo_id=limpiar($_POST['id']);
                    $oProceso=new Proceso_Alumnos($nuevo_id,$nombre,$apellido,$dni,$telefono,$fechan,$email,$direccion,$tipo_sangre);
                    $oProceso->actualizar();
                    
                    //subir la imagen del articulo
                    $nameimagen = $_FILES['imagen']['name'];
                    $tmpimagen = $_FILES['imagen']['tmp_name'];
                    $extimagen = pathinfo($nameimagen);
                    $ext = array("png","jpg");
                    $urlnueva = "alumnos/".$dni.".jpg";			
                    if(is_uploaded_file($tmpimagen)){
                        if(array_search($extimagen['extension'],$ext)){
                            copy($tmpimagen,$urlnueva);	
                        }else{
                            echo mensajes("Error al Cargar la Imagen","rojo");
                        }
                    }
                    
                    echo mensajes('El Alumno/a "'.$nombre.' '.$apellido.'" Ha Sido Actualizado Con Exito','verde');
                }
            }
        ?>
        	
            <table class="table table-bordered">
              <tr class="success">
                <td><h2 align="center"><?php echo $dibu.' '.$titulo; ?></h2></td>
              </tr>
            </table>
			
            <table class="table table-bordered">
              <tr>
                <td>
                	<form name="form1" enctype="multipart/form-data" method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                	<div class="row-fluid">
                        <div class="span6">
                        	<strong>Nombre del Alumno</strong><br>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>DNI</strong><br>
                            <input type="text" name="dni" value="<?php echo $dni; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Fecha de Nacimiento</strong><br>
                            <input type="date" name="fechan" value="<?php echo $fechan; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Email</strong><br>
                            <input type="text" name="email" value="<?php echo $email; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Direccion</strong><br>
                            <input type="text" name="direccion" value="<?php echo $direccion; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Fotografia o Imagen</strong><br>
                            <input type="file" name="imagen"><br>
                        </div>
                        <div class="span6">
	                        <strong>Apellido del Alumno</strong><br>
                            <input type="text" name="apellido" value="<?php echo $apellido; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Telefono / Celulares</strong><br>
                            <input type="text" name="telefono" value="<?php echo $telefono; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Tipo de Sangre</strong><br>
                            <input type="text" name="tipo_sangre" value="<?php echo $tipo_sangre; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <button type="submit" class="btn btn-success"><strong>Registrar</strong></button>
                            <a href="alumnos.php" class="btn"><strong>Volver</strong></a><br>
                            <br>
                            <a href="inscripcion.php?doc=<?php echo $dni; ?>" class="btn" title="Inscribir Alumno"><strong>Inscribir Alumno</strong></a> </div>
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