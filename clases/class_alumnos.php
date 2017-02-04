<?php
class Consultar_Salones{
    
	private $consulta;
	private $fetch;
	
	function __construct($codigo)
    {
		$this->consulta = mysql_query("SELECT * FROM salones WHERE id='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_Alumnos{
	
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM alumnos WHERE id='$codigo' or dni='$codigo' or nombre='$codigo' or apellido='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_Turno{
    
    private $consulta;
    private $fetch;
    
    function __construct($codigo){
        $this->consulta =mysql_query("SELECT * FROM turno where id='$codigo'");
        $this->fetch =mysql_fetch_array($this->consulta);
    }
    
    function consultar($campo)
    {
        
        return $this->fetch[$campo];
    }
}

class Proceso_Salones{
	var $nombre;	var $curso;	var $id;
	
	function __construct($nombre, $curso, $id){
		$this->nombre = $nombre; 		$this->    curso = $curso;		$this->id = $id;
	}
	
	function crear(){
		$nombre=$this->nombre;	$curso=$this->curso;
		mysql_query("INSERT INTO salones (nombre, curso, estado) VALUES ('$nombre','$curso','s')");
	}
	
	function actualizar(){
		$nombre=$this->nombre;	$curso=$this->curso;	$id=$this->id;
		mysql_query("Update salones Set	nombre='$nombre', curso='$curso' Where id=$id");
	}
	
	
}

class Proceso_Alumnos
{
	var $id;			var $nombre;		var $email;
	var $apellido;		var $dni;			var $direccion;     
	var $telefono;		var $fechan;		var $tipo_sangre;	
		
	function __construct($id,$nombre,$apellido,$dni,$telefono,$fechan,$email,$direccion,$tipo_sangre)
    {
		$this->id=$id;						$this->nombre=$nombre;			    $this->email=$email;
		$this->apellido=$apellido;			$this->fechan=$fechan;               $this->tipo_sagnre=$tipo_sangre;
		$this->dni=$dni;					$this->telefono=$telefono;			$this->direccion=$direccion;

							
	}
		
	function crear()
    {
		$id=$this->id;						$nombre=$this->nombre;				$email=$this->email;
		$apellido=$this->apellido;			$fechan=$this->fechan;              $tipo_sangre=$this->tipo_sagnre;
		$dni=$this->dni;					$telefono=$this->telefono;			$direccion=$this->direccion;
			
		mysql_query("INSERT INTO alumnos (nombre, apellido, dni, telefono, fechan, estado, email , direccion, tipo_sangre) 
				VALUES ('$nombre','$apellido','$dni','$telefono','$fechan','s','$email','$direccion','$tipo_sangre')");
	}
	
	function actualizar()
    {
        $id=$this->id;						$nombre=$this->nombre;				$email=$this->email;
		$apellido=$this->apellido;			$fechan=$this->fechan;              $tipo_sangre=$this->tipo_sagnre;
		$dni=$this->dni;					$telefono=$this->telefono;			$direccion=$this->direccion;    
		
		mysql_query("Update alumnos Set	nombre='$nombre',
										apellido='$apellido',
										dni='$dni',
										telefono='$telefono',
										fechan='$fechan',
										email='$email',
										direccion='$direccion',
										tipo_sangre='$tipo_sangre'
									    Where id=$id");
	}	
}
?>