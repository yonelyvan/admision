<?php 

class Personal
{
    var $codigo;		
    var $nombre;			
	var $apellido;
	var $cargo;			   

    
	function __construct($codigo,$nombre,$apellido,$cargo)
    {
		$this->codigo=$codigo;
        $this->nombre=$nombre;									   
		$this->apellido=$apellido;			
		$this->cargo=$cargo;
	}
		
	function crear()
    {
		$codigo=$this->codigo;
		$nombre=$this->nombre;						
		$apellido=$this->apellido;			
		$cargo=$this->cargo;
		
		echo $codigo;
		echo $nombre;
		echo $apellido;
		echo $cargo;
			
		mysql_query("INSERT INTO personal (codigo, nombre, apellido, cargo) VALUES ('$codigo','$nombre','$apellido','$cargo')");
        
	}
	
	function actualizar()
    {
        $codigo=$this->codigo;
       	$nombre=$this->nombre;
		$apellido=$this->apellido;
		$cargo=$this->cargo;

		mysql_query("UPDATE personal SET nombre='$nombre', apellido='$apellido', cargo='$cargo' WHERE codigo='$codigo'");
	}	
    
    
 
    
}

class Consultar_cargo
{
    private $consulta;
    private $fetch;
    
    function __construct($id)
    {
        $this->consulta= mysql_query("SELECT * FROM cargo where id='$id'");
        $this->fetch = mysql_fetch_array($this->consulta);
        
    }
    function consultar($campo)
    {
        return $this->fetch[$campo];
    }
}
    
    
    
    


?>