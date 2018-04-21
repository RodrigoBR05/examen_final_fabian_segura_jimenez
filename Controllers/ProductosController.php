<?php
namespace Controllers;
use Models\Producto as Producto;

class ProductosController {
    private $producto;

    function __construct() {
      $this->producto = new Producto();
    }//ctor

    public function index() {
      $datos = $this->producto->toList();
      return $datos;
    }//index

    public function create(){
      if($_POST){
          $this->producto->set("identificador", $_POST['identificador']);
          $this->producto->set("codigo", $_POST['codigo']);
          $this->producto->set("nombre", $_POST['nombre']);
          $this->producto->set("marca", $_POST['marca']);
          $this->producto->set ("presentacion", $_POST['presentacion']);
          $this->producto->set("descripcion", $_POST['descripcion']);
          $this->producto->set("moneda", $_POST['moneda']);
          $this->producto->set("precio", $_POST['precio']);
          $this->producto->create();
          header('Location:'.URL.'productos/Create');
      }//POST
    }//create

    public function update($id){
    if (!$_POST) {
            $this->producto->set("identificador", $id);
            $datos = $this->producto->read();
            return $datos;
        }
        else {
            $this->producto->set("identificador", $id);
            $this->producto->set("codigo", $_POST['codigo']);
            $this->producto->set("nombre", $_POST['nombre']);
            $this->producto->set("marca", $_POST['marca']);
            $this->producto->set("presentacion", $_POST['presentacion']);
            $this->producto->set ("descripcion", $_POST['descripcion']);
            $this->producto->set("moneda", $_POST['moneda']);
            $this->producto->set("precio", $_POST['precio']);
            $this->producto->update();
            //Página de listado de productos
            header("Location: ".URL."productos");
        }

    }//update

    public function read($id){
        $this->producto->set("identificador", $identificador);
        $datos = $this->producto->read();
        return $datos;
    }//read

    public function delete($id){
        $this->producto->set("identificador", $id);
        $this->producto->delete();
        header('Location:' . URL . 'productos');
    }//eliminar
}//class
