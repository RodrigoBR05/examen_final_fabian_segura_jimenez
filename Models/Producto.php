<?php

namespace Models;

class Producto {
    //put your code here
    private $idProducto;
    private $idUsuario;
    private $nombre;
    private $descripcion;
    private $peso;
    private $tipoPeso;
    private $proveedor;
    private $cantidadMinima;
    private $cantidadActual;
    private $rutaImagen;
    private $fechaIngreso;
    private $fechaModificacion;
    //variables para hacer la suma
    
    private $agregarCantidad;
    private $descontarCantidad;
    
    public function __construct() {
     $this->con=new Conexion();
     $this->fechaModificacion= date("Y/m/d"); 
     $this->fechaIngreso = date("Y/m/d");
    }//constructor
      
    public function set($atributo, $contenido){
        $this->$atributo = $contenido;    
    }//set
    public function get($atributo){
	return $this->$atributo;
    }//get
    
    public function create() {
    $fActual = date("Y/m/d");
    $sql = "INSERT INTO producto (id_usuario, nombre, descripcion, peso, tipo_peso, 
            proveedor, cantidad_minima, cantidad_actual, ruta_imagen, fecha_ingreso)
            VALUES ('{$this->idUsuario}','{$this->nombre}','{$this->descripcion}',
            '{$this->peso}', '{$this->tipoPeso}', '{$this->proveedor}','{$this->cantidadMinima}','{$this->cantidadActual}',
            '{$this->rutaImagen}','{$fActual}')";
              //print $sql;
             $this->con->consultaSimple($sql);
           
    }//create
    public function update(){
        $fActual = date("Y/m/d");    
        $sql = "UPDATE producto set id_usuario = '{$this->idUsuario}',
        nombre = '{$this->nombre}', descripcion = '{$this->descripcion}', peso = '{$this->peso}', tipo_peso= '{$this->tipoPeso}',
        proveedor = '{$this->proveedor}', cantidad_minima = '{$this->cantidadMinima}', cantidad_actual = '{$this->cantidadActual}',
        ruta_imagen = '{$this->rutaImagen}', fecha_modificacion = '{$this->fechaModificacion}' 
        WHERE id_producto = '{$this->idProducto}'";
        $this->con->consultaSimple($sql);
    }//update
    
    public function delete(){
        $sql = "DELETE FROM producto where id_producto = '$this->idProducto'";
        $this->con->consultaSimple($sql);
    }//delete
    
    public function getProducto(){
        $sql = "SELECT t1.*, t2.nombre as nombre_usuario, t2.apellidos FROM producto t1 "
                . "INNER JOIN usuario t2 ON t1.id_usuario = t2.id_usuario WHERE id_producto = '{$this->idProducto}'";
        $datos = $this->con->consultaRetorno($sql);
	//Envia un array
	$row = mysqli_fetch_assoc($datos);
	return $row;
    }//getProducto
    
    public function getProductos(){
        $sql = "SELECT * FROM producto";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }////getProductos
    
    public function getRutaImagen($id){
        $sql = "SELECT ruta_imagen FROM producto where id_producto = '$id'";
        $ruta = $this->con->consultaRetorno($sql);    
        return $ruta; 
    }//getRutaImagen
    
    public function getCantidadActual($id){
    $sql = "Select cantidad_actual FROM producto where id_producto = '$id'";
    //$sql = "Select CAST cantidad_actual FROM producto where id_producto = '$id'";
    //print $sql;
    $datos = $this->con->consultaRetorno($sql);
    $resultado = mysqli_fetch_array($datos);
    //$row = mysqli_fetch_assoc($datos);
    //return (int) $row;
    //$cantActual = (int)$datos;
    $prueba = intval($resultado['cantidad_actual'], 10);
    echo "********************************************************************************". $prueba;
    return intval($resultado['cantidad_actual'], 10);
    //return $cantActual;
   
    
}
}
