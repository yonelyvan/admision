<?php 

class Facultad
{
    var $nombre;	var $cantidad_aulas;		
	var $area;		var $id;	   

    
	function __construct($id,$nombre,$cantidad_aulas,$area)
    {
		$this->id=$id;
        $this->nombre=$nombre;						
        $this->area=$area;			   
		$this->cantidad_aulas=$cantidad_aulas;			              
							
	}
		
	function crear()
    {
		$nombre=$this->nombre;		
        $cantidad_aulas=$this->cantidad_aulas;				
		$area=$this->area;			
              
	
			
		mysql_query("INSERT INTO facultad (nombre,cantidad_aulas,area) 
				VALUES ('$nombre','$cantidad_aulas','$area')");
        
	}
	
	function actualizar()
    {
        $id=$this->id;
        $nombre=$this->nombre;	
		$cantidad_aulas=$this->cantidad_aulas;			
        $area=$this->area;              
		
		
		mysql_query("Update facultad  Set	nombre='$nombre',
                                        cantidad_aulas='$cantidad_aulas',
										area='$area'
										Where id='$id'");
	}	
    
    
 
    
}
    class Consultar_area
{
    private $consulta;
    private $fetch;
    
    function __construct($id)
    {
        $this->consulta= mysql_query("SELECT * FROM area where id='$id'");
        $this->fetch = mysql_fetch_array($this->consulta);
        
    }
    function consultar($campo)
    {
        return $this->fetch[$campo];
    }
}
    
    
    
?>