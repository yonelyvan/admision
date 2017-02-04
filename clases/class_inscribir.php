<?php

class Consultar_Inscripcion
{
    
    private $consulta;
    private $fetch;
    
    function __construct($codigo){
        $this->consulta =mysql_query("SELECT * FROM inscripcion where id_inscripcion='$codigo'");
        $this->fetch =mysql_fetch_array($this->consulta);
    }
    
    function consultar($campo)
    {
        
        return $this->fetch[$campo];
    }
}

class Proceso_Inscripcion
{
	var $id_inscripcion;
    var $id_alumno;		
    var $id_turno;
	var $id_salones;
    var $id_pago
		
	function __construct($id_inscripcion,$id_alumno,$id_turno,$id_salones,$id_pago)
    {
        $this->id_inscripcion=$id_inscripcion;
        $this->id_alumno=$id_alumno;	
        $this->id_turno=$email;                         
        $this->id_salones=$id_salones;	
        $this->id_pago=&$
							
	}
		
	function crear()
    {
        $id_inscripcion=$this->id_inscripcion;
        $id_alumno=$this->id_alumno;
        $id_turno=$this->id_turno;
        $id_salones=$this->salones;
			
		mysql_query("INSERT INTO inscripcion (id_alumno, id_turno, id_salones) 
				VALUES ('$id_alumno','$id_turno','$id_salones')");
	}
	
	function actualizar()
    {
        $id_inscripcion=$this->id_inscripcion;
        $id_alumno=$this->id_alumno;
        $id_turno=$this->id_turno;
        $id_salones=$this->salones;
			
		
		mysql_query("Update alumnos Set	id_alumno='$id_alumno',
                                        id_turno='$id_turno',
                                        id_salones='$id_salones',
									    Where id_inscripcion=$id_inscripcion");
	}	
}
?>