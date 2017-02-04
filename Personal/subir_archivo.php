
<?php
$titulo="Subir por Archivos";
        session_start();
        include_once('../Conexion/php_conexion.php');
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

    <table class="table table-bordered">
      <tr class="success">
        <td><h2 align="center"><?php echo $titulo; ?></h2></td>
      </tr>
    </table>

    <table class="table table-bordered">
        <tr>
        <td>
        <div align="center">

        <form method="post" name="import" enctype="multipart/form-data">
            <input type="file" name="file" /><br />
            <button type="submit" name="submit" class="btn btn-success"><strong>Subir</strong></button>

        </form>                        
        <?php


        if(isset($_POST["submit"]))
        {
         $file = $_FILES['file']['tmp_name'];
         $handle = fopen($file, "r");
         $c = 0;
         $row=1;
         while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
         {
            if($row==1){ $row++; continue;}

            $sql = mysql_query("INSERT INTO personal (codigo,nombre,apellido,correo,cargo,facultad,telefono) VALUES ('$filesop[0]','$filesop[1]','$filesop[2]','$filesop[3]','$filesop[4]','$filesop[5]','$filesop[6]')");
         }
        
         if($sql){
            echo "La base de datos fue importada satisfactoriamente";
            $sql=mysql_query("DELETE FROM `personal` WHERE codigo=''");
         }else{
         echo "Ocurrió un problema";
         }
        }
        else
        {
            echo "No se seleccionó un archivo";
        }
        ?>
                </div>
        </td>
        </tr>
    </table>
</body>
</html>