<?php namespace Controllers;
    use Models\Departamento as Departamento; 

    class DepartamentosController{
        
        private $departamento;

        public function __construct(){
            $this->departamento = new Departamento();
        }
        
        public function index(){
            $datos = $this->departamento->toList();
            return $datos;            
        }
        
        public function create(){            
            if($_POST){
                $this->departamento->set("nombre", $_POST['nombre']);
                $this->departamento->set("descripcion", $_POST['descripcion']);
                $this->departamento->set("id_usuario", $_POST['id_usuario']);
                $this->departamento->create();
            }            
        }
        
        public function read($id){
            $this->departamento->set("id_departamento", $id);
            $datos = $this->departamento->read();
            return $datos;
        }
        
        public function update($id){
            if (!$_POST) {
                $this->departamento->set("id_departamento", $id);
                $datos = $this->departamento->read();
                return $datos;
            }else{
                $this->departamento->set("id_departamento", $id);
                $this->departamento->set("nombre", $_POST['nombre']);
                $this->departamento->set("descripcion", $_POST['descripcion']);
                $this->departamento->set("id_usuario", $_POST['id_usuario']);
                $this->departamento->update();
                //Página de listado de usuarios
                header("Location: ".URL."departamentos");
            }
        }


        public function delete($id){
            $this->departamento->set("id_departamento",$id);
            $this->departamento->delete();
            header('Location:'.URL.'departamentos');
        }
        
        public function excel(){
          $datos = $this->departamento->toList();
          return $datos;
        }//excel
        
    }
    $departamentos = new DepartamentosController();    
?>

