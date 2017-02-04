<?php


if(isset($_POST["submit"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $name = $filesop[0];
 $email = $filesop[1];
 
 $sql = mysql_query("INSERT INTO personal (codigo,nombre,apellido,correo,cargo,facultad,telefono) VALUES ($filesop[0],$filesop[1],$filesop[2],$filesop[3],$filesop[4],$filesop[5],$filesop[6])");
 }
 
 if($sql){
 echo "You database has imported successfully";
 }else{
 echo "Sorry! There is some problem.";
 }
}
else
{
	echo "Nothing from POST";
}
?>