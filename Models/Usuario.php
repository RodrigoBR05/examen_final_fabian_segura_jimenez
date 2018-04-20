<?php namespace Models;

class Usuario{
    private $id;
    private $nombre;
    private $nick;
    private $contrasenia;
    private $tipo_rol;
    private $rol;
    private $con;

    public function __construct() {
        $this->con=new Conexion();
    }
    
    public function set($atributo, $contenido){
	$this->$atributo = $contenido;
    }

    public function get($atributo){
	return $this->$atributo;
    }

    public function toList(){
        $sql = "SELECT * FROM usuario";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }
    
    public function create(){        
        $encriptacionClave = sha1($this->contrasenia);
        if ($this->tipo_rol == 1) {
            $this->rol = "Administrador";
        } elseif ($this->tipo_rol == 2) {
            $this->rol = "Vendedor";
        } 

        $sql = "INSERT INTO usuario (nombre,nick,contrasenia,tipo_rol,rol)
            VALUES ('{$this->nombre}', '{$this->nick}', '{$encriptacionClave}', '{$this->tipo_rol}','{$this->rol}')";
        //print $sql;
        $this->con->consultaSimple($sql);        
    }
    
    public function delete(){
        $sql = "DELETE FROM usuario WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }
    
    public function update(){
        if ($this->tipo_rol == 1) {
            $this->rol = "Administrador";
        } elseif ($this->tipo_rol == 2) {
            $this->rol = "Vendedor";
        } 
        $sql = "UPDATE usuario SET nombre = '{$this->nombre}', nick = '{$this->nick}', "
        . "tipo_rol = '{$this->tipo_rol}',rol = '{$this->rol}' "
        . "WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    public function read(){
        $sql = "SELECT * FROM usuario WHERE id = '{$this->id}'";
        $datos = $this->con->consultaRetorno($sql);
	   //Envia un array
	   $row = mysqli_fetch_assoc($datos);
	   return $row;
    }  
    
}

?>
