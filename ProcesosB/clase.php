<?php 

class Proceso
{
    var $id;		var $fecha_1;
    var $nombre;	var $fecha_2;		
	var $cantidad_vacantes;		var $fecha_opcinal;		   
	var $gastos;
    
	function __construct($id,$nombre,$cantidad_vacantes,$fecha_1,$fecha_2,$fecha_opcinal, $gastos)
    {
		$this->id=$id;
        $this->nombre=$nombre;						$this->fecha_2=$fecha_2;			   
		$this->cantidad_vacantes=$cantidad_vacantes;			$this->fecha_opcinal=$fecha_opcinal;
		$this->fecha_1=$fecha_1;              			$this->gastos=$gastos;
							
	}
		
	function crear()
    {
		$nombre=$this->nombre;		$fecha_2=$this->fecha_2;				
		$cantidad_vacantes=$this->cantidad_vacantes;			$fecha_opcinal=$this->fecha_opcinal;
		$fecha_1=$this->fecha_1; 		$gastos=$this->gastos;
		
		echo $nombre;
		echo $fecha_2;
		echo $fecha_1;
		echo $cantidad_vacantes;
		echo $fecha_opcinal;
		echo $gastos;
			
		mysql_query("INSERT INTO proceso (nombre, fecha_2, cantidad_vacantes, fecha_opcinal, fecha_1, gastos) 
				VALUES ('$nombre','$fecha_2','$cantidad_vacantes','$fecha_opcinal','$fecha_1', '$gastos')");
        
	}
	
	function actualizar()
    {
        $id=$this->id;
        $fecha_2=$this->fecha_2;	$nombre=$this->nombre;	
		$cantidad_vacantes=$this->cantidad_vacantes;			$fecha_opcinal=$this->fecha_opcinal;
		$fecha_1=$this->fecha_1;			$gastos=$this->gastos;
		
		mysql_query("UPDATE proceso SET	nombre='$nombre', fecha_2='$fecha_2', cantidad_vacantes='$cantidad_vacantes', fecha_opcinal='$fecha_opcinal', fecha_1='$fecha_1' , gastos='$gastos' WHERE id='$id'");
	}	
    
    
 
    
}
    
    
    
    


?>