<?php 

class Personal  
{
    
    var $codigo;        var $nombre;		
	var $apellido;		var $cargo;		
    var $id;

    
	function __construct($id,$codigo,$nombre,$apellido,$cargo)
    {
		$this->id=$id;
        $this->nombre=$nombre;						$this->cargo=$cargo;			   
		$this->codigo=$codigo;			            $this->apellido=$apellido;              
							
	}
		
	function crear()
    {
		$nombre=$this->nombre;		    $apellido=$this->apellido;				
		$codigo=$this->codigo;			$cargo=$this->cargo;       
      
	
		return mysql_query("INSERT INTO personal (nombre, apellido, cargo, codigo) VALUES ('$nombre','$apellido','$cargo','$codigo')");
        
       

	}
	
	function actualizar()
    {
        $id=$this->id;
        $codigo=$this->codigo;	         $nombre=$this->nombre;				
		$apellido=$this->apellido;			$cargo=$this->cargo;   
     
		
		mysql_query("Update personal Set codigo='$codigo',
                                        nombre='$nombre',
                                        apellido='$apellido',
										cargo='$cargo'
									    where id='$id'");
        
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