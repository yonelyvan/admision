<?php 

class Cargo
{
    var $id;		var $tipo;
    var $nombre;	var $funcion;		
	var $monto;		var $observacion;		   

    
	function __construct($id,$nombre,$funcion,$monto,$observacion,$tipo)
    {
		$this->id=$id;
        $this->nombre=$nombre;						$this->funcion=$funcion;			   
		$this->monto=$monto;			$this->observacion=$observacion;
		$this->tipo=$tipo;              
							
	}
		
	function crear()
    {
		$nombre=$this->nombre;		$funcion=$this->funcion;				
		$monto=$this->monto;			$observacion=$this->observacion;
		$tipo=$this->tipo;
	
			
		mysql_query("INSERT INTO cargo (nombre, funcion, monto, observacion, tipo) 
				VALUES ('$nombre','$funcion','$monto','$observacion','$tipo')");
        
	}
	
	function actualizar()
    {
        $id=$this->id;
        $funcion=$this->funcion;	$nombre=$this->nombre;	
		$monto=$this->monto;			$observacion=$this->observacion;
		$tipo=$this->tipo;
		
		mysql_query("UPDATE cargo SET	nombre='$nombre', funcion='$funcion', monto='$monto', observacion='$observacion', tipo='$tipo' WHERE id='$id'");
	}	
    
    
 
    
}
    
    
    
    


?>