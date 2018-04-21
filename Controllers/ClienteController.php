<?php

namespace Controllers;
use Models\Usuario as Usuario;
use Models\Cliente as Cliente;

class ClienteController {
    private $usuario;
    private $cliente;

    function __construct() {
      $this->usuario = new Usuario();
      $this->cliente = new Cliente();
    }//__construct

    public function index() {
        $datos = $this->cliente->toList();
        return $datos;
    }//index

    public function create(){
         if (!$_POST) {
           $datos = $this->getUsuariosVendedor();
           return $datos;
        }
        else{
            $this->cliente->set("identificador", $_POST['identificador']);
            $this->cliente->set("tipo_cedula", $_POST['tipo_cedula']);
            $this->cliente->set("cedula", $_POST['cedula']);
            $this->cliente->set("nombre", $_POST['nombre']);
            $this->cliente->set("apellidos", $_POST['apellidos']);
            $this->cliente->set("pais", $_POST['pais']);
            $this->cliente->set("email", $_POST['email']);
            $this->cliente->set("telefono_fijo", $_POST['telefono_fijo']);
            $this->cliente->set("telefono_celular", $_POST['telefono_celular']);
            $this->cliente->set("provincia", $_POST['provincia']);
            $this->cliente->set("canton", $_POST['canton']);
            $this->cliente->set("distrito", $_POST['distrito']);
            $this->cliente->set("direccion_exacta", $_POST['direccion_exacta']);                       
            $this->cliente->create();
            header('Location:'.URL.'cliente/Create');
        }//POST
    }//create

    public function getUsuariosVendedor(){
        $datos = $this->usuario->toListVendedor();
        return $datos;
    }//getUsuariosVendedor
}//class

    $cliente = new ClienteController();
?>
