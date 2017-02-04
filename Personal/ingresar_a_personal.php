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
        $titulo='Registrar Nuevo Personal';
		$nombre='';				
        $apellido='';		
        $codigo=''; 	
        $cargo='';
		
		
        
		
		if(!empty($_GET['actualizar']))
        {
			$id=limpiar($_GET['actualizar']);
			$sql=mysql_query("SELECT * FROM personal WHERE codigo='$id'");
			
            if($row=mysql_fetch_array($sql))
            {				
                $existe=TRUE;			
                $titulo='Actualizar';
                $codigo=$row['codigo'];
		        $nombre=$row['nombre'];				
                $apellido=$row['apellido'];
                $cargo=$row['cargo'];			
                
                $nombre_cargo_p=new Consultar_cargo($cargo);
				
						
			}
            else
            
            {
				header('Location: personal.php');
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
                $codigo=limpiar($_POST['codigo']);    
                $nombre=limpiar($_POST['nombre']);
                $apellido=limpiar($_POST['apellido']);
                $cargo=limpiar($_POST['cargo']);		  
               
                if($existe==FALSE){
                    
                    $Proceso=new Personal('',$codigo,$nombre,$apellido,$cargo);						
                    $Proceso->crear();
                   
                    $c_nombre_cargo=new Consultar_cargo($cargo);
                    $nombre_cargo_n=$c_nombre_cargo->consultar('nombre');
                        echo mensajes('El nuevo "'.$nombre_cargo_n.' '.$nombre.'"Ha Sido Registrado Con Exito','verde');
                    
                        
                  
                }
                else
                if($existe==TRUE)
                {
                  
                    $Proceso=new Personal($id,$codigo,$nombre,$apellido,$cargo);						
                    $Proceso->actualizar();
                    
                       $c_nombre_cargo=new Consultar_cargo($cargo);
                        $nombre_cargo_n=$c_nombre_cargo->consultar('nombre');
                        echo mensajes('El "'.$nombre_cargo_n.' '.$nombre.'" Ha Sido Actualizado Con Exito','verde'); 
                   
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
                        	<strong>Codigo </strong><br>
                            <input type="text" name="codigo" value="<?php echo $codigo; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Nombre</strong><br>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            
                        </div>
                        <div class="span6">
	                        <strong>Apellido</strong><br>
                            <input type="text" name="apellido" min=0 value="<?php echo $apellido; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Seleccione un Cargo</strong><br>
                            <select name="cargo" >
                                <?php if($existe){
                                ?>
                                 <option> <?php echo $nombre_cargo_p->consultar('nombre'); ?></option>
                                <?php } ?>
                                
                                <?php
                                    $query=mysql_query("SELECT * FROM cargo");
									while($consulta_cargo=mysql_fetch_array($query))
                                    {
                                        echo "<option value ='".$consulta_cargo['id']."'>".$consulta_cargo['nombre']."</option>" ;
                                    } 
                                ?>
                            </select><br>
                            
                            <button type="submit" class="btn btn-success"><strong>Registrar</strong></button>
                            <a href="personal.php" class="btn"><strong>Volver</strong></a><br>
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