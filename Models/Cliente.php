<?php namespace Models;

class Cliente{
    private $identificador;
    private $tipo_cedula;
    private $cedula;
    private $nombre;
    private $apellidos;
    private $pais;
    private $email;
    private $telefono_fijo;
    private $telefono_celular;
    private $provincia;
    private $canton;
    private $distrito;
    private $direccion_exacta;
    private $vendedor_asociado;
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
      $sql = "SELECT t1.*, t2.nombre as nombre_usuario FROM cliente t1 INNER JOIN usuario t2 ON t1.vendedor_asociado = t2.id";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }

    public function create(){
        $sql = "INSERT INTO cliente (tipo_cedula,cedula,nombre,apellidos,pais,email, telefono_fijo, telefono_celular, provincia,
                                        canton, distrito, direccion_exacta, vendedor_asociado)
                VALUES ('{$this->tipo_cedula}', '{$this->cedula}', '{$this->nombre}', '{$this->apellidos}', '{$this->pais}',
                            '{$this->email}', '{$this->telefono_fijo}', '{$this->telefono_celular}', '{$this->provincia}',
                             '{$this->canton}','{$this->distrito}','{$this->direccion_exacta}','{$this->vendedor_asociado}')";
        $this->con->consultaSimple($sql);
    }
}

?>
