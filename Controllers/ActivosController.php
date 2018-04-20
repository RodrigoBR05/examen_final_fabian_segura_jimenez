<?php

namespace Controllers;
use Models\Activo as Activo;
use Models\Departamento as Departamento;

class ActivosController {
    private $activo;
    private $departamento;
    
    
    function __construct() {
        $this->activo = new Activo();
        $this->departamento = new Departamento();
    }//ctor
    
    public function index() {
        $datos = $this->activo->getActivos();
        return $datos;
       
    }//index
    
    
    public function create(){
         if (!$_POST) {
             return $this->getDepartamentos();
        }
        else{
            //print AutenticacionController::$idUsuario;
            $this->activo->set("idUsuario", $_POST['id_usuario']);
            $this->activo->set("numeroSerie", $_POST['numSerie']);
            $this->activo->set("nombre", $_POST['nombre']);
            $this->activo->set("descripcion", $_POST['descripcion']);
            $this->activo->set("donadoPor", $_POST['donadoPor']);
            $this->activo->set("ubicacionDepartamento", $_POST['departamento']);
            $this->activo->set("valorAdquisicion", $_POST['valorAdquisicion']);
            $this->activo->set("valorActual", $_POST['valorActual']);
            //Para guardar la imagen
            $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
            $limite = 700;
            $ruta ="";
           
            if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024) {
                //echo '********************************************************************AQUIII';
                $nombre = date('is') . $_FILES['imagen']['name'];
                $ruta = "Views" . "/" . "activos" . "/" . "imagenes" ."/" . $nombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                $this->activo->set("rutaImagen", $ruta); 
                //echo '************************************************************************'. $nombre;
            }
            $this->activo->create();
            header('Location:'.URL.'activos/Create');
        }//POST
        
    }//create
    
    public function update($id){
        if (!$_POST) {
            $this->activo->set("idActivo", $id);
            $datos = $this->activo->getActivo();
            return $datos;
        }
        else if ($_POST) {
            $this->activo->set("idActivo", $id);
            $this->activo->set("idUsuario", $_POST['id_usuario']);
            $this->activo->set("numeroSerie", $_POST['numSerie']);
            $this->activo->set("nombre", $_POST['nombre']);
            $this->activo->set("descripcion", $_POST['descripcion']);
            $this->activo->set("donadoPor", $_POST['donadoPor']);
            $this->activo->set("ubicacionDepartamento", $_POST['departamento']);
            $this->activo->set("valorAdquisicion", $_POST['valorAdquisicion']);
            $this->activo->set("valorActual", $_POST['valorActual']);
            
            
            //Para guardar la imagen
            $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
            $limite = 700;
            $ruta ="";
           
            if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024) {

                //borrar imagen del servidor
                $rutaImagen = mysqli_fetch_array($this->activo->getRutaImagen($id));
                unlink($rutaImagen['ruta_imagen']);
                   
                $nombre = date('is') . $_FILES['imagen']['name'];
                $ruta = "Views" . "/" . "activos" . "/" . "imagenes" . "/" . $nombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                $this->activo->set("rutaImagen", $ruta);
            }
            $this->activo->update();
            header('Location:'.URL.'activos');
            
        }
    }//update
    
    public function read($id){
         $this->activo->set("idActivo", $id);
         $datos = $this->activo->getActivo();
         return $datos;
    }//read
    
    public function delete($id){
        $this->activo->set("idActivo", $id);
        
        //borrar imagen del servidor
        $rutaImagen = mysqli_fetch_array($this->activo->getRutaImagen($id));   
        unlink($rutaImagen['ruta_imagen']);
        
        $this->activo->delete();
        header('Location:'.URL.'activos');
    }//delete
    
     public function excel(){
          $datos = $this->activo->getActivos();
        return $datos;
    }//excel
    
    public function getDepartamentos(){
        $datos = $this->departamento->toList();
        return $datos;
    }//getDepartamentos
}//class

    $activos = new ActivosController();
?>
