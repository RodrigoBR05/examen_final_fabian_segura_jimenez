<?php namespace Models;

 require_once 'Conexion.php';

class Autenticacion{
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
    
    public function login($usuario,$clave){
        $sql = "SELECT * FROM usuario WHERE nick = '{$usuario}'";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_array($datos);
        $claveUsuario = $row['contrasenia'];
        echo $claveUsuario;
        /*
        if(password_verify($clave, $claveUsuario)){
            return $row;
        }
        return NULL;

        */
    }       
    
    public function verificarUsuario($usuario,$email){
        $sql = "SELECT * FROM usuario WHERE usuario = '{$usuario}'";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_array($datos);
        $emailUsuario = $row['email'];
        if(strcasecmp ($email , $emailUsuario)==0){
            return $row;
        }
        return NULL;
    }
    
    public function nuevaClave($usuario,$email,$nuevaClave){
        $fModificacion = date("Y/m/d");
        $encriptacionClave = password_hash($nuevaClave, PASSWORD_DEFAULT, [15]);
        $sql = "UPDATE usuario SET clave = '{$encriptacionClave}', fecha_modificacion = '{$fModificacion}' "
        . "WHERE usuario = '{$usuario}'";                    
        $this->con->consultaSimple($sql);
    }
}
?>


