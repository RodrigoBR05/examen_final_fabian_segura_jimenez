<?php namespace Controllers;
    use Models\Usuario as Usuario;      

    class UsuariosController{
        
        private $usuario;

        public function __construct(){
            $this->usuario = new Usuario();
        }
        
        public function index(){
            $datos = $this->usuario->toList();
            return $datos;            
        }
        
        public function create(){            
            if($_POST){                
                $this->usuario->set("nombre", $_POST['nombre']);
                $this->usuario->set("nick", $_POST['user']);
                $this->usuario->set("contrasenia", $_POST['password']);                
                $this->usuario->set("tipo_rol", $_POST['tipo_rol']);                  
                $this->usuario->create(); 
            }            
        }
        
        public function read($id){
            $this->usuario->set("id", $id);
            $datos = $this->usuario->read();
            return $datos;
        }
        
        public function update($id){
            if (!$_POST) {
                $this->usuario->set("id", $id);
                $datos = $this->usuario->read();
                return $datos;
            }else{
                $this->usuario->set("id", $id);
                $this->usuario->set("nombre", $_POST['nombre']);
                $this->usuario->set("nick", $_POST['user']);
                $this->usuario->set("tipo_rol", $_POST['tipo_rol']);
                $this->usuario->update();
                //Página de listado de usuarios
                header("Location: ".URL."usuarios");
            }
        }


        public function delete($id){
            $this->usuario->set("id",$id);
            $this->usuario->delete();
            header('Location:'.URL.'usuarios');
        }
            
    }
    $usuarios = new UsuariosController();    
?>

