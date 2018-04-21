<?php

namespace Models;

class Producto {
    private $identificador;
    private $codigo;
    private $nombre;
    private $marca;
    private $presentacion;
    private $descripcion;
    private $moneda;
    private $precio;

    public function __construct() {
     $this->con=new Conexion();
    }//constructor

    public function set($atributo, $contenido){
        $this->$atributo = $contenido;
    }//set
    public function get($atributo){
	return $this->$atributo;
    }//get

    public function create() {
    $sql = "INSERT INTO producto (codigo, nombre, marca, presentacion,descripcion, moneda, precio)
            VALUES ('{$this->codigo}','{$this->nombre}','{$this->marca}',
            '{$this->presentacion}', '{$this->descripcion}', '{$this->moneda}', '{$this->precio}')";
             $this->con->consultaSimple($sql);

    }//create

    public function update(){
      $sql = "UPDATE producto set codigo = '{$this->codigo}',
      nombre = '{$this->nombre}', marca = '{$this->marca}', presentacion = '{$this->presentacion}', descripcion= '{$this->descripcion}',
      moneda = '{$this->moneda}', precio = '{$this->precio}'
      WHERE identificador = '{$this->identificador}'";
      $this->con->consultaSimple($sql);
    }//update

    public function delete(){
      $sql = "DELETE FROM producto where identificador = '$this->identificador'";
      $this->con->consultaSimple($sql);
    }//delete

    public function read(){
      $sql = "SELECT * FROM producto WHERE identificador = '{$this->identificador}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }//read

    public function toList(){
      $sql = "SELECT * FROM producto";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }//toList

}
}
