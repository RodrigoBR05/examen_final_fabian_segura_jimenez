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
            $this->producto->set("idProducto", $id);
            $datos = $this->producto->getProducto();
            return $datos;
        }
        else {
            //$cantidadActualBase = mysql_fetch_array($this->producto->getCantidadActual($id));
            //$cantidadActualFinal = (int)$cantidadActualBase['cantidad_actual'];
            $cantidadActualFinal = $this->producto->getCantidadActual($id);
            $suma = (int)$_POST['agregarCantidad'];
            $resta = (int)$_POST['descontarCantidad'];
            $resultado = $cantidadActualFinal + $suma - $resta;
            //$resultado = ($cantidadActual + $_POST['agregarCantidad'])- $_POST['descontarCantidad'];


            $this->producto->set("idProducto", $id);
            $this->producto->set("idUsuario", $_POST['id_usuario']);
            $this->producto->set("nombre", $_POST['nombre']);
            $this->producto->set("descripcion", $_POST['descripcion']);
            $this->producto->set("peso", $_POST['peso']);
            $this->producto->set ("tipoPeso", $_POST['tipoPeso']);
            $this->producto->set("proveedor", $_POST['proveedor']);
            $this->producto->set("cantidadMinima", $_POST['cantidadMinima']);
            $this->producto->set("cantidadActual", $resultado);

            //Para sumar y restar
            //$cantidadActual = $this->producto->getCantidadActual();
            //$resultado = $cantidadActual + $_POST['agregarCantidad']- $_POST['descontarCantidad'];

            //Para guardar la imagen
            $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
            $limite = 700;
            $ruta ="";
            if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024) {

                $nombre = date('is') . $_FILES['imagen']['name'];
                $ruta = "Views" . "/" . "productos" . "/" . "imagenes" ."/" . $nombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                $this->producto->set("rutaImagen", $ruta);
            }
            $this->producto->update();
            //header('Location:'.URL.'productos');
        }

    }//update

    public function read($id){
        $this->producto->set("idProducto", $id);
        $datos = $this->producto->getProducto();
        return $datos;
    }//ver

    public function delete($id){
        $this->producto->set("idProducto", $id);

        //borrar imagen del servidor
        $rutaImagen = mysqli_fetch_array($this->producto->getRutaImagen($id));

        if(unlink($rutaImagen['ruta_imagen'])){
            echo '*************************************************BORRADO EXITOSO';
        }
        else{
             echo '*************************************************ERROR';
        }

        $this->producto->delete();
        header('Location:' . URL . 'productos');
    }//eliminar

    public function excel(){
          $datos = $this->producto->getProductos();
        return $datos;
    }//excel



}//class
