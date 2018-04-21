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
             return $this->getDepartamentos();
        }
        else{
            $this->cliente->set("idUsuario", $_POST['id_usuario']);
            $this->cliente->set("numeroSerie", $_POST['numSerie']);
            $this->cliente->set("nombre", $_POST['nombre']);
            $this->cliente->set("descripcion", $_POST['descripcion']);
            $this->cliente->set("donadoPor", $_POST['donadoPor']);
            $this->cliente->set("ubicacionDepartamento", $_POST['departamento']);
            $this->cliente->set("valorAdquisicion", $_POST['valorAdquisicion']);
            $this->cliente->set("valorActual", $_POST['valorActual']);
            $this->cliente->create();
            header('Location:'.URL.'cliente/Create');
        }//POST
    }//create

    public function update($id){
        if (!$_POST) {
            $this->cliente->set("idActivo", $id);
            $datos = $this->cliente->getActivo();
            return $datos;
        }
        else if ($_POST) {
            $this->cliente->set("idActivo", $id);
            $this->cliente->set("idUsuario", $_POST['id_usuario']);
            $this->cliente->set("numeroSerie", $_POST['numSerie']);
            $this->cliente->set("nombre", $_POST['nombre']);
            $this->cliente->set("descripcion", $_POST['descripcion']);
            $this->cliente->set("donadoPor", $_POST['donadoPor']);
            $this->cliente->set("ubicacionDepartamento", $_POST['departamento']);
            $this->cliente->set("valorAdquisicion", $_POST['valorAdquisicion']);
            $this->cliente->set("valorActual", $_POST['valorActual']);
            $this->cliente->update();
            header('Location:'.URL.'cliente');
        }
    }//update

    public function read($id){
         $this->cliente->set("idActivo", $id);
         $datos = $this->cliente->getActivo();
         return $datos;
    }//read

    public function delete($id){
        $this->cliente->set("idActivo", $id);
        $this->cliente->delete();
        header('Location:'.URL.'activos');
    }//delete

    public function getUsuarios(){
        $datos = $this->usuario->toList();
        return $datos;
    }//getUsuarios
}//class

    $cliente = new ClienteController();
?>
