<?php
 		session_start();
		include_once('../php_conexion.php'); 
		include_once('../Class/funciones.php'); 
		include_once('../Class/class_inscribir.php');
		include_once('../Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		}

        $id_alumno='';
        $dni_alumno='';
        $id_salon='';
        $id_inscripcion='';
        $nombre='nuevo';
        $apellido='Alumno';
        $encabezado="Registro de un ";
        $flag=FALSE;

        
        if(!empty($_GET['doc']))
        {
               $id_inscripcion=limpiar($_GET['doc']);
               $sql=mysql_query( $sql="SELECT * FROM alumnos inner join inscripcion ON alumnos.id = inscripcion.id_alumno WHERE id_inscripcion='$id_inscripcion'"); 
               if($row=mysql_fetch_array($sql))
               {
                   $flag= TRUE;
                   $turno = new Consultar_Turno($row['id_turno']);
                   $seccion = new Consultar_Salones($row['id_salones']);
                   $id=$row['id_alumno'];
                   $dni_alumno=$row['dni'];
                   $nombre=$row['nombre'];
                   $apellido=$row['apellido'];
                   $encabezado="Modificar Inscripcion de ";   
                   
               }
               else 
              { 
                echo $dni_alumno;
               //header('Location: alumnos.php');
              }
        }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo $encabezado.$nombre.' '.$apellido; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/docs.css" rel="stylesheet">
    <link href="../js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
    <script src="../js/bootstrap-affix.js"></script>
    <script src="../js/holder/holder.js"></script>
    <script src="../js/google-code-prettify/prettify.js"></script>
    <script src="../js/application.js"></script>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
	<table width="60%">
      <tr>
        <td>
        
        	<table class="table table-bordered">
              <tr class="success">
                <td><center><h2> <?php echo $encabezado.$nombre.' '.$apellido; ?> </h2><strong><?php echo fecha(date('Y-m-d')); ?></strong></center></td>
              </tr>
            </table>

            <table class="table table-bordered">
              <tr>
                <td>
                	<form name="form2" action="" method="post">
                    	<div class="span4" align="center">
                        	<strong>Documento de Identidad</strong><br>
                    		<input type="text" name="alumno" autocomplete="off" class="input-xlarge" required value=" <?php echo $dni_alumno ;?>"</input>
                        </div>
						<div class="span4" align="center">
                        	<strong>Seleccione una Seccion</strong><br>
                            <select name="seccion" >
                                <?php if($flag){
                                ?>
                                 <option> <?php echo $seccion->consultar('nombre'); ?></option>
                                <?php } ?>
                               
                                <?php
                                    $query=mysql_query("SELECT * FROM salones WHERE estado='s'");
									while($consulta_salon=mysql_fetch_array($query))
                                    {
                                        echo "<option value ='".$consulta_salon['id']."'>".$consulta_salon['nombre']."</option>" ;
                                    } 
                                ?>
                            </select><br>
                            <button type="submit" class="btn"><strong>Registrar Inscripcion</strong></button>
                        </div>
                        <div class="span4" align="center">
                        	<strong>Seleccione un Turno</strong><br>
                            <select name="turno" >
                                <?php if($flag){
                                ?>
                                 <option> <?php echo $turno->consultar('nombre'); ?></option>
                                <?php } ?>
                                
                                <?php
                                    $query=mysql_query("SELECT * FROM turno");
									while($consulta_salon=mysql_fetch_array($query))
                                    {
                                        echo "<option value ='".$consulta_salon['id']."'>".$consulta_salon['nombre']."</option>" ;
                                    } 
                                ?>
                            </select><br>
                        </div>
                        <div class="span4" align="center">
                        	<strong>Valor</strong><br>
                            <input type="number" min="1" value="1" name="valor" autocomplete="off" class="input-xlarge" required><br>
                        </div>
                    </div>
                    </form>
                
                </td>
              </tr>
            </table>
            
            <?php
				if(!empty($_POST['alumno'])){
                    if($flag)
                    {
                        
                    
                    }
					$alumno=limpiar($_POST['alumno']);	
                    $seccion=limpiar($_POST['seccion']);	
                    $turno=limpiar($_POST['turno']);
					$fecha=date('Y-m-d');
					$sql=mysql_query("SELECT * FROM alumnos WHERE dni='$alumno'");
					if($row=mysql_fetch_array($sql))
                    {
						mysql_query("INSERT INTO inscripcion (id_turno,concepto,valor,fecha) VALUES ('$alumno','$concepto','$valor','$fecha')");	
						echo mensajes('Se ha Registrado el Pago de $ '.number_format($valor).' del Alumno "'.$row['nombre'].' '.$row['apellido'].'" con Exito','verde');
					}else{
						echo mensajes("El NIT que desea consultar no Existe en la Base de Datos","rojo");	
					}
					
				}
			?>
        </td>
      </tr>
    </table>

</div>
</body>
</html>